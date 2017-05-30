<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'utility'));
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('user_model', 'image_model', 'site_model'));
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->form_validation->set_rules('login_email','Email','required|trim');
		$this->form_validation->set_rules('login_password','Password','required|trim|callback_check_credentials');

		if($this->form_validation->run()){
			redirect(base_url('dashboard'));
		}

		init_wrap_session();

		$data['site_name'] = $_SESSION['wrap']['site_name'];
		$data['marquee'] = $_SESSION['wrap']['marquee'];
		$data['businessHours'] = $_SESSION['wrap']['businessHours'];
		$data['businessInfo'] = $_SESSION['wrap']['businessInfo'];
		$data['logo'] = $_SESSION['wrap']['logo'];
		$data['background'] = $_SESSION['wrap']['background'];

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

	// Kept just in case another user needs to register
	// To enable registration uncomment this code block along with
	// the commented code block in the login view.

	// public function register()
	// {
	// 	$this->form_validation->set_rules('register_email', 'Email', 'trim|required|valid_email|callback_check_email');
	// 	$this->form_validation->set_rules('register_password', 'Password', 'trim|required');

	// 	if ($this->form_validation->run())
	// 	{
	// 		$salt = uniqid(mt_rand(), true);
	// 		$user = array(
	// 			'email' => $this->input->post('register_email', true),
	// 			'password' => hash('sha512', ($this->input->post('register_password', true) . $salt)),
	// 			'salt'     => $salt,
	// 			'role'     => 'user'
	// 		);
	// 		$session_array['id'] = $this->user_model->register($user);
	// 		$session_array['email'] = $user['email'];
	// 		$session_array['role'] = $user['role'];
	// 		$this->session->set_userdata('logged_in',$session_array);
	// 		redirect(base_url('dash'));
	// 	}

	// 	init_wrap_session();

	// 	$data['site_name'] = $_SESSION['wrap']['site_name'];
	// 	$data['marquee'] = $_SESSION['wrap']['marquee'];
	// 	$data['businessHours'] = $_SESSION['wrap']['businessHours'];
	// 	$data['businessInfo'] = $_SESSION['wrap']['businessInfo'];
	// 	$data['logo'] = $_SESSION['wrap']['logo'];
	// 	$data['background'] = $_SESSION['wrap']['background'];

	// 	$data['page_title'] = 'Register';

	// 	$this->load->view('layout/header', $data);
	// 	$this->load->view('register', $data);
	// 	$this->load->view('layout/footer');
	// }

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
				$session_array['name'] = $row->name;
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
		$this->form_validation->set_message('check_email','That email cannot be used');
		return false;
	}
}