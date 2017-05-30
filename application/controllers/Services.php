<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'utility'));
		$this->load->library(array('session'));
		$this->load->model(array('site_model', 'service_model', 'image_model'));
	}

	public function index()
	{
		$services = $this->service_model->getServices();
		$images = $this->image_model->getImages('Services', 'Services');

		// Put the image array into the service array
		for ($n = 0;$n < count($services);$n++)
		{
			$services[$n]['image'] = $images[$n];
		}

		$data['services'] = $services;

		init_wrap_session();

		$data['site_name'] = $_SESSION['wrap']['site_name'];
		$data['keywords'] = $_SESSION['wrap']['keywords'];
		$data['description'] = $_SESSION['wrap']['description'];
		$data['marquee'] = $_SESSION['wrap']['marquee'];
		$data['businessHours'] = $_SESSION['wrap']['businessHours'];
		$data['businessInfo'] = $_SESSION['wrap']['businessInfo'];
		$data['logo'] = $_SESSION['wrap']['logo'];
		$data['background'] = $_SESSION['wrap']['background'];

		$data['page_title'] = 'Services';

		$this->load->view('layout/header', $data);
		$this->load->view('services', $data);
		$this->load->view('layout/footer', $data);
	}
}
