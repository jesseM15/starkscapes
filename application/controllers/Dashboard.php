<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin'));
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('image_model', 'site_model'));
		protect();
	}

	public function index()
	{
		$data['name'] = $this->session->logged_in['name'];
		
		init_admin_wrap_session();

		$data['site_name'] = $_SESSION['admin_wrap']['site_name'];
		$data['background'] = $_SESSION['admin_wrap']['background'];

		$data['page_title'] = 'Dashboard';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/layout/footer');
	}
}
