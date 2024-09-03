<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web_Public extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('secure');
		$this->load->model('M_JobVacancy');
	}

	public function index()
	{
		if ($this->session->userdata('Email')) {
            redirect('user/job-board'); // Redirect ke halaman sign in jika tidak ada sesi login.
        }
		
		$data['loker'] = $this->M_JobVacancy->getvacancy()->result_array();
		$data['JobVacancy'] = $this->M_JobVacancy->getJobVacancy();
		$data['JobVacancyLandingPage'] = $this->M_JobVacancy->getJobVacancylandingpage();
		$data['Location'] = $this->M_JobVacancy->getLocation();
		$data['JobVacancyLandingPage'] = array_map(function($result) {
			$result->JobVacancyId = $this->secure->encrypt_url($result->JobVacancyId);
			return $result;
		}, $data['JobVacancyLandingPage']);
		// var_dump($data['JobVacancyLandingPage']);
		// exit;
		$this->load->view('public', $data);
	}

	public function loker_detail($id_loker)
	{
		$data['loker'] = $this->M_Jobvacancy->get_all_loker_by_id_loker($id_loker)->row_array();
		$this->load->view('public_detail', $data);
	}
}
