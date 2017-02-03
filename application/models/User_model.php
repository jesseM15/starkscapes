<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }
    
    public function login($email, $password)
    {
        $salt = $this->get_salt($email);

        $this->db->where('email', $email);
        $this->db->where('password', hash('sha512', $password . $salt));
        $this->db->limit(1);
        
        $result = $this->db->get('user');
        
        if ($result && $result->num_rows() == 1)
        {
            return $result->result();
        }
        
        return false;
    }

    private function get_salt($email)
    {
        $this->db->where('email', $email);
        $this->db->limit(1);
        $result = $this->db->get('user');

        $salt = '';
        if ($result && $result->num_rows() == 1)
        {
            foreach ($result->result() as $row)
            {
                $salt = $row->salt;
            }
        }
        return $salt;
    }

    public function register($user)
    {
        /*
         * $user['email']
         * $user['password']
         * $user['salt']
         * $user['role']
         */
        $this->db->insert('user', $user);
        return $this->db->insert_id();
    }

    public function email_available($email)
    {
        $this->db->where('email', $email);
        $result = $this->db->get('user');

        if ($result && $result->num_rows() == 0)
        {
            return true;
        }

        return false;
    }
    
}
