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

        $data['carouselImages'][0]['filepath'] = base_url() . 'assets/uploads/2.jpg';
		$data['carouselImages'][0]['imagetext'] = 'testing';
		$data['carouselImages'][1]['filepath'] = base_url() . 'assets/uploads/3.jpg';
		$data['carouselImages'][1]['imagetext'] = 'testing2';
		$data['carouselImages'][2]['filepath'] = base_url() . 'assets/uploads/4.jpg';
		$data['carouselImages'][2]['imagetext'] = 'testing3';

		$data['about']['header'] = 'StarkScapes';
		$data['about']['content'] = '<p>This is the about section.  I am just typing this here to take up space.  It is going to be a pretty epic story about a robot and a dinosaur.  Long ago the dinosaur was frozen in a glacier, only to be thawed out millenia later by a robot scouring the earth aeons after humanity had been gone.</p>
			<p>The robot dug out the dino, but was doomed to repeat his actions.</p>
			<p>This is the about section.  I am just typing this here to take up space.  It is going to be a pretty epic story about a robot and a dinosaur.  Long ago the dinosaur was frozen in a glacier, only to be thawed out millenia later by a robot scouring the earth aeons after humanity had been gone.</p>
			<p>The robot dug out the dino, but was doomed to repeat his actions.</p>';

		$data['lawncare']['image'] = base_url() . 'assets/uploads/lawncare.jpg';
		$data['landscaping']['image'] = base_url() . 'assets/uploads/landscaping.jpg';
		$data['snowRemoval']['image'] = base_url() . 'assets/uploads/snowremoval.jpg';
		$data['lawncare']['alt'] = 'Lawncare';
		$data['landscaping']['alt'] = 'Landscaping';
		$data['snowRemoval']['alt'] = 'Snow Removal';

		$data['contactMessage'] = 'Call us at <a href="tel:3302656058">330-265-6058</a> or fill out the form below for a free estimate within 24 hours.';

		$data['serviceAreas'] = array(
			'Jackson',
			'Perry',
			'Massillon',
			'Canton',
			'Canton South',
			'Plain Township',
			'North Canton',
			'Louisville');

		$this->load->view('layout/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer');
	}
}
