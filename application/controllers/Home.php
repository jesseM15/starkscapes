<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('form_validation','session', 'email'));
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
            $config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('webmaster@starkscapes.com', 'StarkScapes.com');
			$this->email->to('muddybuzzy@gmail.com');
			$this->email->subject('Estimate Requested');
			$message = "";
			$message .= "Starkscapes.com has received an estimate request.<br />\n";
			$message .= "<h1>" . $this->input->post('subject') . "</h1><br />\n";
			$message .= "<p>" . $this->input->post('message') . "</p>\n";
			$message .= $this->input->post('email') . "<br />\n";
			$message .= $this->input->post('phone') . "<br />\n";
			$this->email->message($message);

			$this->email->send();
            $data['success'] = 'Thank you, we will contact you soon.';
        }
        
        $data['page_title'] = 'Home';

		$this->load->view('layout/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer');
	}
}
