<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'utility'));
		$this->load->library(array('session'));
		$this->load->model(array('site_model', 'image_model'));
	}

	public function index()
	{
		
		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['keywords'] = '404, Error';
		$data['description'] = 'A 404 error has occurred.';
		$data['page_title'] = '404 Error';
		$data['marquee'] = $data['marquee'] = $this->site_model->getMarquee();
		$data['logo'] = $this->image_model->getImages('Site', 'Logo', 0, 1)[0];
		$data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];
		$data['businessHours'] = $this->site_model->getHours();
		$data['businessInfo'] = $this->site_model->getBusinessInfo();

		$this->load->view('layout/header', $data);
		$this->load->view('error', $data);
		$this->load->view('layout/footer', $data);
	}

}
