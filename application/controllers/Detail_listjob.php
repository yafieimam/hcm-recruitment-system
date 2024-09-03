<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_listjob extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('secure');
		$this->load->model('m_jobvacancy');
		$this->load->helper('text');
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

	public function Index()
	{
		$this->load->library('encryption');
		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  
		
		$jobID = $this->input->get('jobId');
		// $decodeID = urldecode($jobID);
		$jobID = $this->secure->decrypt_url($jobID);
		// $jobID = $this->encryption->decrypt($decodeID);
		// $jobID = $this->my_decrypt($decodeID);
		$data['JobVacancy'] = $this->m_jobvacancy->getvacancyid($jobID);
		$data['JobVacancy']->JobVacancyId = $this->secure->encrypt_url($data['JobVacancy']->JobVacancyId);
		// $encryptData = $this->encryption->encrypt($data['JobVacancy']->JobVacancyId);
		// $encryptData = $this->my_encrypt($data['JobVacancy']->JobVacancyId);
		// $data['JobVacancy']->JobVacancyId = urlencode($encryptData);
		// var_dump($data['JobVacancy']);
		// exit;
		$data['SaveJob'] = $this->m_jobvacancy->getvacancyid($jobID);
		$this->load->view('user/Detail_listJob', $data);
	}

	public function detail_job()
	{
		$this->load->view('detail_job');
	}

	public function saveJobs()
	{
		$this->load->library('encryption');

		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  

		$jobId = $this->input->get('jobId');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$jobIdDecrypt = $this->secure->decrypt_url($jobId);
		// $jobIdDecrypt = $this->encryption->decrypt($jobId);
		// $jobIdDecrypt = $this->my_decrypt($jobId);
		if ($CanProfile) {
			$CanSaveJob = $this->db->get_where('CanSaveJob', ['CanProfileId' => $CanProfile['CanProfileId'], 'JobVacancyId' => $jobIdDecrypt])->row_array();
			if ($CanSaveJob) {
				$this->db->delete('CanSaveJob', ['CanProfileId' => $CanProfile['CanProfileId'], 'JobVacancyId' => $jobIdDecrypt]);
			}else{
				$dataSaveJob = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'JobVacancyId' => $jobIdDecrypt,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanSaveJob', $dataSaveJob);
				$this->session->set_flashdata('success', 'Successfully save job');
			}

			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('error', 'Save job failed');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function applyJobs()
	{
		$this->load->library('encryption');

		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  

		$jobId = $this->input->get('jobId');
		$hasBasicInfo = 0;
		$hasSalary = 0;
		$hasWorkExperience = 0;
		$hasEducation = 0;
		$hasSkill = 0;
		$hasResume = 0;
		$jobIdDecrypt = $this->secure->decrypt_url($jobId);
		// $jobIdDecrypt = $this->encryption->decrypt($jobId);
		// $jobIdDecrypt = $this->my_decrypt($jobId);

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$DataProfile = $this->db->get_where('VCategoryProfile', ['CanProfileId' => $CanProfile['CanProfileId']])->result_array();
			if ($DataProfile) {
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
					$CanApplyJob = $this->db->get_where('CanApply', ['CanProfileId' => $CanProfile['CanProfileId'], 'JobVacancyId' => $jobIdDecrypt])->row_array();
					if (!$CanApplyJob) {
						$dataApplyJob = [
							'CanProfileId' => $CanProfile['CanProfileId'],
							'JobVacancyId' => $jobIdDecrypt,
							'CreateBy' => $this->session->userdata('Email'),
							'CreateDate' => date('Y-m-d H:i:s'),
							'UpdateBy' => $this->session->userdata('Email'),
							'UpdateDate' => date('Y-m-d H:i:s'),
						];

						$this->db->insert('CanApply', $dataApplyJob);
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

			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_flashdata('error', 'Apply jobs failed');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
}
