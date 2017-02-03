<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
        $this->load->model('user_model');
    }

	public function index()
	{
		$this->login();
	}

	public function login()
    {
        $this->form_validation->set_rules('login_email','E-mail','required|trim');
        $this->form_validation->set_rules('login_password','Password','required|trim|callback_check_credentials');

        //Redirect if validation succeeds
        if($this->form_validation->run()){
            redirect(base_url('welcome'));
        }
        //Load login screen if validation fails
        $data['page_title'] = 'User Login';
        $this->load->view('layout/header', $data);
        $this->load->view('login');
        $this->load->view('layout/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();

        redirect(base_url('user/login'));
    }

    public function register()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('register_email', 'Email', 'trim|required|valid_email|callback_check_email');
        $this->form_validation->set_rules('register_password', 'Password', 'trim|required');

        if ($this->form_validation->run())
        {
            $salt = uniqid(mt_rand(), true);
            $user = array(
                'email' => $this->input->post('register_email', true),
                'password' => hash('sha512', ($this->input->post('register_password', true) . $salt)),
                'salt'     => $salt,
                'role'     => 'user'
            );
            $session_array['id'] = $this->user_model->register($user);
            $session_array['email'] = $user['email'];
            $session_array['role'] = $user['role'];
            $this->session->set_userdata('logged_in',$session_array);
            redirect(base_url('welcome'));
        }

        $data['page_title'] = 'Register';
        $this->load->view('layout/header', $data);
        $this->load->view('register', $data);
        $this->load->view('layout/footer');
    }

    public function check_credentials($password)
    {
        $email = $this->input->post('login_email');

        //Authenticate credentials
        $result = $this->user_model->login($email,$password);

        if ($result){
            $session_array = array();
            foreach ($result as $row){
                $session_array['id'] = $row->id;
                $session_array['email'] = $row->email;
                $session_array['role'] = $row->role;
            }

            $this->session->set_userdata('logged_in',$session_array);
            return true;
        }

        $this->form_validation->set_message('check_credentials','Invalid email or password');
        return false;
    }

    public function check_email($email)
    {
        if ($this->user_model->email_available($email))
        {
            return true;
        }
        $this->form_validation->set_message('check_email','User email already exists');
        return false;
    }
}