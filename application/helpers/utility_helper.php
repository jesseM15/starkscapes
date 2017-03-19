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
