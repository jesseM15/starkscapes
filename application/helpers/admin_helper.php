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
