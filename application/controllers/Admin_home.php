<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin', 'utility'));
		$this->load->library(array('form_validation','session', 'upload'));
		$this->load->model(array('home_model', 'image_model'));
		protect();
	}

	public function index()
	{
		$data['page_title'] = 'Admin Home';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/home');
		$this->load->view('admin/layout/footer');
	}

	public function carousel()
	{
		$this->session->set_flashdata('error', '');
		$this->session->set_flashdata('message', '');

		$config = $this->configureUpload('assets/uploads/carousel/');
		$this->upload->initialize($config);

		$this->form_validation->set_rules('file', 'File', 'trim');
		$this->form_validation->set_rules('selectedImage', 'Selected Image', 'callback_check_path_unique');

		if ($this->form_validation->run() == TRUE)
		{

			if (!empty($_FILES['file']['name']))
			{

				if (file_exists('assets/uploads/carousel/' . $_FILES['file']['name']))
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
					$image['path'] = 'assets/uploads/carousel/' . $_FILES['file']['name'];
					$image['text'] = 'Carousel Image';
					$image['rank'] = 0;
					$image['owner'] = 'Home';
					$image['category_id'] = 2;
					$this->image_model->setImage($image);
					$this->session->set_flashdata('message', 'Saved.');
					redirect(base_url() . 'admin_home/carousel');
				}
			}
			elseif ($this->input->post('selectedImage', TRUE))
			{
				$url = $this->input->post('selectedImage', TRUE);
				$url = explode('/', $url);
				$fileName = end($url);
				$image['path'] = 'assets/uploads/carousel/' . $fileName;
				$image['text'] = 'Carousel Image';
				$image['rank'] = 0;
				$image['owner'] = 'Home';
				$image['category_id'] = 2;
				$this->image_model->addImage($image);
				$this->session->set_flashdata('message', 'Saved.');
				redirect(base_url() . 'admin_home/carousel');
			}

		}

		$data['page_title'] = 'Admin Home - Carousel';

		$data['images'] = $this->image_model->getImages('carousel', 'Carousel');

		$data['folderImages'] =  glob('assets/uploads/carousel/*.{jpg,png,gif}', GLOB_BRACE);

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/carousel');
		$this->load->view('admin/layout/footer');
	}

	public function about()
	{
		if (!empty($this->input->post('content')))
		{
			$this->home_model->setAbout($this->input->post('content'));
			$this->session->set_flashdata('message', 'Saved.');
		}
		$data['page_title'] = 'Admin Home - About';
		$data['about'] = $this->home_model->getAbout();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/about');
		$this->load->view('admin/layout/footer');
	}

	public function areas()
	{
		if (!empty($this->input->post()))
		{
			$serviceAreas = $this->home_model->getServiceAreas();
			for ($n = 0;$n < count($serviceAreas);$n++)
			{
				$oldAreas[$n] = $serviceAreas[$n]['area'];
			}
			$newAreas = $_POST['areas'];

			foreach ($newAreas as $newArea)
			{
				if ($oldAreas == null && $newArea != '')
				{
					$this->home_model->addServiceArea(array('area' => $newArea));
				}
				elseif (!in_array($newArea, $oldAreas) && $newArea != '')
				{
					$this->home_model->addServiceArea(array('area' => $newArea));
				}
			}
			// Delete any services from db that were not in POST
			foreach ($oldAreas as $oldArea)
			{
				if ($newAreas == null || !in_array($oldArea, $newAreas))
				{
					$this->home_model->deleteServiceArea(array('area' => $oldArea));
				}
			}
			$this->session->set_flashdata('message', 'Saved.');
		}

		$data['serviceAreas'] = $this->home_model->getServiceAreas();
		$data['page_title'] = 'Service Areas';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/service_areas');
		$this->load->view('admin/layout/footer');
	}



	private function configureUpload($path)
	{
		$config['upload_path'] 		= $path;
		$config['allowed_types'] 	= 'gif|jpg|png';
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
		$unique = $this->image_model->check_path_unique('carousel', $path);
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
						'redirect' 	=> base_url() . 'admin-home/carousel'
					);
				break;
			default:
				$response = array('result' => 'Button not found');
				break;
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));

	}

}
