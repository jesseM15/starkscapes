<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin'));
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('home_model'));
		protect();
	}

	public function index()
	{
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('session', 'form_validation'));
		
		$data['page_title'] = 'Welcome';
		$data['id'] = $this->session->logged_in['id'];
		$data['email'] = $this->session->logged_in['email'];
		$data['role'] = $this->session->logged_in['role'];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/welcome', $data);
	}
	
	public function getContent()
	{
		$this->home_model->setAbout($this->input->post('content'));
		$this->index();
	}
}
