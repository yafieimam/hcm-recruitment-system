<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$data['pencaker'] = $this->m_user->count_all_user()->row_array();
			$data['pencaker_acitve'] = $this->m_user->count_all_user_active()->row_array();
			$data['pencaker_no_active'] = $this->m_user->count_all_user_no_active()->row_array();
			$data['perusahaan'] = $this->m_user->count_all_perusahaan()->row_array();
			$data['perusahaan_active'] = $this->m_user->count_all_perusahaan_active()->row_array();
			$data['perusahaan_no_active'] = $this->m_user->count_all_perusahaan_no_active()->row_array();
			$this->load->view('admin/dashboard', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/login_user');
		}
	}

	public function view_perusahaan()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 2) {

			$data['perusahaan_data'] = $this->m_user->get_all_perusahaan_by_id($this->session->userdata('id_user'))->row_array();
			$data['pencaker'] = $this->m_user->count_all_user()->row_array();
			$data['perusahaan'] = $this->m_user->count_all_perusahaan()->row_array();
			$data['loker'] = $this->m_loker->count_all_loker_by_id($this->session->userdata('id_user'))->row_array();

			// echo var_dump($data);
			// die();

			$this->load->view('perusahaan/dashboard', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/login_perusahaan');
		}
	}

	public function Home()
	{

		$this->load->view('user/main');
		// if ($this->session->userdata('logged_in')) {

		// 	$data['user_data'] = $this->m_user->get_user_detail_by_id($this->session->userdata('id_user'))->row_array();
		// 	$data['pencaker'] = $this->m_user->count_all_user()->row_array();
		// 	$data['perusahaan'] = $this->m_user->count_all_perusahaan()->row_array();
		// 	$this->load->view('user/main');
		// } else {

		// 	$this->session->set_flashdata('loggin_err', 'loggin_err');
		// 	redirect('Login/Applicant');
		// }
	}

	public function Profile()
	{
		$this->load->view('user/profile');
	}

	public function Job_Board()
	{
		$this->load->view('user/job_board');
	}
	public function Applications()
	{
		$this->load->view('user/applications');
	}
	public function Message()
	{
		$this->load->view('user/message');
	}
	public function Saved_Job()
	{
		$this->load->view('user/saved_job');
	}
	public function Compose_message()
	{
		$this->load->view('user/compose_message');
	}
	public function Message_Read()
	{
		$this->load->view('user/message_read');
	}
}
