<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin', 'utility'));
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('site_model', 'image_model'));
		protect();
	}

	public function index()
	{
		$data['page_title'] = 'Admin Contact';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/contact', $data);
		$this->load->view('admin/layout/footer');
	}

	public function message()
	{
		$this->form_validation->set_rules('message', 'Message', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->site_model->setContactMessage($this->input->post('message'), TRUE);
			$this->session->set_flashdata('message', 'Saved.');
		}

		$data['contactMessage'] = $this->site_model->getContactMessage();
		$data['page_title'] = 'Admin Contact Message';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/message', $data);
		$this->load->view('admin/layout/footer');
	}

}
