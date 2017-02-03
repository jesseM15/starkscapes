<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');
		
		if(!$this->session->logged_in)
		{
            redirect(base_url('user/login'));
		}

		$data['page_title'] = 'Welcome';
		$data['id'] = $this->session->logged_in['id'];
		$data['email'] = $this->session->logged_in['email'];
		$data['role'] = $this->session->logged_in['role'];

		$this->load->view('layout/header', $data);
		$this->load->view('welcome', $data);
		$this->load->view('layout/footer');
	}
	
}
