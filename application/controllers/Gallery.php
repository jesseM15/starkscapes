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

		$data['site_name'] = $this->site_model->getSiteName()['site_name'];
		$data['keywords'] = format_keywords($this->site_model->getKeywords());
		$data['description'] = $this->site_model->getDescription()['description'];
        $data['page_title'] = 'Gallery';
        $data['marquee'] = $data['marquee'] = $this->site_model->getMarquee();
        $data['logo'] = $this->image_model->getImages('Site', 'Logo', 0, 1)[0];
        $data['background'] = $this->image_model->getImages('Site', 'Background', 0, 1)[0];

        $data['images'] = $this->image_model->getImages('gallery', $category, $start);

        $data['businessHours'] = $this->site_model->getHours();
        $data['businessInfo'] = $this->site_model->getBusinessInfo();

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
