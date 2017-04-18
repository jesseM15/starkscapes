<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin', 'utility'));
		$this->load->library(array('form_validation','session', 'upload'));
		$this->load->model(array('site_model', 'image_model'));
		protect();
		$this->session->set_flashdata('error', '');
		$this->session->set_flashdata('message', '');
	}

	public function index()
	{
		$data['page_title'] = 'Admin Site';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/site');
		$this->load->view('admin/layout/footer');
	}

	public function marquee()
	{
		if (!empty($this->input->post()))
		{
			$marqueeLines = $this->site_model->getMarquee();
			$c = 0;
			$current = array();
			foreach ($_POST as $key => $value)
			{
				if (strpos($key, 'old') !== FALSE)
				{
					$arr = explode('-', $key);
					$current[$c]['id'] = end($arr);
					$current[$c]['text'] = $value;
					$c++;
				}
			}
			for ($b = 0; $b < count($marqueeLines); $b++)
			{
				$deleted = TRUE;
				for ($c = 0; $c < count($current); $c++)
				{
					if ($current[$c]['id'] === $marqueeLines[$b]['id'])
					{
						$deleted = FALSE;
						if ($current[$c]['text'] !== $marqueeLines[$b]['text'])
						{
							$this->site_model->setMarqueeLine(array('id' => $current[$c]['id'], 'text' => phone_text_to_link($current[$c]['text'])));
						}
					}
				}
				if ($deleted)
				{
					$this->site_model->deleteMarqueeLine(array('id' => $marqueeLines[$b]['id']));
				}
			}
			if (!empty($_POST['new']))
			{
				foreach ($_POST['new'] as $new)
				{
					$this->site_model->addMarqueeLine(array('text' => phone_text_to_link($new)));
				}
			}
			$this->session->set_flashdata('message', 'Saved.');
		}

		$marqueeLines = $this->site_model->getMarquee();
		for ($n = 0; $n < count($marqueeLines); $n++)
		{
			$marqueeLines[$n]['text'] = phone_link_to_text($marqueeLines[$n]['text']);
		}
		$data['marqueeLines'] = $marqueeLines;
		$data['page_title'] = 'Admin Marquee';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/marquee', $data);
		$this->load->view('admin/layout/footer');
	}

	public function logo()
	{
		$config = $this->configureUpload('assets/uploads/logo/');
		$this->upload->initialize($config);

		$this->form_validation->set_rules('file', 'File', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			if (!empty($_FILES['file']['name']))
			{
				if (empty($_FILES["file"]["tmp_name"]))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
				}
				if (file_exists('assets/uploads/logo/' . $_FILES['file']['name']))
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
					$image['id'] = 1;
					$image['path'] = 'assets/uploads/logo/' . $_FILES['file']['name'];
					$image['text'] = 'Logo';
					$image['owner'] = 'Site';
					$image['category_id'] = 1;
					$this->image_model->setImage($image);
					$this->session->set_flashdata('message', 'Saved.');
				}
			}
			elseif ($this->input->post('selectedImage', TRUE))
			{
				$url = $this->input->post('selectedImage', TRUE);
				$url = explode('/', $url);
				$fileName = end($url);
				$image['id'] = 1;
				$image['path'] = 'assets/uploads/logo/' . $fileName;
				$image['text'] = 'Logo';
				$image['owner'] = 'Site';
				$image['category_id'] = 1;
				$this->image_model->setImage($image);
				$this->session->set_flashdata('message', 'Saved.');
			}
		}

		$data['logo'] = $this->image_model->getImages('Site', 'Logo', 0, 1)[0];

		$data['page_title'] = 'Admin Logo';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$data['folderImages'] =  glob('assets/uploads/logo/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/logo', $data);
		$this->load->view('admin/layout/footer');
	}
	
	public function hours()
	{
		if (!empty($this->input->post()))
		{
			$hours = $this->site_model->getHours();
			$c = 0;
			$current = array();
			foreach ($_POST as $key => $value)
			{
				if (strpos($key, 'old') !== FALSE)
				{
					if (strpos($key, 'oldCategory') !== FALSE)
					{
						$arr = explode('-', $key);
						$current[$c]['id'] = end($arr);
						$current[$c]['category'] = $value;
					}
					else
					{
						$current[$c]['text'] = $value;
						$c++;
					}
				}
			}
			for ($h = 0; $h < count($hours); $h++)
			{
				$deleted = TRUE;
				for ($c = 0; $c < count($current); $c++)
				{
					if ($current[$c]['id'] === $hours[$h]['id'])
					{
						$deleted = FALSE;
						if ($current[$c]['category'] !== $hours[$h]['category'] || $current[$c]['text'] !== $hours[$h]['text'])
						{
							$this->site_model->setHours(array('id' => $current[$c]['id'], 'category' => $current[$c]['category'], 'text' => $current[$c]['text']));
						}
					}
				}
				if ($deleted)
				{
					$this->site_model->deleteHours(array('id' => $hours[$h]['id'], 'category' => $hours[$h]['category'], 'text' => $hours[$h]['text']));
				}
			}
			if (!empty($_POST['newCategory']) && !empty($_POST['new']))
			{
				for ($n = 0; $n < count($_POST['newCategory']); $n++)
				{
					$this->site_model->addHours(array('category' => $_POST['newCategory'][$n], 'text' => $_POST['new'][$n]));
				}
			}
			$this->session->set_flashdata('message', 'Saved.');
		}

		$data['businessHours'] = $this->site_model->getHours();
		$data['page_title'] = 'Admin Hours';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/hours', $data);
		$this->load->view('admin/layout/footer');
	}

	public function business()
	{
		if (!empty($this->input->post()))
		{
			$businessInfo = $this->site_model->getBusinessInfo();
			$c = 0;
			$current = array();
			foreach ($_POST as $key => $value)
			{
				if (strpos($key, 'old') !== FALSE)
				{
					if (strpos($key, 'oldCheckbox') !== FALSE)
					{
						$current[$c]['styled'] = $value;
						$c++;
					}
					else
					{
						$arr = explode('-', $key);
						$current[$c]['id'] = end($arr);
						$current[$c]['text'] = $value;
					}
				}
			}
			for ($b = 0; $b < count($businessInfo); $b++)
			{
				$deleted = TRUE;
				for ($c = 0; $c < count($current); $c++)
				{
					if ($current[$c]['id'] === $businessInfo[$b]['id'])
					{
						$deleted = FALSE;
						if ($current[$c]['text'] !== $businessInfo[$b]['text'] || $current[$c]['styled'] !== $businessInfo[$b]['styled'])
						{
							$this->site_model->setBusinessInfo(array('id' => $current[$c]['id'], 'text' => phone_text_to_link($current[$c]['text']), 'styled' => $current[$c]['styled']));
						}
					}
				}
				if ($deleted)
				{
					$this->site_model->deleteBusinessInfo(array('id' => $businessInfo[$b]['id']));
				}
			}
			$n = 0;
			$new = array();
			foreach ($_POST as $key => $value)
			{
				if (strpos($key, 'new') !== FALSE)
				{
					if (strpos($key, 'newCheckbox') !== FALSE)
					{
						$new[$n]['styled'] = $value;
						$n++;
					}
					else
					{
						$new[$n]['text'] = $value;
					}
				}
			}
			if (!empty($new))
			{
				for ($n = 0; $n < count($new); $n++)
				{
					$this->site_model->addBusinessInfo(array('text' => phone_text_to_link($new[$n]['text']), 'styled' => $new[$n]['styled']));
				}
			}
			$this->session->set_flashdata('message', 'Saved.');
		}

		$businessInfos = $this->site_model->getBusinessInfo();
		for ($n = 0; $n < count($businessInfos); $n++)
		{
			$businessInfos[$n]['text'] = phone_link_to_text($businessInfos[$n]['text']);
		}
		$data['businessInfos'] = $businessInfos;
		$data['page_title'] = 'Admin Business Info';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/business', $data);
		$this->load->view('admin/layout/footer');
	}

	public function background()
	{
		$config = $this->configureUpload('assets/uploads/background/');
		$this->upload->initialize($config);

		$this->form_validation->set_rules('file', 'File', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			if (!empty($_FILES['file']['name']))
			{
				if (empty($_FILES["file"]["tmp_name"]))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
				}
				if (file_exists('assets/uploads/background/' . $_FILES['file']['name']))
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
					$image['id'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0]['id'];
					$image['path'] = 'assets/uploads/background/' . $_FILES['file']['name'];
					$image['text'] = 'Background';
					$image['owner'] = 'Site';
					$image['category_id'] = 6;
					$this->image_model->setImage($image);
					$this->session->set_flashdata('message', 'Saved.');
				}
			}
			elseif ($this->input->post('selectedImage', TRUE))
			{
				$url = $this->input->post('selectedImage', TRUE);
				$url = explode('/', $url);
				$fileName = end($url);
				$image['id'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0]['id'];
				$image['path'] = 'assets/uploads/background/' . $fileName;
				$image['text'] = 'Logo';
				$image['owner'] = 'Site';
				$image['category_id'] = 6;
				$this->image_model->setImage($image);
				$this->session->set_flashdata('message', 'Saved.');
			}
		}

		$data['page_title'] = 'Admin Background';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$data['folderImages'] =  glob('assets/uploads/background/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/background', $data);
		$this->load->view('admin/layout/footer');
	}

	private function configureUpload($path)
	{
		$config['upload_path']          = $path;
		$config['allowed_types']        = 'jpg|jpeg|png|gif';
		$config['max_size']             = 10000;
		$config['max_width']            = 10240;
		$config['max_height']           = 10240;

		return $config;
	}

}
