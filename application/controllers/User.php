<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{

		if ($this->session->userdata('is_login') == TRUE) {
			redirect('user/securepage', 'refresh');
		}

		$this->load->view('Applicant');
	}

	public function register()
	{

		if ($this->session->userdata('is_login') == TRUE) {
			redirect('user/securepage', 'refresh');
		}

		$this->load->view('role', 'user/form_register');
	}

	public function proses_user()
	{
		$this->form_validation->set_rules('FirstName', 'FirstName', 'trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('LastName', 'LastName', 'trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('Email', 'Email', 'trim|required|min_length[1]|max_length[255]|is_unique[CanRegister.email]->set_flashdata("Maaf")');
		$this->form_validation->set_rules('password', 'password', 'trim|min_length[1]|max_length[255]');
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
			redirect('Signup/Signup_user');
		}
	}

	public function login_proses()
	{

		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

		if ($this->form_validation->run() == TRUE) {

			if ($this->m_user->m_cek_mail()->num_rows() == 1) {

				$db = $this->m_user->m_cek_mail()->row();
				if (hash_verified($this->input->post('password'), $db->password)) {

					$data_login = array(
						'is_login' => TRUE,
						'email'  => $db->email,
						'nama'   => $db->nama
					);

					$this->session->set_userdata($data_login);
					redirect('user/securepage', 'refresh');
				} else {

					$this->session->set_flashdata('pesan', 'Login gagal: password salah!');
					redirect('/', 'refresh');
				}
			} else { // jika email tidak terdaftar!

				$this->session->set_flashdata('pesan', 'Login gagal: email salah!');
				redirect('/', 'refresh');
			}
		} else {

			$this->load->view('role', 'user/form_login');
		}
	}


	public function securepage()
	{

		if ($this->session->userdata('is_login') == FALSE) {
			redirect('/', 'refresh');
		}

		$this->load->view('role', 'user/securepage');
	}


	public function logout()
	{

		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');

		session_destroy();
		//$this->session->set_flashdata('pesan', 'Sign Out Berhasil!');
		redirect('/', 'refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */