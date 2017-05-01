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
		$this->session->set_flashdata('error', '');
		$this->session->set_flashdata('message', '');
	}

	public function index()
	{
		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
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
			$this->site_model->setContactMessage(phone_text_to_link($this->input->post('message', TRUE)));
			$this->session->set_flashdata('message', 'Saved.');
		}
		$this->session->set_flashdata('error', validation_errors());

		$data['contactMessage'] = phone_link_to_text($this->site_model->getContactMessage());
		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['page_title'] = 'Admin Contact Message';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/message', $data);
		$this->load->view('admin/layout/footer');
	}

	public function phone()
	{
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|regex_match[/^[0-9]{10}$/]');

		if ($this->form_validation->run() === TRUE)
		{
			$this->site_model->setPhone($this->input->post('phone', TRUE));
			$this->session->set_flashdata('message', 'Saved.');
		}
		$this->session->set_flashdata('error', validation_errors());

		$data['phone'] = $this->site_model->getPhone();
		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['page_title'] = 'Admin Phone Number';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/phone', $data);
		$this->load->view('admin/layout/footer');
	}

	public function email()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() === TRUE)
		{
			$this->site_model->setEmail($this->input->post('email', TRUE));
			$this->session->set_flashdata('message', 'Saved.');
		}
		$this->session->set_flashdata('error', validation_errors());

		$data['email'] = $this->site_model->getEmail();
		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['page_title'] = 'Admin Email';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/email', $data);
		$this->load->view('admin/layout/footer');
	}

	public function contacts()
	{
		$data['contacts'] = $this->site_model->getContacts();
		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['page_title'] = 'Admin Phone Number';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/contacts', $data);
		$this->load->view('admin/layout/footer');
	}

}
