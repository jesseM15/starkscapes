<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin', 'utility'));
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('service_model', 'image_model'));
		protect();
	}

	public function index()
	{
		$data['page_title'] = 'Admin Services';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/services');
	}


}
