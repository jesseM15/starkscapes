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

		$data['services']['lawncare'] = array(
			'Residential' => 'Our core business is residential lawncare and we pride ourselves on our work.  Your lawn will look great and you can worry about other things.  Let us give your lawn the StarkScapes treatment today!', 
			'Commercial' => 'Large or small, we can take care of your lawncare needs at a competitive price.  StarkScapes can give your lawn the attention to detail that it needs to give your business that professional look.');
		$data['services']['landscaping'] = array(
			'Pruning' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 
			'Mulch Installation' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 
			'Bed Edging' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 
			'Cleanups - Spring and Fall' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 
			'Aeration' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 
			'Bed Maintenance' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ');
		$data['services']['snow-removal'] = array(
			'Driveways' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 
			'Sidewalks' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 
			'Salt' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ', 
			'Parking Lots' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum ');
		$data['services']['lawncare-image'] = base_url() . 'assets/uploads/lawncare.jpg';
		$data['services']['landscaping-image'] = base_url() . 'assets/uploads/landscaping.jpg';
		$data['services']['snow-removal-image'] = base_url() . 'assets/uploads/snowremoval.jpg';
		$data['services']['lawncare-image-alt'] = 'Lawncare';
		$data['services']['landscaping-image-alt'] = 'Landscaping';
		$data['services']['snow-removal-image-alt'] = 'Snow Removal';

		$data['page_title'] = 'Services';

		$this->load->view('layout/header', $data);
		$this->load->view('services', $data);
		$this->load->view('layout/footer');
	}
}
