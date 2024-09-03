<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applications extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_jobvacancy');
		$this->load->helper('text');
		$this->load->library('secure');
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

	public function Index()
	{
		$this->checkLogin();

		$this->load->library('encryption');
		$this->load->model('M_Message');

		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  
		
		$data['CanRegister'] = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['CanProfile'] = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['CanApply'] = $this->db->get_where('VCanApply', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result();
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

		$data['CanApply'] = array_map(function($result) {
			$result->JobVacancyId = $this->secure->encrypt_url($result->JobVacancyId);
			// $encryptData = $this->encryption->encrypt($result->JobVacancyId);
			// $encryptData = $this->my_encrypt($result->JobVacancyId);
			// $result->JobVacancyId = urlencode($encryptData);
			return $result;
		}, $data['CanApply']);

		// var_dump($data['CanApply']);
		// exit;

		$this->load->view('user/custom_applications', $data);
	}
}
