<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function getAbout()
    {
        $this->db->select('content');
        $result = $this->db->get('about')->row_array(1);
        return $result;
    }

    public function setAbout($content)
    {
        $data = array('id' => 1, 'content' => $content);
        $this->db->replace('about', $data);
    }

    public function getContactMessage()
    {
        $this->db->select('message');
        $result = $this->db->get('contact_message')->row_array(1);
        return $result;
    }

    public function getServiceAreas()
    {
        $this->db->select('area');
        $result = $this->db->get('service_area')->result_array();
        return $result;
    }

    public function getServiceIcon($id = 0)
    {
        if ($id > 0)
        {
            $this->db->where('id', $id);
        }
        $this->db->select('icon');
        $serviceCategory = $this->db->get('service_category')->result_array();

        for ($n = 0;$n < count($serviceCategory);$n++)
        {
            $result[$n]['icon'] = $serviceCategory[$n]['icon'];
        }

        return $result;
    }

    public function getMarquee()
    {
        $result = $this->db->get('marquee')->result_array();
        return $result;
    }
    
}
