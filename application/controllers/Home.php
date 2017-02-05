<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('form_validation','session'));
	}

	public function index()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('email','Email','required|valid_email|trim');
		$this->form_validation->set_rules('phone', 'Phone', 'required|trim');
		$this->form_validation->set_rules('subject', 'Subject', 'trim');
		$this->form_validation->set_rules('message', 'Message', 'required|trim');

		if($this->form_validation->run())
		{
            // redirect(base_url('thank_you'));
            $data['success'] = 'Thank you, we will contact you soon.';
        }
        
        $data['page_title'] = 'Home';

		$this->load->view('layout/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer');
	}
	
}
