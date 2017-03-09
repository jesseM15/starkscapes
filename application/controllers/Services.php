<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'utility'));
		$this->load->library(array('session'));
		$this->load->model(array('home_model', 'service_model', 'image_model'));
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
		$data['page_title'] = 'Services';
		$data['marquee'] = $data['marquee'] = $this->home_model->getMarquee();

		$this->load->view('layout/header', $data);
		$this->load->view('services', $data);
		$this->load->view('layout/footer');
	}
}
