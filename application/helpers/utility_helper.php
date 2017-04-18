<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('format_as_class'))
{
	/**
	 * format_as_class
	 *
	 * Formats an input string to be suitable to use as a class name.
	 * Sets input string to lowercase and replaces spaces with dashes.
	 *
	 * @param	string
	 * @return	string	a lowercase string with spaces replace by dashes
	 */
	function format_as_class($input)
	{
		return strtolower(str_replace(" ","-",$input));
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('format_array'))
{
	/**
	 * format_array
	 *
	 * Formats an array so that is easy to read.
	 * Used for debugging.
	 *
	 * @param	array
	 * @return	string	a nicely formatted array
	 */
	function format_array($input)
	{
		echo '<pre>';
		print_r($input);
		echo '</pre>';
		exit();
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('phone_text_to_link'))
{
	/**
	 * phone_text_to_link
	 *
	 * Takes an input string that contains a keyword '#PHONE' and
	 * converts the keyword into a 'tel' anchor then returns the
	 * output with the replaced text.
	 *
	 * @param	string  Input text containing the special keyword '#PHONE' (or some variation).
	 * @return	string	The input text with #PHONE replaced with 'tel' anchor for making phone call
	 */
	function phone_text_to_link($input)
	{
		$CI =& get_instance();
		$CI->load->model('site_model');
		$unformatted = $CI->site_model->getPhone()['phone'];
		$arr = array(substr($unformatted, 0, 3), substr($unformatted, 3, 3), substr($unformatted, 6, 4));
		$formatted = $arr[0] . '-' . $arr[1] . '-' . $arr[2];
		$new = '<a href="tel:' . $unformatted . '">' . $formatted . '</a>';
		$replace = array('#PHONE', '#Phone', '#phone');
		$output = str_replace($replace, $new, $input);
		return $output;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('phone_link_to_text'))
{
	/**
	 * phone_link_to_text
	 *
	 * Takes an input string that contains a 'tel' anchor and
	 * converts the anchor into a keyword '#PHONE' then returns the
	 * output with the replaced text.
	 *
	 * @param	string  Input text containing a 'tel' anchor with the contact phone number
	 * @return	string	The input text with 'tel' anchor replaced with #PHONE for use in the admin area
	 */
	function phone_link_to_text($input)
	{
		$CI =& get_instance();
		$CI->load->model('site_model');
		$unformatted = $CI->site_model->getPhone()['phone'];
		$arr = array(substr($unformatted, 0, 3), substr($unformatted, 3, 3), substr($unformatted, 6, 4));
		$formatted = $arr[0] . '-' . $arr[1] . '-' . $arr[2];
		$replace = '<a href="tel:' . $unformatted . '">' . $formatted . '</a>';
		$new = '#PHONE';
		$output = str_replace($replace, $new, $input);
		return $output;
	}
}
