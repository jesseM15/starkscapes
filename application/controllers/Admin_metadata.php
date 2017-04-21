<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_metadata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin', 'utility'));
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('site_model', 'image_model'));
		protect();
		$this->session->set_flashdata('error', '');
		$this->session->set_flashdata('message', '');
	}

	public function index()
	{
		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['page_title'] = 'Admin Metadata';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/metadata', $data);
		$this->load->view('admin/layout/footer');
	}

	public function keywords()
	{
		if (!empty($this->input->post()))
		{
			$keywords = $this->site_model->getKeywords();
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
			for ($b = 0; $b < count($keywords); $b++)
			{
				$deleted = TRUE;
				for ($c = 0; $c < count($current); $c++)
				{
					if ($current[$c]['id'] === $keywords[$b]['id'])
					{
						$deleted = FALSE;
						if ($current[$c]['text'] !== $keywords[$b]['text'])
						{
							$this->site_model->setKeyword(array('id' => $current[$c]['id'], 'text' => $current[$c]['text']));
						}
					}
				}
				if ($deleted)
				{
					$this->site_model->deleteKeyword(array('id' => $keywords[$b]['id']));
				}
			}
			if (!empty($_POST['new']))
			{
				foreach ($_POST['new'] as $new)
				{
					$this->site_model->addKeyword(array('text' => $new));
				}
			}
			$this->session->set_flashdata('message', 'Saved.');
		}

		$data['keywords'] = $this->site_model->getKeywords();

		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['page_title'] = 'Admin Metadata - Keywords';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/keywords', $data);
		$this->load->view('admin/layout/footer');
	}

	public function description()
	{
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		if ($this->form_validation->run() === TRUE)
		{
			$this->site_model->setDescription($this->input->post('description', TRUE));
			$this->session->set_flashdata('message', 'Saved.');
		}
		$this->session->set_flashdata('error', validation_errors());

		$data['description'] = $this->site_model->getDescription()['description'];
		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['page_title'] = 'Admin Metadata - Description';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/description', $data);
		$this->load->view('admin/layout/footer');
	}

	public function name()
	{
		$this->form_validation->set_rules('name', 'Site Name', 'trim|required');

		if ($this->form_validation->run() === TRUE)
		{
			$this->site_model->setSiteName($this->input->post('name', TRUE));
			$this->session->set_flashdata('message', 'Saved.');
		}
		$this->session->set_flashdata('error', validation_errors());

		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['page_title'] = 'Admin Metadata - Site Name';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/name', $data);
		$this->load->view('admin/layout/footer');
	}

}
