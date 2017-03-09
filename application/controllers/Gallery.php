<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'utility'));
		$this->load->library(array('session', 'pagination'));
		$this->load->model(array('home_model', 'image_model'));
	}

	public function index()
	{
		redirect(base_url() . 'gallery/view/gallery/1');
	}

	public function view($category = 'gallery', $page = 1)
	{
		$data['categories'] = $this->image_model->getCategories();
		$total = $this->image_model->getImageCount('gallery', $category);

		$start = ($page * 4 - 4);

		$config = $this->configurePagination($category, $total);
		$this->pagination->initialize($config);

        $data['page_title'] = 'Gallery';
        $data['marquee'] = $data['marquee'] = $this->home_model->getMarquee();

        $data['images'] = $this->image_model->getImages('gallery', $category, $start);

		$this->load->view('layout/header', $data);
		$this->load->view('gallery', $data);
		$this->load->view('layout/footer');
	}

	private function configurePagination($category, $total)
	{
		$config['base_url'] = base_url() . 'gallery/view/' . $category . '/';
		$config['total_rows'] = $total;
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

		return $config;
	}
}
