<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library(array('session', 'pagination'));
	}

	public function index()
	{
		redirect(base_url() . 'gallery/page');
	}

	public function page($page = 1)
	{
		$start = $page * 4 - 3;
		$end = $page * 4;

		for ($n = 1;$n <= 8;$n++)
		{
			if ($n >= $start && $n <= $end)
			{
				$data['imageData'][$n]['filepath'] = base_url() . 'assets/uploads/' . $n . '.jpg';
			}
		}

		$config['base_url'] = base_url() . 'gallery/page/';
		$config['total_rows'] = 8;
		$config['per_page'] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['full_tag_open'] = '<div class="paginationWrap">';
		$config['full_tag_close'] = '</div>';
		$config['prev_tag_open'] = '<div class="pagination">';
		$config['prev_tag_close'] = '</div>';
		$config['next_tag_open'] = '<div class="pagination">';
		$config['next_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class="pagination pagination-cur">';
		$config['cur_tag_close'] = '</div>';
		$config['num_tag_open'] = '<div class="pagination">';
		$config['num_tag_close'] = '</div>';

		$this->pagination->initialize($config);

        $data['page_title'] = 'Gallery';

		$this->load->view('layout/header', $data);
		$this->load->view('gallery', $data);
		$this->load->view('layout/footer');
	}
}
