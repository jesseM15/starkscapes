<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);
	}

	public function getPhone()
	{
		$this->db->select('phone');
		$result = $this->db->get('contact_info')->row_array(1);
		return $result;
	}

	public function setPhone($phone)
	{
		$data['phone'] = $phone;
		$this->db->where('id', 1);
		$this->db->update('contact_info', $data);
	}

	public function getContactMessage()
	{
		$this->db->select('message');
		$result = $this->db->get('contact_info')->row_array(1);
		return $result;
	}

	public function setContactMessage($message)
	{
		$data['message'] = $message;
		$this->db->where('id', 1);
		$this->db->update('contact_info', $data);
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

	public function getSiteName()
	{
		$this->db->select('site_name');
		$result = $this->db->get('metadata')->row_array(1);
		return $result;
	}

	public function setSiteName($name)
	{
		$data['site_name'] = $name;
		$this->db->where('id', 1);
		$this->db->update('metadata', $data);
	}

	public function getDescription()
	{
		$this->db->select('description');
		$result = $this->db->get('metadata')->row_array(1);
		return $result;
	}

	public function setDescription($description)
	{
		$data['description'] = $description;
		$this->db->where('id', 1);
		$this->db->update('metadata', $data);
	}

	public function getKeywords()
	{
		$result = $this->db->get('keywords')->result_array();
		return $result;
	}

	public function addKeyword($keyword)
	{
		$this->db->insert('keywords', $keyword);
	}

	public function setKeyword($keyword)
	{
		$this->db->replace('keywords', $keyword);
	}

	public function deleteKeyword($keyword)
	{
		$this->db->delete('keywords', $keyword);
	}
	
}
