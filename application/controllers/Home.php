<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'utility'));
		$this->load->library(array('form_validation','session', 'email'));
		$this->load->model(array('site_model', 'home_model', 'image_model'));
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
			'lawn-care' => 'Lawn Care',
			'landscaping' => 'Landscaping',
			'snow-removal' => 'Snow Removal',
			'employment' => 'Employment',
			'other' => 'Other'
		);

		if ($this->form_validation->run())
		{
			if (empty($this->input->post('name')))
			{
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('webmaster@starkscapes.com', 'StarkScapes.com');
				$email = $this->site_model->getEmail();
				// $this->email->to('starkscapesllc@gmail.com');
				$this->email->to($email);
				$this->email->subject('Estimate Requested');
				$logo = base_url() . 'assets/images/starkscapes.png';
				$this->email->attach($logo, 'inline');
				$cid = $this->email->attachment_cid($logo);
				
				$message = "";
				$message .= "<img src='cid:" . $cid . "' alt='StarkScapes Logo'><br />\n";
				$message .= "<p style='background:#016934;color:#FFF;padding:5%;border-radius:10px;'>\n";
				$message .= $this->input->post('fname') . " " . $this->input->post('lname') . " is contacting StarkScapes for \n";
				if ($this->input->post('service_dropdown') != 'other' || empty($this->input->post('other')))
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

				$this->site_model->addContact(array('first_name' => $this->input->post('fname'), 'last_name' => $this->input->post('lname'), 'phone' => $this->input->post('phone'), 'email' => $this->input->post('email'), 'address' => $this->input->post('address'), 'service' => $data['service_dropdown'][$this->input->post('service_dropdown')], 'other' => $this->input->post('other'), 'message' => $this->input->post('message')));
			}
			$data['success'] = 'Thank you, we will contact you soon.';
		}

		$data['carouselImages'] = $this->image_model->getImages('Home', 'Carousel');
		$data['about'] = $this->home_model->getAbout();

		$data['services'] = $this->image_model->getImages('Services', 'Services');
		$services = $this->home_model->getServiceIcon();
		for ($n = 0; $n < count($data['services']);$n++)
		{
			$data['services'][$n]['icon'] = $services[$n]['icon'];
		}

		$data['contactMessage'] = $this->site_model->getContactMessage();

		$data['serviceAreas'] = $this->home_model->getServiceAreas();

		init_wrap_session();

		$data['site_name'] = $_SESSION['wrap']['site_name'];
		$data['keywords'] = $_SESSION['wrap']['keywords'];
		$data['description'] = $_SESSION['wrap']['description'];
		$data['marquee'] = $_SESSION['wrap']['marquee'];
		$data['businessHours'] = $_SESSION['wrap']['businessHours'];
		$data['businessInfo'] = $_SESSION['wrap']['businessInfo'];
		$data['logo'] = $_SESSION['wrap']['logo'];
		$data['background'] = $_SESSION['wrap']['background'];

		$data['page_title'] = 'Home';

		$this->load->view('layout/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer', $data);
	}
}
