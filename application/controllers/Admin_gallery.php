<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin', 'utility'));
		$this->load->library(array('form_validation','session', 'upload', 'pagination'));
		$this->load->model(array('image_model'));
		protect();
		$this->session->set_flashdata('error', '');
		$this->session->set_flashdata('message', '');
	}

	public function index()
	{
		if (!empty($this->input->post()))
		{
			$categories = $this->image_model->getGalleryCategories();
			$c = 0;
			$current = array();
			foreach ($_POST as $key => $value)
			{
				if (strpos($key, 'old') !== FALSE)
				{
					$arr = explode('-', $key);
					$current[$c]['id'] = end($arr);
					$current[$c]['title'] = $value;
					$c++;
				}
			}
			for ($b = 0; $b < count($categories); $b++)
			{
				$deleted = TRUE;
				for ($c = 0; $c < count($current); $c++)
				{
					if ($current[$c]['id'] === $categories[$b]['id'])
					{
						$deleted = FALSE;
						if ($current[$c]['title'] !== $categories[$b]['title'])
						{
							$this->image_model->setCategory(array('id' => $current[$c]['id'], 'title' => $current[$c]['title'], 'url_segment' => format_as_class($current[$c]['title'])));
						}
					}
				}
				if ($deleted)
				{
					$this->image_model->deleteCategory(array('id' => $categories[$b]['id'], 'title' => $categories[$b]['title'], 'url_segment' => format_as_class($categories[$b]['title'])));
				}
			}
			if (!empty($_POST['new']))
			{
				foreach ($_POST['new'] as $new)
				{
					$this->image_model->addCategory(array('title' => $new, 'url_segment' => format_as_class($new)));
				}
			}
			$this->session->set_flashdata('message', 'Saved.');
		}

		$data['categories'] = $this->image_model->getGalleryCategories();
		$data['page_title'] = 'Admin Gallery';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/gallery', $data);
		$this->load->view('admin/layout/footer');
	}

	public function category($category = 'gallery', $page = 1)
	{
		$config = $this->configureUpload('assets/uploads/gallery/');
		$this->upload->initialize($config);

		$this->form_validation->set_rules('file', 'File', 'trim');
		$this->form_validation->set_rules('selectedImage', 'Selected Image', 'callback_check_path_unique');

		if ($this->form_validation->run() == TRUE)
		{

			if (!empty($_FILES['file']['name']))
			{

				if (file_exists('assets/uploads/gallery/' . $_FILES['file']['name']))
				{
					// check if file is already uploaded
					$this->session->set_flashdata('error', 'That file already exists.');
				}
				if (empty($_SESSION['error']) && !$this->upload->do_upload('file'))
				{
					// check for any config errors
					$this->session->set_flashdata('error', $this->upload->display_errors());
				}
				if (empty($_SESSION['error']))
				{
					$categoryData = $this->image_model->getCategory($category);
					$image['path'] = 'assets/uploads/gallery/' . $_FILES['file']['name'];
					$image['text'] = $categoryData['title'];
					$image['rank'] = 0;
					$image['owner'] = 'Gallery';
					$image['category_id'] = $categoryData['id'];
					$this->image_model->setImage($image);
					$this->session->set_flashdata('message', 'Saved.');
					// if you want to redirect to the last page
					// $totalPages = ceil($this->image_model->getImageCount('gallery', $category) / 8);
					// redirect(base_url() . 'admin_gallery/category/' . $category . '/' . $totalPages);
					redirect(base_url() . 'admin_gallery/category/' . $category . '/1');
				}
			}
			elseif ($this->input->post('selectedImage', TRUE))
			{
				$url = $this->input->post('selectedImage', TRUE);
				$url = explode('/', $url);
				$fileName = end($url);
				$categoryData = $this->image_model->getCategory($category);
				$image['path'] = 'assets/uploads/gallery/' . $fileName;
				$image['text'] = $categoryData['title'];
				$image['rank'] = 0;
				$image['owner'] = 'Gallery';
				$image['category_id'] = $categoryData['id'];
				$this->image_model->addImage($image);
				$this->session->set_flashdata('message', 'Saved.');
				// if you want to redirect to the last page
				// $totalPages = ceil($this->image_model->getImageCount('gallery', $category) / 8);
				// redirect(base_url() . 'admin_gallery/category/' . $category . '/' . $totalPages);
				redirect(base_url() . 'admin_gallery/category/' . $category . '/1');
			}

		}

		$data['categories'] = $this->image_model->getCategories();
		$data['category'] = $this->image_model->getCategory($category)['title'];
		$total = $this->image_model->getImageCount('gallery', $category);

		$start = ($page * 8 - 8);

		$config = $this->configurePagination($category, $total);
		$this->pagination->initialize($config);

		$data['page_title'] = 'Gallery';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$data['images'] = $this->image_model->getImages('gallery', $category, $start);

		$data['folderImages'] =  glob('assets/uploads/gallery/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/category', $data);
		$this->load->view('admin/layout/footer');
	}

	private function configurePagination($category, $total)
	{
		$config['base_url'] = base_url() . 'admin-gallery/category/' . $category . '/';
		$config['total_rows'] = $total;
		$config['per_page'] = 8;
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['full_tag_open'] = '<div class="paginationWrap">';
		$config['full_tag_close'] = '</div>';
		$config['prev_tag_open'] = '<div class="pagination">';
		$config['prev_tag_close'] = '</div>';
		$config['next_tag_open'] = '<div class="pagination">';
		$config['next_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="pagination pagination-cur">';
		$config['cur_tag_close'] = '</div>';
		$config['num_tag_open'] = '<div class="pagination">';
		$config['num_tag_close'] = '</div>';

		return $config;
	}

	private function configureUpload($path)
	{
		$config['upload_path'] 		= $path;
		$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
		$config['max_size'] 		= 10000;
		$config['max_width'] 		= 10240;
		$config['max_height'] 		= 10240;

		return $config;
	}

	public function check_path_unique($path)
	{
		$url = explode('/', $path);
		$url = array_slice($url, 3);
		$path = implode('/', $url);
		$unique = $this->image_model->check_path_unique($this->uri->segment(3), $path);
		if (!$unique)
		{
			$this->session->set_flashdata('error', 'That image already exists in this category.');
		}
		return $unique;
	}

	public function ajaxPost()
	{
		$post['id'] = isset($_POST['id']) ? $_POST['id'] : 0;
		$post['rank'] = isset($_POST['rank']) ? $_POST['rank'] : 0;
		$post['owner'] = isset($_POST['owner']) ? $_POST['owner'] : '';
		$post['category'] = isset($_POST['category']) ? $_POST['category'] : '';
		$post['button'] = isset($_POST['button']) ? $_POST['button'] : '';
		$post['page'] = isset($_POST['page']) ? $_POST['page'] : 1;
		$response = array('result' => 'Request received');
		switch($post['button'])
		{
			case 'up':
				$rank = $this->image_model->getNextLowerRank($post['category'], $post['rank']);
				if ($rank)
				{
					$this->image_model->setRank($rank['id'], $post['rank']);
					$this->image_model->setRank($post['id'], $rank['rank']);
					$firstsrc = $this->image_model->getImage($post['id']);
					$secondsrc = $this->image_model->getImage($rank['id']);
					$response = array(
						'result' 		=> 'Success',
						'firstselect' 	=> $post['owner'] . '_' . $post['category'] . '_' . $rank['id'] . '_' . $rank['rank'],
						'firstclass' 	=> $post['owner'] . '_' . $post['category'] . '_' . $post['id'] . '_' . $rank['rank'],
						'firstsrc' 		=> base_url() . $firstsrc['path'],
						'secondselect' 	=> $post['owner'] . '_' . $post['category'] . '_' . $post['id'] . '_' . $post['rank'],
						'secondclass' 	=> $post['owner'] . '_' . $post['category'] . '_' . $rank['id'] . '_' . $post['rank'],
						'secondsrc' 	=> base_url() . $secondsrc['path']
					);
				}
				break;
			case 'down':
				$rank = $this->image_model->getNextHigherRank($post['category'], $post['rank']);
				if ($rank)
				{
					$this->image_model->setRank($rank['id'], $post['rank']);
					$this->image_model->setRank($post['id'], $rank['rank']);
					$firstsrc = $this->image_model->getImage($post['id']);
					$secondsrc = $this->image_model->getImage($rank['id']);
					$response = array(
						'result' 		=> 'Success',
						'firstselect' 	=> $post['owner'] . '_' . $post['category'] . '_' . $rank['id'] . '_' . $rank['rank'],
						'firstclass' 	=> $post['owner'] . '_' . $post['category'] . '_' . $post['id'] . '_' . $rank['rank'],
						'firstsrc' 		=> base_url() . $firstsrc['path'],
						'secondselect' 	=> $post['owner'] . '_' . $post['category'] . '_' . $post['id'] . '_' . $post['rank'],
						'secondclass' 	=> $post['owner'] . '_' . $post['category'] . '_' . $rank['id'] . '_' . $post['rank'],
						'secondsrc' 	=> base_url() . $secondsrc['path']
					);
				}
				break;
			case 'delete':
				$this->image_model->deleteImage($post['id']);
				$response = array(
						'result' 	=> 'Success',
						'redirect' 	=> base_url() . 'admin-gallery/category/' . $post['category'] . '/' . $post['page']
					);
				break;
			default:
				$response = array('result' => 'Button not found');
				break;
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));

	}

}
