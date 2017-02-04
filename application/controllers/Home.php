<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->library('session');

		$data['page_title'] = 'Home';

		$this->load->view('layout/header', $data);
		$this->load->view('home');
		$this->load->view('layout/footer');
	}
	
}
