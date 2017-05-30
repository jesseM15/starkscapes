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
		init_admin_wrap_session();

		$data['site_name'] = $_SESSION['admin_wrap']['site_name'];
		$data['background'] = $_SESSION['admin_wrap']['background'];

		$data['page_title'] = 'Admin Contact';

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

		init_admin_wrap_session();

		$data['site_name'] = $_SESSION['admin_wrap']['site_name'];
		$data['background'] = $_SESSION['admin_wrap']['background'];

		$data['page_title'] = 'Admin Contact Message';

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

		init_admin_wrap_session();

		$data['site_name'] = $_SESSION['admin_wrap']['site_name'];
		$data['background'] = $_SESSION['admin_wrap']['background'];

		$data['page_title'] = 'Admin Phone Number';

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

		init_admin_wrap_session();

		$data['site_name'] = $_SESSION['admin_wrap']['site_name'];
		$data['background'] = $_SESSION['admin_wrap']['background'];

		$data['page_title'] = 'Admin Email';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/email', $data);
		$this->load->view('admin/layout/footer');
	}

	public function contacts()
	{
		$data['contacts'] = $this->site_model->getContacts();

		init_admin_wrap_session();

		$data['site_name'] = $_SESSION['admin_wrap']['site_name'];
		$data['background'] = $_SESSION['admin_wrap']['background'];

		$data['page_title'] = 'Admin Phone Number';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/contacts', $data);
		$this->load->view('admin/layout/footer');
	}

}
