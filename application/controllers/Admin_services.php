<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin', 'utility'));
		$this->load->library(array('form_validation','session', 'upload'));
		$this->load->model(array('service_model', 'image_model'));
		protect();
		$this->session->set_flashdata('error', '');
		$this->session->set_flashdata('message', '');
	}

	public function index()
	{
		$data['services'] = $this->service_model->getServices();
		$data['page_title'] = 'Admin Services';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/services', $data);
		$this->load->view('admin/layout/footer');
	}

	public function service($service)
	{
		$config = $this->configureUpload('assets/uploads/services/');
		$this->upload->initialize($config);

		$this->form_validation->set_rules('category', 'Name', 'required');
		$this->form_validation->set_rules('file', 'File', 'trim');

		if ($this->form_validation->run() == TRUE)
		{
			$servicesList = $this->service_model->getServices();
			$images = $this->image_model->getImages('Services', 'Services');
			$image = '';

			for ($n = 0;$n < count($servicesList);$n++)
			{
				if (format_as_class($servicesList[$n]['service']) === $service)
				{
					$serviceData = $servicesList[$n];
					$image = $images[$n];
				}
			}

			$saved = FALSE;

			if (!empty($_FILES['file']['name']))
			{
				$width = 0;
				$height = 0;
				if (empty($_FILES["file"]["tmp_name"]))
				{
					$this->session->set_flashdata('error', $this->upload->display_errors());
				}
				else
				{
					$size = getimagesize($_FILES["file"]["tmp_name"]);
					$width = $size[0];
					$height = $size[1];
				}

				if ($width != $height)
				{
					// check if file dimensions are square
					$this->session->set_flashdata('error', 'Image height and width must be equal.');
				}
				if (file_exists('assets/uploads/services/' . $_FILES['file']['name']))
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
					$image['path'] = 'assets/uploads/services/' . $_FILES['file']['name'];
					$image['text'] = $serviceData['service'];
					$image['owner'] = 'Services';
					$image['category_id'] = 3;
					$this->image_model->setImage($image);
					$saved = TRUE;
				}
			}
			elseif ($this->input->post('selectedImage', TRUE))
			{
				$url = $this->input->post('selectedImage', TRUE);
				$url = explode('/', $url);
				$fileName = end($url);
				$image['path'] = 'assets/uploads/services/' . $fileName;
				$image['text'] = $serviceData['service'];
				$image['owner'] = 'Services';
				$image['category_id'] = 3;
				$this->image_model->setImage($image);
				$saved = TRUE;
			}
			else
			{
				// Just save the service and/or content
				$saved = TRUE;
			}
			if ($saved)
			{
				$serviceData['service'] = $this->input->post('category', TRUE);
				$serviceData['content'] = $this->input->post('content', TRUE);
				$this->service_model->setService($serviceData);
				$this->session->set_flashdata('message', 'Saved.');
			}
		}

		$services = $this->service_model->getServices();
		$images = $this->image_model->getImages('Services', 'Services');

		// Put the image array into the service array
		for ($n = 0;$n < count($services);$n++)
		{
			$services[$n]['image'] = $images[$n];
		}

		$data['services'] = $services;
		$data['page_title'] = 'Service';
		$data['service'] = '';

		foreach ($data['services'] as $services)
		{
			if (format_as_class($services['service']) === $service)
			{
				$data['service'] = $services;
				$data['page_title'] = $data['service']['service'];
			}
		}

		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$data['folderImages'] =  glob('assets/uploads/services/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/service', $data);
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
