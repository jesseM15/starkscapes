<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'admin', 'utility'));
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('home_model'));
		protect();
	}

	public function index()
	{
		$data['page_title'] = 'Admin Home';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/home');
	}

	public function about()
	{
		if (!empty($this->input->post('about')))
		{
			$this->home_model->setAbout($this->input->post('about'));
			$this->session->set_flashdata('message', 'Saved.');
		}
		$data['page_title'] = 'Admin Home - About';
		$data['about'] = $this->home_model->getAbout();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/about');
	}

	public function areas()
	{
		if (!empty($this->input->post()))
		{
			$serviceAreas = $this->home_model->getServiceAreas();
			for ($n = 0;$n < count($serviceAreas);$n++)
			{
				$oldAreas[$n] = $serviceAreas[$n]['area'];
			}
			$newAreas = $_POST['areas'];

			foreach ($newAreas as $newArea)
			{
				if ($oldAreas == null && $newArea != '')
				{
					$this->home_model->addServiceArea(array('area' => $newArea));
				}
				elseif (!in_array($newArea, $oldAreas) && $newArea != '')
				{
					$this->home_model->addServiceArea(array('area' => $newArea));
				}
			}
			// Delete any services from db that were not in POST
			foreach ($oldAreas as $oldArea)
			{
				if ($newAreas == null || !in_array($oldArea, $newAreas))
				{
					$this->home_model->deleteServiceArea(array('area' => $oldArea));
				}
			}
		}

		$data['serviceAreas'] = $this->home_model->getServiceAreas();
		$data['page_title'] = 'Service Areas';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/service_areas');
	}

}
