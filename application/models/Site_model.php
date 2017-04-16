<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);
	}

	public function getContactMessage()
	{
		$this->db->select('message');
		$result = $this->db->get('contact_message')->row_array(1);
		return $result;
	}

	public function setContactMessage($message)
	{
		$data = array('id' => 1, 'message' => $message);
		$this->db->replace('contact_message', $data);
	}

	public function getMarquee()
	{
		$result = $this->db->get('marquee')->result_array();
		return $result;
	}

	public function addMarqueeLine($marquee)
	{
		$this->db->insert('marquee', $marquee);
	}

	public function setMarqueeLine($marquee)
	{
		$this->db->replace('marquee', $marquee);
	}

	public function deleteMarqueeLine($marquee)
	{
		$this->db->delete('marquee', $marquee);
	}

	public function getBusinessInfo()
	{
		$result = $this->db->get('business_info')->result_array();
		return $result;
	}

	public function addBusinessInfo($info)
	{
		$this->db->insert('business_info', $info);
	}

	public function setBusinessInfo($info)
	{
		$this->db->replace('business_info', $info);
	}

	public function deleteBusinessInfo($info)
	{
		$this->db->delete('business_info', $info);
	}

	public function getHours()
	{
		$result = $this->db->get('hours')->result_array();
		return $result;
	}

	public function addHours($hours)
	{
		$this->db->insert('hours', $hours);
	}

	public function setHours($hours)
	{
		$this->db->replace('hours', $hours);
	}

	public function deleteHours($hours)
	{
		$this->db->delete('hours', $hours);
	}
	
}
