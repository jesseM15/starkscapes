<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'utility'));
		$this->load->library(array('form_validation','session', 'email'));
		$this->load->model(array('site_model', 'image_model'));
	}

	public function index()
	{
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_message('required', '%s required');
		$this->form_validation->set_message('valid_email', '%s must be valid');
		$this->form_validation->set_rules('fname', 'First Name', 'required|trim');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('phone', 'Phone', 'required|trim');
		$this->form_validation->set_rules('email','Email','valid_email|trim');
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('service_dropdown', 'Service');
		$this->form_validation->set_rules('message', 'Message', 'required|trim');

		$data['service_dropdown'] = array(
			'lawncare' => 'Lawn Care',
			'landscaping' => 'Landscaping',
			'snow-removal' => 'Snow Removal',
			'employment' => 'Employment',
			'other' => 'Other'
		);

		if($this->form_validation->run())
		{
            $config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('webmaster@starkscapes.com', 'StarkScapes.com');
			// $this->email->to('starkscapesllc@gmail.com');
			$this->email->to('muddybuzzy@gmail.com');
			$this->email->subject('Estimate Requested');
			$logo = base_url() . 'assets/images/starkscapes.png';
			$this->email->attach($logo, 'inline');
			$cid = $this->email->attachment_cid($logo);
			
			$message = "";
			$message .= "<img src='cid:" . $cid . "' alt='StarkScapes Logo'><br />\n";
			$message .= "<p style='background:#016934;color:#FFF;padding:5%;border-radius:10px;'>\n";
			$message .= $this->input->post('fname') . " " . $this->input->post('lname') . " is contacting StarkScapes for \n";
			if ($this->input->post('service_dropdown') !== 'other' || empty($this->input->post('other')))
			{
				$message .= strtolower($data['service_dropdown'][$this->input->post('service_dropdown')]) . ".<br />\n";
			}
			elseif (!empty($this->input->post('other')))
			{
				$message .= "the following: " . $this->input->post('other') . ".<br />\n";
			}
			$message .= "<br />They wrote:<br />" . $this->input->post('message') . "</p>\n";
			$message .= "<p>Name: " . $this->input->post('fname') . " " . $this->input->post('lname') . "</p>\n";
			$message .= "<p>Phone: " . $this->input->post('phone') . "</p>\n";
			if ($this->input->post('email'))
			{
				$message .= "<p>Email: " . $this->input->post('email') . "</p>\n";
			}
			if ($this->input->post('address'))
			{
				$message .= "<p>Address: " . $this->input->post('address') . "</p>\n";
			}
			
			$this->email->message($message);
			$this->email->send();
            $data['success'] = 'Thank you, we will contact you soon.';
        }
        
        $data['site_name'] = $this->site_model->getSiteName()['site_name'];
        $data['keywords'] = format_keywords($this->site_model->getKeywords());
        $data['description'] = $this->site_model->getDescription()['description'];
        $data['page_title'] = 'Contact';
        $data['marquee'] = $this->site_model->getMarquee();
        $data['logo'] = $this->image_model->getImages('Site', 'Logo', 0, 1)[0];
        $data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

		$data['contactMessage'] = $this->site_model->getContactMessage();

		$data['businessHours'] = $this->site_model->getHours();
		$data['businessInfo'] = $this->site_model->getBusinessInfo();
		
		$this->load->view('layout/header', $data);
		$this->load->view('contact', $data);
		$this->load->view('layout/footer', $data);
	}
}
