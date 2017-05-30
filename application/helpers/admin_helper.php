<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('protect'))
{
	/**
	 * protect
	 *
	 * Protects from unauthorized access.  Redirects to login page
	 * if user is not logged in.
	 *
	 */
	function protect()
	{
		$CI = & get_instance();		//get instance, access the CI superobject
		if(!$CI->session->logged_in)
		{
			redirect(base_url('user/login'));
		}
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('init_admin_wrap_session'))
{
	/**
	 * init_admin_wrap_session
	 *
	 * Sets session variables for all of the variables that get
	 * displayed on every page.  This allows for fewer database
	 * queries as much of the data is redundant.
	 *
	 */
	function init_admin_wrap_session()
	{
		if (!isset($_SESSION['admin_wrap']))
		{
			$CI =& get_instance();
			$CI->load->model('site_model');
			$_SESSION['admin_wrap']['site_name'] = $CI->site_model->getSiteName()['site_name'];

			$CI->load->model('image_model');
			$_SESSION['admin_wrap']['background'] = $CI->image_model->getImages('Site', 'Background', 0, 1)[0];
		}

	}
}
