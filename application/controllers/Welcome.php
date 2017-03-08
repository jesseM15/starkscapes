<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('home_model'));
	}

	public function index()
	{
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('session', 'form_validation'));
		
		if(!$this->session->logged_in)
		{
            redirect(base_url('user/login'));
		}

		$data['page_title'] = 'Welcome';
		$data['id'] = $this->session->logged_in['id'];
		$data['email'] = $this->session->logged_in['email'];
		$data['role'] = $this->session->logged_in['role'];

		$data['about'] = $this->home_model->getAbout();

		$this->load->view('layout/header', $data);
		$this->load->view('welcome', $data);
		$this->load->view('layout/footer');
	}
	
	public function getContent()
	{
		$this->home_model->setAbout($this->input->post('content'));
		$this->index();
	}
}
