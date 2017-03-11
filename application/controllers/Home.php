<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'utility'));
		$this->load->library(array('form_validation','session', 'email'));
		$this->load->model(array('home_model', 'image_model'));
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

		if ($this->form_validation->run())
		{
            $config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('webmaster@starkscapes.com', 'StarkScapes.com');
			$this->email->to('muddybuzzy@gmail.com');
			$this->email->subject('Estimate Requested');
			
			$message = "";
			$message .= $this->input->post('fname') . " " . $this->input->post('lname') . "is contacting StarkScapes for \n";
			if ($this->input->post('subject') != 'other' || empty($this->input->post('other')))
			{
				$message .= strtolower($this->input->post('subject')) . "<br />\n";
			}
			elseif (!empty($this->input->post('other')))
			{
				$message .= "the following:<br />\n";
				$message .= "<p>" . $this->input->post('other') . "</p><br />\n";
			}
			$message .= "<p class='well'>" . $this->input->post('message') . "</p>\n";
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
        
        $data['page_title'] = 'Home';
        $data['marquee'] = $data['marquee'] = $this->home_model->getMarquee();

		$data['carouselImages'] = $this->image_model->getImages('Home', 'Carousel');
		$data['about'] = $this->home_model->getAbout();

		$data['services'] = $this->image_model->getImages('Services', 'Services');
		$services = $this->home_model->getServiceIcon();
		for ($n = 0; $n < count($data['services']);$n++)
		{
			$data['services'][$n]['icon'] = $services[$n]['icon'];
		}

		$data['contactMessage'] = $this->home_model->getContactMessage();
		$data['service_dropdown'] = array(
			'lawncare' => 'Lawn Care',
			'landscaping' => 'Landscaping',
			'snow-removal' => 'Snow Removal',
			'employment' => 'Employment',
			'other' => 'Other'
			);

		$data['serviceAreas'] = $this->home_model->getServiceAreas();

		$this->load->view('layout/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer');
	}
}
