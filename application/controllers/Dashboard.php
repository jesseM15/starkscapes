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
		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['page_title'] = 'Dashboard';
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];
		$data['id'] = $this->session->logged_in['id'];
		$data['email'] = $this->session->logged_in['email'];
		$data['role'] = $this->session->logged_in['role'];
		$data['name'] = $this->session->logged_in['name'];

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/layout/footer');
	}
}
