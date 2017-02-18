<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library(array('session'));
	}

	public function index()
	{
		$data['page_title'] = 'Services';

		$this->load->view('layout/header', $data);
		$this->load->view('services', $data);
		$this->load->view('layout/footer');
	}
}
