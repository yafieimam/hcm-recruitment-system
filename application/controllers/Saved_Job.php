<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saved_Job extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('secure');
		$this->load->model('m_jobvacancy');
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

	public function redirectToPage($page = 1)
    {
        redirect('user/save-jobs/' . $page);
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

		$detailJobId = $this->input->get('detailJobId', true);

		$data['CanProfile'] = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['CountSaveJob'] = $this->M_JobVacancy->countSaveJob($data['CanProfile']['CanProfileId']);

		$config['base_url'] = base_url('user/save-jobs'); // URL dasar untuk pagination
        $config['total_rows'] = $data['CountSaveJob']; // Jumlah total baris data
        $config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 2;

        // Inisialisasi konfigurasi pagination
        $this->pagination->initialize($config);
		$offset = ($page - 1) * $config['per_page'];

		$total_pages = ceil($config['total_rows'] / $config['per_page']);
		$page = max(1, min($total_pages, (int)$page));

		$data['CanSaveJob'] = $this->M_JobVacancy->getSaveJobPage($config['per_page'], $offset, $data['CanProfile']['CanProfileId']);

		if(!empty($detailJobId)){
			$filteredJobs = array_filter($data['CanSaveJob'], function ($job) use ($detailJobId) {
				return $job->JobVacancyId == $this->secure->decrypt_url($detailJobId);
				// return $job->JobVacancyId == $this->encryption->decrypt($detailJobId);
				// return $job->JobVacancyId == $this->my_decrypt($detailJobId);
			});

			if(empty($filteredJobs)){
				$data['JobDetail'] = $data['CanSaveJob'][0];

				$CanApplyJob = $this->db->get_where('CanApply', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'JobVacancyId' => $data['JobDetail']->JobVacancyId])->row_array();
				if($CanApplyJob){
					$data['JobDetail']->applyJob = true;
				}else{
					$data['JobDetail']->applyJob = false;
				}
			}else{
				$data['JobDetail'] = (object) array_values($filteredJobs)[0];

				$CanApplyJob = $this->db->get_where('CanApply', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'JobVacancyId' => $data['JobDetail']->JobVacancyId])->row_array();
				if($CanApplyJob){
					$data['JobDetail']->applyJob = true;
				}else{
					$data['JobDetail']->applyJob = false;
				}
			}
		}else{
			if(count($data['CanSaveJob']) > 0){
				$data['JobDetail'] = $data['CanSaveJob'][0];

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

		$pagination_links = '';

		if ($page == $total_pages) {
			$pagination_links .= '<a href="' .base_url('user/save-jobs/1'). '">First</a>';
		}

		if ($page > 1) {
			$prev_page = $page - 1;
			$pagination_links .= '<a href="' . base_url('user/save-jobs/' . $prev_page) . '">Previous</a>';
		}

		for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) {
			if ($i == $page) {
				$pagination_links .= '<strong>' . $i . '</strong>'; // Current page
			} else {
				$pagination_links .= '<a href="' . base_url('user/save-jobs/' . $i) . '">' . $i . '</a>'; // Other pages
			}
		}

		if ($page < $total_pages) {
			$next_page = $page + 1;
			$pagination_links .= '<a href="' . base_url('user/save-jobs/' . $next_page) . '">Next</a>';
		}

		if ($page == 1 && $total_pages > 0) {
			$pagination_links .= '<a href="' . base_url('user/save-jobs/' . $total_pages) . '">Last</a>';
		}

		$data['pagination_links'] = $pagination_links;

		$data['CanSaveJob'] = array_map(function($result) {
			$result->JobVacancyId = $this->secure->encrypt_url($result->JobVacancyId);
			// $encryptData = $this->encryption->encrypt($result->JobVacancyId);
			// $encryptData = $this->my_encrypt($result->JobVacancyId);
			// $result->JobVacancyId = urlencode($encryptData);
			return $result;
		}, $data['CanSaveJob']);

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

		$this->load->view('user/custom_save_jobs', $data);
	}
}
