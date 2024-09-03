<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('secure');
		$this->load->model('m_message');
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
        redirect('user/message/' . $page);
    }

	public function Index($page = 1)
	{
		$this->checkLogin();

		$this->load->library('pagination');
		$this->load->library('encryption');
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
		$data['CountMessage'] = $this->M_Message->countMessage($data['CanProfile']['CanProfileId']);

		$config['base_url'] = base_url('user/message'); // URL dasar untuk pagination
        $config['total_rows'] = $data['CountMessage']; // Jumlah total baris data
        $config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 2;

		$this->pagination->initialize($config);
		$offset = ($page - 1) * $config['per_page'];

		$total_pages = ceil($config['total_rows'] / $config['per_page']);
		$page = max(1, min($total_pages, (int)$page));

		$data['CanMessage'] = $this->M_Message->getMessagePage($config['per_page'], $offset, $data['CanProfile']['CanProfileId']);

		if(!empty($detailJobId)){
			$filteredJobs = array_filter($data['CanMessage'], function ($job) use ($detailJobId) {
				return $job->JobVacancyId == $this->secure->decrypt_url($detailJobId);
				// return $job->JobVacancyId == $this->encryption->decrypt($detailJobId);
				// return $job->JobVacancyId == $this->my_decrypt($detailJobId);
			});

			$data['MessageDetail'] = $this->M_Message->getMessageDetail($data['CanProfile']['CanProfileId'], $this->secure->decrypt_url($detailJobId));
			// $data['MessageDetail'] = $this->M_Message->getMessageDetail($data['CanProfile']['CanProfileId'], $this->encryption->decrypt($detailJobId));
			// $data['MessageDetail'] = $this->M_Message->getMessageDetail($data['CanProfile']['CanProfileId'], $this->my_decrypt($detailJobId));
		}else{
			if(count($data['CanMessage']) > 0){
				$data['MessageDetail'] = $this->M_Message->getMessageDetail($data['CanProfile']['CanProfileId'], $data['CanMessage'][0]->JobVacancyId);
			}else{
				$data['MessageDetail'] = [];
			}
		}

		// var_dump($data['CanMessage'][0]->JobVacancyId);
		// exit;

		$pagination_links = '';

		if ($page == $total_pages) {
			$pagination_links .= '<a href="' .base_url('user/message/1'). '">First</a>';
		}

		if ($page > 1) {
			$prev_page = $page - 1;
			$pagination_links .= '<a href="' . base_url('user/message/' . $prev_page) . '">Previous</a>';
		}

		for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) {
			if ($i == $page) {
				$pagination_links .= '<strong>' . $i . '</strong>'; // Current page
			} else {
				$pagination_links .= '<a href="' . base_url('user/message/' . $i) . '">' . $i . '</a>'; // Other pages
			}
		}

		if ($page < $total_pages) {
			$next_page = $page + 1;
			$pagination_links .= '<a href="' . base_url('user/message/' . $next_page) . '">Next</a>';
		}

		if ($page == 1 && $total_pages > 0) {
			$pagination_links .= '<a href="' . base_url('user/message/' . $total_pages) . '">Last</a>';
		}

		$data['pagination_links'] = $pagination_links;

		$data['CanMessage'] = array_map(function($result) {
			$result->JobVacancyId = $this->secure->encrypt_url($result->JobVacancyId);
			// $encryptData = $this->encryption->encrypt($result->JobVacancyId);
			// $encryptData = $this->my_encrypt($result->JobVacancyId);
			// $result->JobVacancyId = urlencode($encryptData);
			return $result;
		}, $data['CanMessage']);

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

		$this->load->view('user/custom_message', $data);
	}

	public function sendMessage()
	{
		$message = $this->input->post('message');
		$profileId = $this->input->post('profileId');
		$jobId = $this->input->post('jobId');

		$Message = array(
			'JobVacancyId' => $this->secure->decrypt_url($jobId),
			'CanProfileId' => $profileId,
			'MessageDescryption' => $message,
			'CreateBy' => $this->session->userdata('Email'),
			'CreateDate' => date('Y-m-d H:i:s'),
			'UpdateBy' => $this->session->userdata('Email'),
			'UpdateDate' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('CanMessage', $Message);
		
		echo json_encode(['status' => true]);
	}

	private function checkLoginAdmin() {
        if (!$this->session->userdata('UserName')) {
            redirect('administrator'); // Redirect ke halaman sign in jika tidak ada sesi login.
        }
    }

	public function redirectToPageAdmin($page = 1)
    {
        redirect('admin/message/' . $page);
    }

	public function IndexAdmin($page = 1)
	{
		$this->checkLoginAdmin();

		$this->load->library('pagination');
		$this->load->model('M_Message');
		$this->load->model('M_menu');

		$detailJobId = $this->input->get('detailJobId', true);
		$profileId = $this->input->get('profileId', true);

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Menu'] = $this->M_menu->getMenuAdmin();
		$data['CountMessage'] = $this->M_Message->countMessageAdmin($data['SMAccessHd']['SMAccessHdId']);

		$config['base_url'] = base_url('admin/message'); // URL dasar untuk pagination
        $config['total_rows'] = $data['CountMessage']; // Jumlah total baris data
        $config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 2;

		$this->pagination->initialize($config);
		$offset = ($page - 1) * $config['per_page'];

		$total_pages = ceil($config['total_rows'] / $config['per_page']);
		$page = max(1, min($total_pages, (int)$page));

		$data['CanMessage'] = $this->M_Message->getMessagePageAdmin($config['per_page'], $offset, $data['SMAccessHd']['SMAccessHdId']);
		$data['CanMessage'] = array_map(function ($job) {
			$job->CanProfileData = $this->db->get_where('VCanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
			$job->JobData = $this->db->get_where('VJobVacancy', ['JobVacancyId' => $job->JobVacancyId])->row_array();
			return $job;
		}, $data['CanMessage']);

		// var_dump($data['CanMessage']);
		// exit;

		if(!empty($detailJobId)){
			$filteredJobs = array_filter($data['CanMessage'], function ($job) use ($detailJobId, $profileId) {
				return $job->JobVacancyId == $this->secure->decrypt_url($detailJobId) && $job->CanProfileId == $this->secure->decrypt_url($profileId);
			});

			$data['MessageDetail'] = $this->M_Message->getMessageAdminDetail($data['SMAccessHd']['SMAccessHdId'], $this->secure->decrypt_url($profileId), $this->secure->decrypt_url($detailJobId));
		}else{
			if(count($data['CanMessage']) > 0){
				$data['MessageDetail'] = $this->M_Message->getMessageAdminDetail($data['SMAccessHd']['SMAccessHdId'], $data['CanMessage'][0]->CanProfileId, $data['CanMessage'][0]->JobVacancyId);
			}else{
				$data['MessageDetail'] = [];
			}
		}

		// var_dump($data['MessageDetail']);
		// exit;

		$pagination_links = '';

		if ($page == $total_pages) {
			$pagination_links .= '<a href="' .base_url('admin/message/1'). '">First</a>';
		}

		if ($page > 1) {
			$prev_page = $page - 1;
			$pagination_links .= '<a href="' . base_url('admin/message/' . $prev_page) . '">Previous</a>';
		}

		for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++) {
			if ($i == $page) {
				$pagination_links .= '<strong>' . $i . '</strong>'; // Current page
			} else {
				$pagination_links .= '<a href="' . base_url('admin/message/' . $i) . '">' . $i . '</a>'; // Other pages
			}
		}

		if ($page < $total_pages) {
			$next_page = $page + 1;
			$pagination_links .= '<a href="' . base_url('admin/message/' . $next_page) . '">Next</a>';
		}

		if ($page == 1 && $total_pages > 0) {
			$pagination_links .= '<a href="' . base_url('admin/message/' . $total_pages) . '">Last</a>';
		}

		$data['pagination_links'] = $pagination_links;

		$data['CanMessage'] = array_map(function($result) {
			$result->JobVacancyId = $this->secure->encrypt_url($result->JobVacancyId);
			$result->CanProfileId = $this->secure->encrypt_url($result->CanProfileId);
			// $encryptData = $this->encryption->encrypt($result->JobVacancyId);
			// $encryptData = $this->my_encrypt($result->JobVacancyId);
			// $result->JobVacancyId = urlencode($encryptData);
			return $result;
		}, $data['CanMessage']);

		$this->load->view('admin/custom_message', $data);
	}

	public function sendMessageAdmin()
	{
		$message = $this->input->post('message');
		$userId = $this->input->post('userId');
		$profileId = $this->input->post('profileId');
		$jobId = $this->input->post('jobId');

		$Message = array(
			'JobVacancyId' => $jobId,
			'CanProfileId' => $profileId,
			'SMAccessHDId' => $userId,
			'MessageDescryption' => $message,
			'CreateBy' => $this->session->userdata('Email'),
			'CreateDate' => date('Y-m-d H:i:s'),
			'UpdateBy' => $this->session->userdata('Email'),
			'UpdateDate' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('CanMessage', $Message);
		
		echo json_encode(['status' => true]);
	}
}
