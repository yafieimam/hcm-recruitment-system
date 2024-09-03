<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignUp extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('auth');
		$this->load->library('form_validation');
		$this->load->library('encryption');
	}

	public function index()
	{
		$this->load->view('Signup_User');
	}

	// public function register_perusahaan()
	// {
	// 	$this->load->view('register_perusahaan');
	// }


	public function proses_user()
	{
		$this->form_validation->set_rules('FirstName', 'FirstName', 'trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('LastName', 'LastName', 'trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('Email', 'Email', 'trim|required|min_length[1]|max_length[255]|is_unique[CanRegister.email]', array('is_unique' => 'Email has been registered or Invalid Email address'));
		$this->form_validation->set_rules('password', 'password', 'trim|min_length[8]|max_length[20]');
		if ($this->form_validation->run() == true) {
			$FirstName = $this->input->post('FirstName');
			$LastName = $this->input->post('LastName');
			$Email = $this->input->post('Email');
			$password = $this->input->post('password');
			$this->auth->SignUp($FirstName, $LastName, $Email, $password);
			$this->session->set_flashdata('success_register', 'Sign Up Success');
			redirect('Login');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('Signup');
		}
	}

	// public function proses_perusahaan()
	// {
	// 	$username = $this->input->post('username');
	// 	$email = $this->input->post('email');
	// 	$pass = $this->input->post('pass');
	// 	$re_pass = $this->input->post('re_pass');
	// 	$id_user_level = 2;
	// 	$id_status_verifikasi = 1;
	// 	$id_status_aktif = 1;
	// 	$id = md5($username . $email . $pass . rand(1, 999999));

	// 	if ($pass == $re_pass) {
	// 		$hasil = $this->m_user->pendaftaran_perusahaan($id, $username, $email, $pass, $id_user_level, $id_status_verifikasi, $id_status_aktif);

	// 		if ($hasil == false) {
	// 			$this->session->set_flashdata('eror', 'eror');
	// 			redirect('register/register_perusahaan');
	// 		} else {
	// 			$this->session->set_flashdata('input', 'input');
	// 			redirect('login/login_perusahaan');
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('password_err', 'password_err');
	// 		redirect('register/register_perusahaan');
	// 	}
	// }

}
