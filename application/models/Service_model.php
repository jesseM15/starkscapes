<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function getServices($id = 0)
    {
        if ($id > 0)
        {
            $this->db->where('id', $id);
        }
        $result = $this->db->get('service')->result_array();
        return $result;
    }

    public function setService($service)
    {
        $this->db->replace('service', $service);
    }

}
