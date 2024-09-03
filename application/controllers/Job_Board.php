<?php

use Google\Service\Analytics\Resource\Data;

defined('BASEPATH') or exit('No direct script access allowed');

class Job_Board extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('secure');
		$this->load->model('M_JobVacancy');
		$this->load->model('m_user');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	private function checkLogin() {
        if (!$this->session->userdata('Email')) {
            redirect('sign-in'); // Redirect ke halaman sign in jika tidak ada sesi login.
        }
    }

	function my_encrypt($data) {
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

		$encrypted = openssl_encrypt($data, 'aes-256-cbc', '4lWC8cegO92vhTRbiRy21sh90TwFz6DR', 0, $iv);

		return base64_encode($encrypted . '::' . $iv);
	}

	function my_decrypt($data) {
		list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);

		return openssl_decrypt($encrypted_data, 'aes-256-cbc', '4lWC8cegO92vhTRbiRy21sh90TwFz6DR', 0, $iv);
	}
	
	public function Index($page = 1)
	{
		$this->checkLogin();

		$this->load->library('pagination');
		$this->load->library('encryption');
		$this->load->model('M_JobVacancy');
		$this->load->model('M_Message');

		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  

		if ($this->session->userdata('saveJobId')) {
			$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();

			$jobSaveID = $this->session->userdata('saveJobId');
			$decodeSaveID = urldecode($jobSaveID);
			$jobSaveID = $this->encryption->decrypt($decodeSaveID);
			// $jobSaveID = $this->my_decrypt($decodeSaveID);
			
			if($CanProfile){
				$dataSaveJob = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'JobVacancyId' => $jobSaveID,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanSaveJob', $dataSaveJob);

				$this->session->unset_userdata('saveJobId');
				$this->session->set_flashdata('success', 'Successfully save jobs');
			}else{
				$this->session->unset_userdata('saveJobId');
				$this->session->set_flashdata('error', 'Save jobs failed');
			}
		}

		if ($this->session->userdata('applyJobId')) {
			$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
			
			$jobApplyID = $this->session->userdata('applyJobId');
			// $decodeApplyID = urldecode($jobApplyID);
			$jobApplyID = $this->secure->decrypt_url($jobApplyID);
			// $jobApplyID = $this->encryption->decrypt($decodeApplyID);
			// $jobApplyID = $this->my_decrypt($decodeApplyID);
			
			if($CanProfile){
				$DataProfile = $this->db->get_where('VCategoryProfile', ['CanProfileId' => $CanProfile['CanProfileId']])->result_array();
				if ($DataProfile) {
					$hasBasicInfo = 0;
					$hasSalary = 0;
					$hasWorkExperience = 0;
					$hasEducation = 0;
					$hasSkill = 0;
					$hasResume = 0;

					foreach($DataProfile as $value){
						if($value['CategoryProfleName'] == 'Basic Information'){
							$hasBasicInfo = $value['IsStatus'];
						}

						if($value['CategoryProfleName'] == 'Salary Expectation'){
							$hasSalary = $value['IsStatus'];
						}

						if($value['CategoryProfleName'] == 'Work Experience'){
							$hasWorkExperience = $value['IsStatus'];
						}

						if($value['CategoryProfleName'] == 'Education'){
							$hasEducation = $value['IsStatus'];
						}

						if($value['CategoryProfleName'] == 'Skill'){
							$hasSkill = $value['IsStatus'];
						}

						if($value['CategoryProfleName'] == 'Resume'){
							$hasResume = $value['IsStatus'];
						}
					}
					
					if($hasBasicInfo && $hasSalary && $hasWorkExperience && $hasEducation && $hasSkill && $hasResume){
						$CanApplyJob = $this->db->get_where('CanApply', ['CanProfileId' => $CanProfile['CanProfileId'], 'JobVacancyId' => $jobId])->row_array();
						if (!$CanApplyJob) {
							$dataApplyJob = [
								'CanProfileId' => $CanProfile['CanProfileId'],
								'JobVacancyId' => $jobApplyID,
								'CreateBy' => $this->session->userdata('Email'),
								'CreateDate' => date('Y-m-d H:i:s'),
								'UpdateBy' => $this->session->userdata('Email'),
								'UpdateDate' => date('Y-m-d H:i:s'),
							];
			
							$this->db->insert('CanApply', $dataApplyJob);
			
							$this->session->unset_userdata('applyJobId');
							$this->session->set_flashdata('success', 'Successfully apply jobs');
						}else{
							$this->session->set_flashdata('error', 'Harap Lengkapi Profile Yang Mandatory (*)');
						}
					}else{
						$this->session->set_flashdata('error', 'Harap Lengkapi Profile Yang Mandatory (*)');
					}
				}else{
					$this->session->set_flashdata('error', 'Already Apply This Job');
				}
			}else{
				$this->session->unset_userdata('applyJobId');
				$this->session->set_flashdata('error', 'Apply jobs failed');
			}
		}

		$data['Title'] = 'Job Board';
		$params = [];

		$textValue = $this->input->get('text');
		$provinceValue = $this->input->get('province', true);
		$cityValue = $this->input->get('city', true);
		$jobLevelValue = $this->input->get('job_level', true);
		$employmentTypeValue = $this->input->get('employment_type', true);
		$jobFunctionValue = $this->input->get('job_function', true);
		$educationValue = $this->input->get('education', true);
		$detailJobId = $this->input->get('detailJobId', true);

		if(!empty($textValue)){
			$params['text'] = $textValue;
		}

		if(!empty($provinceValue)){
			$params['province'] = explode(',', urldecode($provinceValue[0]));
		}

		if(!empty($cityValue)){
			$params['city'] = explode(',', $cityValue[0]);
		}

		if(!empty($jobLevelValue)){
			$params['job_level'] = explode(',', $jobLevelValue[0]);
		}

		if(!empty($employmentTypeValue)){
			$params['employment_type'] = explode(',', $employmentTypeValue[0]);
		}

		if(!empty($jobFunctionValue)){
			$params['job_function'] = explode(',', $jobFunctionValue[0]);
		}

		if(!empty($educationValue)){
			$params['education'] = explode(',', $educationValue[0]);
		}

		$config['base_url'] = base_url('user/job-board'); // URL dasar untuk pagination
        $config['total_rows'] = $this->M_JobVacancy->countJobVacancy($params); // Jumlah total baris data
        $config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 2;

        // Inisialisasi konfigurasi pagination
        $this->pagination->initialize($config);
		$offset = ($page - 1) * $config['per_page'];

		$total_pages = ceil($config['total_rows'] / $config['per_page']);
		$page = max(1, min($total_pages, (int)$page));

		$data['JobVacancy'] = $this->M_JobVacancy->getJobVacancyPage($config['per_page'], $offset, $params);
		$data['CanProfile'] = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		
		if(!empty($detailJobId)){
			$filteredJobs = array_filter($data['JobVacancy'], function ($job) use ($detailJobId) {
				return $job->JobVacancyId == $this->secure->decrypt_url($detailJobId);
				// return $job->JobVacancyId == $this->encryption->decrypt($detailJobId);
				// return $job->JobVacancyId == $this->my_decrypt($detailJobId);
			});

			if(count($filteredJobs) > 0){
				$data['JobDetail'] = (object) array_values($filteredJobs)[0];
				$CanSaveJob = $this->db->get_where('CanSaveJob', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'JobVacancyId' => $data['JobDetail']->JobVacancyId])->row_array();
				if($CanSaveJob){
					$data['JobDetail']->saveJob = true;
				}else{
					$data['JobDetail']->saveJob = false;
				}

				$CanApplyJob = $this->db->get_where('CanApply', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'JobVacancyId' => $data['JobDetail']->JobVacancyId])->row_array();
				if($CanApplyJob){
					$data['JobDetail']->applyJob = true;
				}else{
					$data['JobDetail']->applyJob = false;
				}
			}
		}else{
			if(count($data['JobVacancy']) > 0){
				$data['JobDetail'] = $data['JobVacancy'][0];
				$CanSaveJob = $this->db->get_where('CanSaveJob', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'JobVacancyId' => $data['JobDetail']->JobVacancyId])->row_array();
				if($CanSaveJob){
					$data['JobDetail']->saveJob = true;
				}else{
					$data['JobDetail']->saveJob = false;
				}

				$CanApplyJob = $this->db->get_where('CanApply', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'JobVacancyId' => $data['JobDetail']->JobVacancyId])->row_array();
				if($CanApplyJob){
					$data['JobDetail']->applyJob = true;
				}else{
					$data['JobDetail']->applyJob = false;
				}
			}else{
				$data['JobDetail'] = [];
			}
		}

		// var_dump($CanSaveJob);
		// exit;

		$pagination_links = '';

		if ($page == $total_pages) {
			$pagination_links .= '<a href="' . $this->createPaginationUserLink(1, $params) . '">First</a>';
		}

		if ($page > 1) {
			$prev_page = $page - 1;
			$pagination_links .= '<a href="' . $this->createPaginationUserLink($prev_page, $params) . '">Previous</a>';
		}

		for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) {
			if ($i == $page) {
				$pagination_links .= '<strong>' . $i . '</strong>'; // Current page
			} else {
				$pagination_links .= '<a href="' . $this->createPaginationUserLink($i, $params) . '">' . $i . '</a>'; // Other pages
			}
		}

		if ($page < $total_pages) {
			$next_page = $page + 1;
			$pagination_links .= '<a href="' . $this->createPaginationUserLink($next_page, $params) . '">Next</a>';
		}

		if ($page == 1 && $total_pages > 0) {
			$pagination_links .= '<a href="' . $this->createPaginationUserLink($total_pages, $params) . '">Last</a>';
		}

		$data['JobVacancy'] = array_map(function($result) {
			$result->JobVacancyId = $this->secure->encrypt_url($result->JobVacancyId);
			// $encryptData = $this->encryption->encrypt($result->JobVacancyId);
			// $encryptData = $this->my_encrypt($result->JobVacancyId);
			// $result->JobVacancyId = urlencode($encryptData);
			return $result;
		}, $data['JobVacancy']);

		$data['pagination_links'] = $pagination_links;
		$data['Province'] = $this->M_JobVacancy->getProvince();
		$data['City'] = $this->M_JobVacancy->getCity();
		$data['JobLevel'] = $this->M_JobVacancy->getjoblevel();
		$data['EmploymentType'] = $this->M_JobVacancy->getEmpType();
		$data['JobFunction'] = $this->M_JobVacancy->getjobfunction();
		$data['Education'] = $this->M_JobVacancy->getEducation();
		$data['CanRegister'] = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['CanSaveJob'] = $this->db->get_where('CanSaveJob', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		if(isset($data['CanProfile']['CanProfileId'])){
			$data['ListMessage'] = $this->M_Message->getListMessage(5, $data['CanProfile']['CanProfileId']);
			$data['ListMessageTotal'] = $this->M_Message->getListMessageTotal($data['CanProfile']['CanProfileId']);
			$data['ListNotification'] = $this->M_Message->getListNotification(5, $data['CanProfile']['CanProfileId']);
			$data['ListNotificationTotal'] = $this->M_Message->getListNotificationTotal($data['CanProfile']['CanProfileId']);
		}else{
			$data['ListMessage'] = [];
			$data['ListMessageTotal'] = 0;
			$data['ListNotification'] = [];
			$data['ListNotificationTotal'] = 0;
		}

		$this->load->view('user/custom_job_board', $data);
	}

	public function redirectToPage($page = 1)
    {
		$textValue = $this->input->get('text');

		if(!empty($textValue)){
			$params['text'] = $textValue;
			redirect('job-board/' . $page . '?text=' . $textValue);
		}else{
			redirect('job-board/' . $page);
		}
    }

	public function redirectToUserPage($page = 1)
    {
        redirect('user/job-board/' . $page);
    }

	function createPaginationLink($page, $params) {
		$baseUrl = base_url('job-board');
		$baseUrl .= '/' . $page;
	
		// Tambahkan parameter ke URL jika ada
		if (!empty($params)) {
			$queryString = http_build_query($params);
			$baseUrl .= '?' . $queryString;
		}
	
		return $baseUrl;
	}

	function createPaginationUserLink($page, $params) {
		$baseUrl = base_url('user/job-board');
		$baseUrl .= '/' . $page;
	
		// Tambahkan parameter ke URL jika ada
		if (!empty($params)) {
			$queryString = http_build_query($params);
			$baseUrl .= '?' . $queryString;
		}
	
		return $baseUrl;
	}

	public function list($page = 1)
	{
		$this->load->library('pagination');
		$this->load->library('encryption');
		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  
		$this->load->model('M_JobVacancy');

		if ($this->session->userdata('Email')) {
            redirect('user/job-board'); // Redirect ke halaman sign in jika tidak ada sesi login.
        }

		$params = [];

		$textValue = $this->input->get('text');
		$provinceValue = $this->input->get('province', true);
		$cityValue = $this->input->get('city', true);
		$jobLevelValue = $this->input->get('job_level', true);
		$employmentTypeValue = $this->input->get('employment_type', true);
		$jobFunctionValue = $this->input->get('job_function', true);
		$educationValue = $this->input->get('education', true);

		if(!empty($textValue)){
			$params['text'] = $textValue;
		}

		if(!empty($provinceValue)){
			$params['province'] = explode(',', urldecode($provinceValue[0]));
		}

		if(!empty($cityValue)){
			$params['city'] = explode(',', $cityValue[0]);
		}

		if(!empty($jobLevelValue)){
			$params['job_level'] = explode(',', $jobLevelValue[0]);
		}

		if(!empty($employmentTypeValue)){
			$params['employment_type'] = explode(',', $employmentTypeValue[0]);
		}

		if(!empty($jobFunctionValue)){
			$params['job_function'] = explode(',', $jobFunctionValue[0]);
		}

		if(!empty($educationValue)){
			$params['education'] = explode(',', $educationValue[0]);
		}

		$config['base_url'] = base_url('job-board'); // URL dasar untuk pagination
        $config['total_rows'] = $this->M_JobVacancy->countJobVacancy($params); // Jumlah total baris data
        $config['per_page'] = 2; // Jumlah data per halaman
		$config['uri_segment'] = 2;

        // Inisialisasi konfigurasi pagination
        $this->pagination->initialize($config);
		$offset = ($page - 1) * $config['per_page'];

		$total_pages = ceil($config['total_rows'] / $config['per_page']);
		$page = max(1, min($total_pages, (int)$page));

		$data['JobVacancy'] = $this->M_JobVacancy->getJobVacancyPage($config['per_page'], $offset, $params);

		$data['JobVacancy'] = array_map(function($result) {
			$result->JobVacancyId = $this->secure->encrypt_url($result->JobVacancyId);
			// $encryptData = $this->encryption->encrypt($result->JobVacancyId);
			// $encryptData = $this->my_encrypt($result->JobVacancyId);
			// $result->JobVacancyId = urlencode($encryptData);
			return $result;
		}, $data['JobVacancy']);

		// var_dump($data['JobVacancy']);
		// exit;

		$pagination_links = '';

		if ($page == $total_pages) {
			$pagination_links .= '<a href="' . $this->createPaginationLink(1, $params) . '">First</a>';
		}

		if ($page > 1) {
			$prev_page = $page - 1;
			$pagination_links .= '<a href="' . $this->createPaginationLink($prev_page, $params) . '">Previous</a>';
		}

		for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) {
			if ($i == $page) {
				$pagination_links .= '<strong>' . $i . '</strong>'; // Current page
			} else {
				$pagination_links .= '<a href="' . $this->createPaginationLink($i, $params) . '">' . $i . '</a>'; // Other pages
			}
		}

		if ($page < $total_pages) {
			$next_page = $page + 1;
			$pagination_links .= '<a href="' . $this->createPaginationLink($next_page, $params) . '">Next</a>';
		}

		if ($page == 1 && $total_pages > 0) {
			$pagination_links .= '<a href="' . $this->createPaginationLink($total_pages, $params) . '">Last</a>';
		}

		$data['pagination_links'] = $pagination_links;
		$data['Province'] = $this->M_JobVacancy->getProvince();
		$data['City'] = $this->M_JobVacancy->getCity();
		$data['JobLevel'] = $this->M_JobVacancy->getjoblevel();
		$data['EmploymentType'] = $this->M_JobVacancy->getEmpType();
		$data['JobFunction'] = $this->M_JobVacancy->getjobfunction();
		$data['Education'] = $this->M_JobVacancy->getEducation();

		$this->load->view('user/list_jobboard', $data);
	}

	public function profiler()
	{
		$data['CanRegister'] = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['CanProfile'] = $this->m_user->get_CanProfile();
		$this->load->view('user/profiler', $data);
	}

	public function detail_job()
	{
		$this->load->view('user/job_board');
	}
}