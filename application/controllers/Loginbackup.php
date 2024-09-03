<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function Applicant()
	{
		$this->load->view('Applicant');
	}

	public function Administrator()
	{
		$this->load->view('Administrator');
	}
	public function Logout_user()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id_user');
		$this->session->set_flashdata('success_log_out', 'success_log_out');
		redirect('Web_Public/index');
	}
}