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
        $serviceCategory = $this->db->get('service_category')->result_array();

        $n = 0;
        foreach ($serviceCategory as $category)
        {
            $this->db->where('category_id', $category['id']);
            $services = $this->db->get('service')->result_array();

            $specific = array();
            foreach ($services as $service)
            {
                $specific[$service['heading']] = $service['content'];
            }

            $result[$n]['category'] = $category['service'];
            $result[$n]['icon'] = $category['icon'];
            $result[$n]['service'] = $specific;

            $n++;
        }

        return $result;
    }

}
