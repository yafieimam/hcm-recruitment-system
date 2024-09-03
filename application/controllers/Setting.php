<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->helper(array('url', 'form', 'text'));
		$this->load->model('M_menu', '', TRUE);
		$this->load->model('Admin');
	}

	private function checkLogin() {
        if (!$this->session->userdata('Email')) {
            redirect('sign-in'); // Redirect ke halaman sign in jika tidak ada sesi login.
        }
    }

	private function checkAdminLogin() {
        if (!$this->session->userdata('UserName')) {
            redirect('administrator'); // Redirect ke halaman sign in jika tidak ada sesi login.
        }
    }

	public function Index()
	{
		$this->checkLogin();

		$this->load->model('M_Message');

		$data['CanRegister'] = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['CanProfile'] = $this->db->get_where('CanProfile', ['CanRegisterId' => $data['CanRegister']['CanRegisterId']])->row_array();
		$data['Timezone'] = $this->m_user->getTimezone();
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
		// $this->load->view('user/Setting');
		$this->load->view('user/custom_setting', $data);
	}

	public function adminSetting()
	{
		$this->checkAdminLogin();

		$this->load->model('M_Message');

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Menu'] = $this->M_menu->getMenuAdmin();
		// $this->load->view('user/Setting');
		$this->load->view('admin/custom_setting', $data);
	}

	public function adminCompanySetting()
	{
		$this->checkAdminLogin();

		$this->load->model('M_Message');

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Menu'] = $this->M_menu->getMenuAdmin();
		$data['Company'] = $this->db->get_where('Company', ['CompanyId' => $data['SMAccessHd']['CompanyId']])->row_array();
		if(isset($data['Company']['IndustryId'])){
			$data['Industry'] = $this->db->get_where('Industry', ['IndustryId' => $data['Company']['IndustryId']])->row_array();
		}
		// $this->load->view('user/Setting');
		$this->load->view('admin/custom_company_setting', $data);
	}
	
	public function company_setting()
	{
		$this->load->view('admin/company_setting');
	}

	public function getProvinceSearch(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchParam');

		$response = $this->M_JobVacancy->getProvinceSearchLimit($searchTerm);
  
		echo json_encode($response);
	}

	public function getCitySearch(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchParam');
		$id = $this->input->post('id');

		$response = $this->M_JobVacancy->getCitySearchLimit($searchTerm, $id);
  
		echo json_encode($response);
	}

	public function getJobLevelSearch(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchParam');

		$response = $this->M_JobVacancy->getJobLevelSearchLimit($searchTerm);
  
		echo json_encode($response);
	}

	public function getEmploymentTypeSearch(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchParam');

		$response = $this->M_JobVacancy->getEmploymentTypeSearchLimit($searchTerm);
  
		echo json_encode($response);
	}

	public function getJobFunctionSearch(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchParam');

		$response = $this->M_JobVacancy->getJobFunctionSearchLimit($searchTerm);
  
		echo json_encode($response);
	}

	public function getEmployeeRequestNo(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');
		$id = $this->input->post('id');

		$response = $this->M_JobVacancy->getEmployeeRequestNo($id, $searchTerm);
  
		echo json_encode($response);
	}

	public function getEducationSearch(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchParam');

		$response = $this->M_JobVacancy->getEducationSearchLimit($searchTerm);
  
		echo json_encode($response);
	}

	public function getCompanyIndustry(){
		$this->load->model('m_user');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->m_user->getCompanyIndustryData($searchTerm);
  
		echo json_encode($response);
	}

	public function getJobFunction(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getJobFunctionData($searchTerm);
  
		echo json_encode($response);
	}

	public function getGroupType(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getGroupTypeData($searchTerm);
  
		echo json_encode($response);
	}

	public function getUserGroup(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getUserGroupData($searchTerm);
  
		echo json_encode($response);
	}

	private function _sendEmail($TokenNumber, $newemail)
	{
		$this->load->library('email');
		$this->email->from('imamachmad18@gmail.com', 'HUMAN CAPITAL INFORMATION SYSTEM');
		$this->email->to($newemail);

		$this->email->subject('Confirm Your Email Address');
		$this->email->message('Tap the link to confirm your email : ' . base_url() . 'verification?email=' . $newemail . '&TokenNumber=' . urlencode($TokenNumber));

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function changeEmail()
	{
		$password = $this->input->post('current_password');
		$email = $this->input->post('current_email');
		$newemail = $this->input->post('new_email');

		$CanRegister = $this->db->get_where('CanRegister', ['Email' => $email])->row_array();
		if ($CanRegister) {
			if (password_verify($password, $CanRegister['Password'])) {
				$CanRegisterNew = $this->db->get_where('CanRegister', ['Email' => $newemail])->row_array();
				$SMAccessHdNew = $this->db->get_where('SMAccessHd', ['Email' => $newemail])->row_array();
				// User Terdaftar
				if ($CanRegisterNew || $SMAccessHdNew) {
					$this->session->set_flashdata('error', 'Sorry, Email is Already Registered.');
					redirect('account-setting');
				}else{
					$this->db->set('Email', $newemail);
					$this->db->set('IsVerifyEmail', 0);
					$this->db->where('Email', $email);
					$this->db->update('CanRegister');

					$this->db->set('Email', $newemail);
					$this->db->set('UpdateBy', $this->session->userdata('Email'));
					$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					$this->db->where('Email', $email);
					$this->db->update('CanProfile');

					$TokenNumber = base64_encode(random_bytes(32));
					$SMTokenRegister = [
						'Email' => $newemail,
						'TokenNumber' => $TokenNumber,
						// 'CreateDate' => time()
					];

					$this->db->insert('SMTokenRegister', $SMTokenRegister);

					$this->_sendEmail($TokenNumber, $newemail);

					$this->session->unset_userdata('Email');
					$this->session->unset_userdata('role_id');

					$this->session->set_flashdata('success', 'Successfully change email. Please verify your new email.');
					redirect('sign-in');
				}
			}else{
				$this->session->set_flashdata('error', 'Wrong Password!');
				redirect('account-setting');
			}
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('account-setting');
		}
	}

	public function changeMobileNumber()
	{
		$code = $this->input->post('new_mobile_number_code');
		$mobile_number = $this->input->post('new_mobile_number');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->set('PhoneNumberCode', $code);
			$this->db->set('PhoneNumber', $mobile_number);
			$this->db->set('UpdateBy', $this->session->userdata('Email'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('Email', $this->session->userdata('Email'));
			$this->db->update('CanProfile');

			$this->session->set_flashdata('success', 'Successfully change mobile number.');
			redirect('account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('account-setting');
		}
	}

	public function changePassword()
	{
		$currentpassword = $this->input->post('current_password');
		$newpassword = $this->input->post('new_password');
		$confimpassword = $this->input->post('confirm_password');

		$CanRegister = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanRegister) {
			if ($newpassword === $confimpassword) {
				if (password_verify($currentpassword, $CanRegister['Password'])) {
					$this->db->set('Password', password_hash($newpassword, PASSWORD_DEFAULT));
					$this->db->where('Email', $this->session->userdata('Email'));
					$this->db->update('CanRegister');

					$this->session->set_flashdata('success', 'Successfully change password.');
					redirect('account-setting');
				}else{
					$this->session->set_flashdata('error', 'Wrong Password!');
					redirect('account-setting');
				}
			}else{
				$this->session->set_flashdata('error', 'New Password dan Retype Password Tidak Sama!');
				redirect('account-setting');
			}
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('account-setting');
		}
	}

	public function changeSMSSubscription()
	{
		$isSubscribe1 = $this->input->post('isSubscribe1');
		$isSubscribe2 = $this->input->post('isSubscribe2');
		$isSubscribe3 = $this->input->post('isSubscribe3');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($isSubscribe1) {
				$this->db->set('isSubscribe1', 1);
			}else{
				$this->db->set('isSubscribe1', 0);
			}

			if ($isSubscribe2) {
				$this->db->set('isSubscribe2', 1);
			}else{
				$this->db->set('isSubscribe2', 0);
			}

			if ($isSubscribe3) {
				$this->db->set('isSubscribe3', 1);
			}else{
				$this->db->set('isSubscribe3', 0);
			}

			$this->db->set('UpdateBy', $this->session->userdata('Email'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('Email', $this->session->userdata('Email'));
			$this->db->update('CanProfile');

			$this->session->set_flashdata('success', 'Successfully change SMS Subscription.');
			redirect('account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('account-setting');
		}
	}

	public function changeJobEmailNotification()
	{
		$isEmailNotif1 = $this->input->post('isEmailNotif1');
		$isEmailNotif2 = $this->input->post('isEmailNotif2');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($isEmailNotif1) {
				$this->db->set('isEmailNotif1', 1);
			}else{
				$this->db->set('isEmailNotif1', 0);
			}

			if ($isEmailNotif2) {
				$this->db->set('isEmailNotif2', 1);
			}else{
				$this->db->set('isEmailNotif2', 0);
			}
			
			$this->db->set('UpdateBy', $this->session->userdata('Email'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('Email', $this->session->userdata('Email'));
			$this->db->update('CanProfile');

			$this->session->set_flashdata('success', 'Successfully change SMS Subscription.');
			redirect('account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('account-setting');
		}
	}

	public function changeRecruiterViewNotification()
	{
		$isNotifRecruiter = $this->input->post('isNotifRecruiter');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($isNotifRecruiter) {
				$this->db->set('isNotifRecruiter', 1);
			}else{
				$this->db->set('isNotifRecruiter', 0);
			}
			
			$this->db->set('UpdateBy', $this->session->userdata('Email'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('Email', $this->session->userdata('Email'));
			$this->db->update('CanProfile');

			$this->session->set_flashdata('success', 'Successfully change SMS Subscription.');
			redirect('account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('account-setting');
		}
	}

	public function changeTimezone()
	{
		$timezone = $this->input->post('timezone');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->set('TimeZoneId', $timezone);
			$this->db->set('UpdateBy', $this->session->userdata('Email'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('Email', $this->session->userdata('Email'));
			$this->db->update('CanProfile');

			$this->session->set_flashdata('success', 'Successfully change SMS Subscription.');
			redirect('account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('account-setting');
		}
	}

	public function changeNameAdmin()
	{
		$first_name = $this->input->post('new_first_name');
		$last_name = $this->input->post('new_last_name');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		if ($SMAccessHd) {
			$this->db->set('FirstName', $first_name);
			$this->db->set('LastName', $last_name);
			$this->db->set('EditBy', $this->session->userdata('UserName'));
			$this->db->set('EditDate', date('Y-m-d H:i:s'));
			$this->db->where('UserName', $this->session->userdata('UserName'));
			$this->db->update('SMAccessHd');

			$this->session->set_flashdata('success', 'Successfully change name.');
			redirect('admin/account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/account-setting');
		}
	}

	public function changeEmailAdmin()
	{
		$password = $this->input->post('current_password');
		$email = $this->input->post('current_email');
		$newemail = $this->input->post('new_email');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['Email' => $email])->row_array();
		if ($SMAccessHd) {
			if (password_verify($password, $SMAccessHd['Password'])) {
				$CanRegisterNew = $this->db->get_where('CanRegister', ['Email' => $newemail])->row_array();
				$SMAccessHdNew = $this->db->get_where('SMAccessHd', ['Email' => $newemail])->row_array();
				// User Terdaftar
				if ($CanRegisterNew || $SMAccessHdNew) {
					$this->session->set_flashdata('error', 'Sorry, Email is Already Registered.');
					redirect('admin/account-setting');
				}else{
					$this->db->set('Email', $newemail);
					$this->db->set('EditBy', $this->session->userdata('UserName'));
					$this->db->set('EditDate', date('Y-m-d H:i:s'));
					$this->db->where('Email', $email);
					$this->db->update('SMAccessHd');

					$this->session->set_flashdata('success', 'Successfully change email.');
					redirect('admin/account-setting');
				}
			}else{
				$this->session->set_flashdata('error', 'Wrong Password!');
				redirect('admin/account-setting');
			}
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('account-setting');
		}
	}

	public function changeMobileNumberAdmin()
	{
		$code = $this->input->post('new_mobile_number_code');
		$mobile_number = $this->input->post('new_mobile_number');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		if ($SMAccessHd) {
			$this->db->set('PhoneNumberCode', $code);
			$this->db->set('PhoneNumber', $mobile_number);
			$this->db->set('EditBy', $this->session->userdata('UserName'));
			$this->db->set('EditDate', date('Y-m-d H:i:s'));
			$this->db->where('UserName', $this->session->userdata('UserName'));
			$this->db->update('SMAccessHd');

			$this->session->set_flashdata('success', 'Successfully change mobile number.');
			redirect('admin/account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/account-setting');
		}
	}

	public function changePasswordAdmin()
	{
		$currentpassword = $this->input->post('current_password');
		$newpassword = $this->input->post('new_password');
		$confimpassword = $this->input->post('confirm_password');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		if ($SMAccessHd) {
			if ($newpassword === $confimpassword) {
				if (password_verify($currentpassword, $SMAccessHd['Password'])) {
					$this->db->set('Password', password_hash($newpassword, PASSWORD_DEFAULT));
					$this->db->set('EditBy', $this->session->userdata('UserName'));
					$this->db->set('EditDate', date('Y-m-d H:i:s'));
					$this->db->where('UserName', $this->session->userdata('UserName'));
					$this->db->update('SMAccessHd');

					$this->session->set_flashdata('success', 'Successfully change password.');
					redirect('admin/account-setting');
				}else{
					$this->session->set_flashdata('error', 'Wrong Password!');
					redirect('admin/account-setting');
				}
			}else{
				$this->session->set_flashdata('error', 'New Password dan Retype Password Tidak Sama!');
				redirect('admin/account-setting');
			}
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/account-setting');
		}
	}

	public function changeSMSSubscriptionAdmin()
	{
		$isSmsSubscription = $this->input->post('isSmsSubscription');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		if ($SMAccessHd) {
			if ($isSmsSubscription) {
				$this->db->set('IsSmsSubscription', 1);
			}else{
				$this->db->set('IsSmsSubscription', 0);
			}
			
			$this->db->set('EditBy', $this->session->userdata('UserName'));
			$this->db->set('EditDate', date('Y-m-d H:i:s'));
			$this->db->where('UserName', $this->session->userdata('UserName'));
			$this->db->update('SMAccessHd');

			$this->session->set_flashdata('success', 'Successfully change SMS Subscription.');
			redirect('admin/account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/account-setting');
		}
	}

	public function changeEmailSubscriptionAdmin()
	{
		$isEmailSubscription = $this->input->post('isEmailSubscription');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		if ($SMAccessHd) {
			if ($isEmailSubscription) {
				$this->db->set('IsEmailSubscription', 1);
			}else{
				$this->db->set('IsEmailSubscription', 0);
			}
			
			$this->db->set('EditBy', $this->session->userdata('UserName'));
			$this->db->set('EditDate', date('Y-m-d H:i:s'));
			$this->db->where('UserName', $this->session->userdata('UserName'));
			$this->db->update('SMAccessHd');

			$this->session->set_flashdata('success', 'Successfully change Email Subscription.');
			redirect('admin/account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/account-setting');
		}
	}

	public function changeCandidateApplicationSubscriptionAdmin()
	{
		$isCandidateAppliesSubscription = $this->input->post('isCandidateAppliesSubscription');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		if ($SMAccessHd) {
			if ($isCandidateAppliesSubscription) {
				$this->db->set('IsCandidateAppliesSubscription', 1);
			}else{
				$this->db->set('IsCandidateAppliesSubscription', 0);
			}
			
			$this->db->set('EditBy', $this->session->userdata('UserName'));
			$this->db->set('EditDate', date('Y-m-d H:i:s'));
			$this->db->where('UserName', $this->session->userdata('UserName'));
			$this->db->update('SMAccessHd');

			$this->session->set_flashdata('success', 'Successfully change Candidate Application Subscription.');
			redirect('admin/account-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/account-setting');
		}
	}

	public function changeCompanyNameAdmin()
	{
		$name = $this->input->post('new_company_name');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$Company = $this->db->get_where('Company', ['CompanyId' => $SMAccessHd['CompanyId']])->row_array();
		if ($Company) {
			$this->db->set('CompanyName', $name);
			$this->db->set('UpdateBy', $this->session->userdata('UserName'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('CompanyId', $Company['CompanyId']);
			$this->db->update('Company');

			$this->session->set_flashdata('success', 'Successfully change company name.');
			redirect('admin/company-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/company-setting');
		}
	}

	public function changeCompanyDescriptionAdmin()
	{
		$description = $this->input->post('new_company_description');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$Company = $this->db->get_where('Company', ['CompanyId' => $SMAccessHd['CompanyId']])->row_array();
		if ($Company) {
			$this->db->set('CompanyDescryption', $description);
			$this->db->set('UpdateBy', $this->session->userdata('UserName'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('CompanyId', $Company['CompanyId']);
			$this->db->update('Company');

			$this->session->set_flashdata('success', 'Successfully change company description.');
			redirect('admin/company-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/company-setting');
		}
	}

	public function changeCompanyIndustryAdmin()
	{
		$industry = $this->input->post('new_company_industry');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$Company = $this->db->get_where('Company', ['CompanyId' => $SMAccessHd['CompanyId']])->row_array();
		if ($Company) {
			$this->db->set('IndustryId', $industry);
			$this->db->set('UpdateBy', $this->session->userdata('UserName'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('CompanyId', $Company['CompanyId']);
			$this->db->update('Company');

			$this->session->set_flashdata('success', 'Successfully change company industry.');
			redirect('admin/company-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/company-setting');
		}
	}

	public function changeCompanyURLAdmin()
	{
		$url = $this->input->post('new_company_url');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$Company = $this->db->get_where('Company', ['CompanyId' => $SMAccessHd['CompanyId']])->row_array();
		if ($Company) {
			$this->db->set('CompanyURL', $url);
			$this->db->set('UpdateBy', $this->session->userdata('UserName'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('CompanyId', $Company['CompanyId']);
			$this->db->update('Company');

			$this->session->set_flashdata('success', 'Successfully change company url.');
			redirect('admin/company-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/company-setting');
		}
	}

	public function changeCompanyAddressAdmin()
	{
		$address = $this->input->post('new_company_address');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$Company = $this->db->get_where('Company', ['CompanyId' => $SMAccessHd['CompanyId']])->row_array();
		if ($Company) {
			$this->db->set('Address', $address);
			$this->db->set('UpdateBy', $this->session->userdata('UserName'));
			$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
			$this->db->where('CompanyId', $Company['CompanyId']);
			$this->db->update('Company');

			$this->session->set_flashdata('success', 'Successfully change company address.');
			redirect('admin/company-setting');
		}else{
			$this->session->set_flashdata('error', 'No Data Found!');
			redirect('admin/company-setting');
		}
	}

	public function uploadLogo() {
		if (!empty($_FILES['file']['name'])) {
			$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		
			$config['upload_path'] = './assets/template/images/logo/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; // maksimal 2MB
			$config['file_name'] = $data['SMAccessHd']['CompanyId'];
			$config['overwrite'] = TRUE;
	
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('file')) {
				$uploadedData = $this->upload->data();

				$this->db->set('CompanyLogo', $uploadedData['file_name']);
				$this->db->set('UpdateBy', $this->session->userdata('UserName'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CompanyId', $data['SMAccessHd']['CompanyId']);
				$this->db->update('Company');
	
				// $publicUrl = base_url('assets/template/images/avatar/' . $uploadedData['file_name']);
	
				echo json_encode(base_url('assets/template/images/logo/' . $uploadedData['file_name']));
			} else {
				echo json_encode(['error' => $this->upload->display_errors()], 400);
			}
		} else {
			echo json_encode(['error' => 'No file uploaded.'], 400);
		}
	}

	public function uploadbanner() {
		if (!empty($_FILES['file']['name'])) {
			$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		
			$config['upload_path'] = './assets/template/images/banner/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; // maksimal 2MB
			$config['file_name'] = $data['SMAccessHd']['CompanyId'];
			$config['overwrite'] = TRUE;
	
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('file')) {
				$uploadedData = $this->upload->data();

				$this->db->set('CompanyBanner', $uploadedData['file_name']);
				$this->db->set('UpdateBy', $this->session->userdata('UserName'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CompanyId', $data['SMAccessHd']['CompanyId']);
				$this->db->update('Company');
	
				echo json_encode(base_url('assets/template/images/banner/' . $uploadedData['file_name']));
			} else {
				echo json_encode(['error' => $this->upload->display_errors()], 400);
			}
		} else {
			echo json_encode(['error' => 'No file uploaded.'], 400);
		}
	}
}
