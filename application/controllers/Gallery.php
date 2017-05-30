<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'utility'));
		$this->load->library(array('session', 'pagination'));
		$this->load->model(array('site_model', 'image_model'));
	}

	public function index()
	{
		$category = $this->image_model->getGalleryCategories()[0]['url_segment'];
		redirect(base_url() . 'gallery/view/' . $category . '/1');
	}

	public function view($category = 'gallery', $page = 1)
	{
		$data['categories'] = $this->image_model->getGalleryCategories();
		$total = $this->image_model->getImageCount('gallery', $category);

		$start = ($page * PER_PAGE - PER_PAGE);

		$config = $this->configurePagination($category, $total);
		$this->pagination->initialize($config);

		$data['images'] = $this->image_model->getImages('gallery', $category, $start);

		init_wrap_session();

		$data['site_name'] = $_SESSION['wrap']['site_name'];
		$data['keywords'] = $_SESSION['wrap']['keywords'];
		$data['description'] = $_SESSION['wrap']['description'];
		$data['marquee'] = $_SESSION['wrap']['marquee'];
		$data['businessHours'] = $_SESSION['wrap']['businessHours'];
		$data['businessInfo'] = $_SESSION['wrap']['businessInfo'];
		$data['logo'] = $_SESSION['wrap']['logo'];
		$data['background'] = $_SESSION['wrap']['background'];

		$data['page_title'] = 'Gallery';

		$this->load->view('layout/header', $data);
		$this->load->view('gallery', $data);
		$this->load->view('layout/footer', $data);
	}

	private function configurePagination($category, $total)
	{
		$config['base_url'] = base_url() . 'gallery/view/' . $category . '/';
		$config['total_rows'] = $total;
		$config['per_page'] = PER_PAGE;
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
