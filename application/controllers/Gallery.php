<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library(array('session'));
	}

	public function index()
	{
		for ($n = 1;$n <= 9;$n++)
		{
			if ($n != 6)
			{
				$data['imageData'][$n]['filepath'] = base_url() . 'assets/uploads/' . $n . '.jpg';
			}
		}

        $data['page_title'] = 'Gallery';

		$this->load->view('layout/header', $data);
		$this->load->view('gallery', $data);
		$this->load->view('layout/footer');
	}
}
