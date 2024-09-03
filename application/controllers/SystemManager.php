<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SystemManager extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('secure');
		$this->load->model('m_user');
		$this->load->helper(array('url', 'form', 'text'));
		$this->load->model('M_menu', '', TRUE);
		$this->load->model('Admin');
		$this->load->model('m_jobvacancy');
		$this->load->model('m_data');
	}

	private function checkLogin() {
        if (!$this->session->userdata('UserName')) {
            redirect('administrator'); // Redirect ke halaman sign in jika tidak ada sesi login.
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

		$this->load->model('M_Message');

		$category = $this->input->get('category');
		$categoryTrustee = $this->input->get('category_trustee');

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Menu'] = $this->M_menu->getMenuAdmin();
		$data['Title'] = 'System Manager';
		$data['main'] = 'admin/SystemManager';
		$data['script'] = 'Script/system-manager';
		$data['modal'] = 'modal/system-manager';
		$data['MenuAdmin'] = $this->M_menu->get_menu();
        $data['SMGroup'] = $this->db->get('SMGroup')->result_array();
		$data['DataMenu'] = $this->db->get('MenuAdmin')->result_array();
        $data['SMGroup'] = array_map(function ($job) {
			$job['SMGroupData'] = $this->db->get_where('GroupType', ['GroupTypeId' => $job['GroupType']])->row_array();
			return $job;
		}, $data['SMGroup']);

		if(empty($category)){
			$data['Category'] = 1;
		}else{
			$data['Category'] = $category;
		}

		if(empty($categoryTrustee)){
			$data['CategoryTrustee'] = 1;
		}else{
			$data['CategoryTrustee'] = $categoryTrustee;
		}

		$parentsWithChildren = [];

		// Iterasi untuk mencatat parent yang memiliki anak
		foreach ($data['DataMenu'] as &$menuItem) {
			$parent = $menuItem['MenuAdminParent'];
		
			if (!isset($parentsWithChildren[$parent])) {
				$parentsWithChildren[$parent] = false;
			}
			
			// Jika ada anak, tandai parent dengan 'hasChild' true
			if (!$parentsWithChildren[$parent]) {
				$parentsWithChildren[$parent] = in_array($menuItem['MenuAdminId'], array_column($data['DataMenu'], 'MenuAdminParent'));
			}
		
			// Tambahkan 'hasChild' ke elemen array saat ini
			$menuItem['hasChild'] = in_array($menuItem['MenuAdminId'], array_column($data['DataMenu'], 'MenuAdminParent'));
		}

		$this->load->view('admin/custom_system_manager', $data);
	}

	public function postJob()
	{
		$this->checkLogin();

		$this->load->model('M_Message'); 

		$job_id = $this->input->get('job_id');

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Menu'] = $this->M_menu->getMenuAdmin();
		$data['JobLevel'] = $this->db->get('JobLevel')->result_array();
		$data['JobFunction'] = $this->db->get('JobFunction')->result_array();
		$data['EmpType'] = $this->db->get('EmpType')->result_array();
		$data['Country'] = $this->db->get('Country')->result_array();
		$data['EducationLevel'] = $this->db->get('EducationLevel')->result_array();
		$data['Location'] = $this->db->get('Location')->result_array();
		$data['SMAccessHdId'] = $data['SMAccessHd']['SMAccessHdId'];

		if($job_id){
			$data['JobVacancy'] = $this->db->get_where('VJobVacancy', ['JobVacancyId' => $this->secure->decrypt_url($job_id)])->row_array();
		}

		// var_dump($data['JobList']);
		// exit;

		$this->load->view('admin/custom_postjob', $data);
	}

	public function prosesPostJobInformation()
	{
		$job_id = $this->input->post('job_id');
		$job_title = $this->input->post('job_title');
		$function = $this->input->post('function_information');
		$job_function = $this->input->post('job_function');
		$job_level = $this->input->post('job_level');
		$employment_type = $this->input->post('employment_type');
		$number_people = $this->input->post('number_people');
		$deadline = $this->input->post('deadline');
		$education_attainment = $this->input->post('education_attainment');
		$qualification_experience = $this->input->post('qualification_experience');
		$job_description = $this->input->post('job_description');
		$location = $this->input->post('location');
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		$city = $this->input->post('city');
		$unit_no = $this->input->post('unit_no');
		$street_address = $this->input->post('street_address');
		$remote_work = $this->input->post('remote_work');
		$willing_relocate = $this->input->post('willing_relocate');
		$status = $this->input->post('status');
		$job_type = $this->input->post('job_type');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		if ($SMAccessHd) {
			if ($function == 'Add') {
				$JobVacancy = [
					'CompanyId' => 1,
					'Position' => $job_title,
					'Qualification' => $qualification_experience,
					'JobDescription' => $job_description,
					'JobLevelId' => $job_level,
					'JobFunctionId' => $job_function,
					'EducationLevelId' => $education_attainment,
					'LocationId' => $location,
					'EmpTypeId' => $employment_type,
					'TotalCandidateHiring' => $number_people,
					'Dateline' => $deadline,
					'ProvinceId' => $region,
					'CityId' => $city,
					'IsRelocation' => empty($willing_relocate) ? false : true,
					'CreateBy' => $this->session->userdata('UserName'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('UserName'),
					'UpdateDate' => date('Y-m-d H:i:s'),
					'IsStatus' => $status,
					'IsJobType' => $job_type,
				];

				$this->db->insert('JobVacancy', $JobVacancy);

				$this->session->set_flashdata('success', 'Successfully Save Job.');
			}else{
				$this->db->set('Position', $job_title);
				$this->db->set('Qualification', $qualification_experience);
				$this->db->set('JobDescription', $job_description);
				$this->db->set('JobLevelId', $job_level);
				$this->db->set('JobFunctionId', $job_function);
				$this->db->set('EducationLevelId', $education_attainment);
				$this->db->set('LocationId', $location);
				$this->db->set('EmpTypeId', $employment_type);
				$this->db->set('TotalCandidateHiring', $number_people);
				$this->db->set('Dateline', $deadline);
				$this->db->set('ProvinceId', $region);
				$this->db->set('CityId', $city);
				$this->db->set('IsRelocation', empty($willing_relocate) ? false : true);
				$this->db->set('IsStatus', $status);
				$this->db->set('IsJobType', $job_type);
				$this->db->set('UpdateBy', $this->session->userdata('UserName'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('JobVacancyId', $job_id);
				$this->db->update('JobVacancy');

				$this->session->set_flashdata('success', 'Successfully Edit Job.');
			}

			redirect('Dashboard');
		}else{
			$this->session->set_flashdata('error', 'Failed to save/edit job.');
			redirect('post-job');
		}
	}

	public function viewJobStatus()
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

		$jobId = $this->input->get('jobId');
		$category = $this->input->get('category');
		$jobIdDecrypt = $this->secure->decrypt_url($jobId);
		// $jobIdDecrypt = $this->encryption->decrypt(urldecode($jobId));
		// $jobIdDecrypt = $this->my_decrypt(urldecode($jobId));

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Menu'] = $this->M_menu->getMenuAdmin();
		$data['JobVacancy'] = $this->db->get_where('JobVacancy', ['JobVacancyId' => $jobIdDecrypt])->row_array();
		$data['Category'] = $category;

		if($category == 1){
			$data['JobDetail'] = $this->m_jobvacancy->getjobinquiry($jobIdDecrypt);
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				return $job;
			}, $data['JobDetail']);
		}else if($category == 2){
			$data['JobDetail'] = $this->m_jobvacancy->getjobapplications($jobIdDecrypt);
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				return $job;
			}, $data['JobDetail']);
		}else if($category == 3){
			$data['JobDetail'] = $this->m_jobvacancy->getjobshortlist($jobIdDecrypt);
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				return $job;
			}, $data['JobDetail']);
		}else if($category == 4){
			$data['JobDetail'] = $this->m_jobvacancy->getjobcallout($jobIdDecrypt);
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				return $job;
			}, $data['JobDetail']);
		}else if($category == 5){
			$data['JobDetail'] = $this->m_jobvacancy->getjobcalloutevaluation($jobIdDecrypt);
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				return $job;
			}, $data['JobDetail']);
		}else if($category == 6){
			$data['JobDetail'] = $this->m_jobvacancy->getjoboffering($jobIdDecrypt);
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				return $job;
			}, $data['JobDetail']);
		}else if($category == 7){
			$data['JobDetail'] = $this->m_jobvacancy->getjobhiring($jobIdDecrypt);
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				return $job;
			}, $data['JobDetail']);
		}

		$this->load->view('admin/custom_job_status', $data);
	}

	public function viewCandidateJobStatus($CanProfileId = null, $JobVacancyId = null, $Category = null)
	{
		$this->checkLogin();

		$this->load->model('M_Message');

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Menu'] = $this->M_menu->getMenuAdmin();
		$data['Category'] = $Category;

		if($JobVacancyId && $CanProfileId){
			$data['JobVacancy'] = $this->db->get_where('JobVacancy', ['JobVacancyId' => $JobVacancyId])->row_array();
			$data['CanProfile'] = $this->db->get_where('VCanProfile', ['CanProfileId' => $CanProfileId])->row_array();
			$data['SalaryExpectation'] = $this->db->get_where('VCanSalaryExpectation', ['CanProfileId' => $CanProfileId])->result_array();
			$data['WorkExperience'] = $this->db->get_where('VCanWorkExperience', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Education'] = $this->db->get_where('VCanEducation', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Skill'] = $this->db->get_where('VCanSkill', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Summary'] = $this->db->get_where('VCanSummary', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Affiliation'] = $this->db->get_where('VCanAffiliation', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Seminar'] = $this->db->get_where('VCanSeminarTraining', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Award'] = $this->db->get_where('VCanAward', ['CanProfileId' => $CanProfileId])->result_array();
			$data['TestScore'] = $this->db->get_where('VCanTestScore', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Volunteerism'] = $this->db->get_where('VCanVolunteerism', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Reference'] = $this->db->get_where('CanReference', ['CanProfileId' => $CanProfileId])->result_array();
			$data['CoCurricular'] = $this->db->get_where('VCanCoCurricularActivities', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Project'] = $this->db->get_where('VCanProject', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Language'] = $this->db->get_where('VCanLanguage', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Certification'] = $this->db->get_where('VCanCertification', ['CanProfileId' => $CanProfileId])->result_array();
			$data['Resume'] = $this->db->get_where('VCanResume', ['CanProfileId' => $CanProfileId])->result_array();
		}else{
			$data['JobVacancy'] = null;
			$data['CanProfile'] = null;
		}

		// var_dump($data['CanProfile']);
		// exit;

		$this->load->view('admin/custom_status_candidate', $data);
	}

	public function viewJobInquiry()
	{
		$JobVacancyId = $this->input->post('id');
		$JobDetail = $this->m_jobvacancy->getjobinquiry($JobVacancyId);

		echo json_encode($JobDetail);
	}

	public function viewJobApplications()
	{
		$JobVacancyId = $this->input->post('id');
		$JobDetail = $this->m_jobvacancy->getjobapplications($JobVacancyId);

		echo json_encode($JobDetail);
	}

	public function viewJobShortlist()
	{
		$JobVacancyId = $this->input->post('id');
		$JobDetail = $this->m_jobvacancy->getjobshortlist($JobVacancyId);

		echo json_encode($JobDetail);
	}

	public function viewJobCallout()
	{
		$JobVacancyId = $this->input->post('id');
		$JobDetail = $this->m_jobvacancy->getjobcallout($JobVacancyId);

		echo json_encode($JobDetail);
	}

	public function viewJobCalloutEvaluation()
	{
		$JobVacancyId = $this->input->post('id');
		$JobDetail = $this->m_jobvacancy->getjobcalloutevaluation($JobVacancyId);

		echo json_encode($JobDetail);
	}

	public function viewJobOffering()
	{
		$JobVacancyId = $this->input->post('id');
		$JobDetail = $this->m_jobvacancy->getjoboffering($JobVacancyId);

		echo json_encode($JobDetail);
	}

	public function viewJobHiring()
	{
		$JobVacancyId = $this->input->post('id');
		$JobDetail = $this->m_jobvacancy->getjobhiring($JobVacancyId);

		echo json_encode($JobDetail);
	}

	public function viewMenuUserGroup()
	{
		$SMGroupId = $this->input->post('id');
		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$SMAccessHdId = $SMAccessHd['SMAccessHdId'];
		$MenuAdmin = $this->db->get("Fn_MenuAdmin($SMAccessHdId, $SMGroupId)")->result();

		echo json_encode($MenuAdmin);
	}

	public function changeMenuUserGroup()
	{
		$MenuAdminId = $this->input->post('id');
		$SMGroupId = $this->input->post('group_id');
		$IsActive = $this->input->post('checked');

		if($IsActive){
			$MenuAdmin = [
				'SMGroupId' => $SMGroupId,
				'MenuAdminId' => $MenuAdminId,
				'Sort' => null,
				'IsActive' => $IsActive,
				'CreateBy' => $this->session->userdata('UserName'),
				'CreateDate' => date('Y-m-d H:i:s'),
				'EditBy' => $this->session->userdata('UserName'),
				'EditDate' => date('Y-m-d H:i:s'),
			];

			$this->db->insert('SMGroupMenuAdmin', $MenuAdmin);

			echo json_encode(['status' => true]);
		}else{
			$MenuAdmin = $this->db->get_where('SMGroupMenuAdmin', ['SMGroupId' => $SMGroupId, 'MenuAdminId' => $MenuAdminId])->row_array();
			if ($MenuAdmin) {
				$this->db->delete('SMGroupMenuAdmin', ['SMGroupId' => $SMGroupId, 'MenuAdminId' => $MenuAdminId]);

				echo json_encode(['status' => true]);
			}
		}
	}

	public function viewLocationUserGroup()
	{
		$SMGroupId = $this->input->post('id');
		$SMGroupDataTrusteeLocation = $this->db->get_where('SMGroupDataTrusteeLocation', ['SMGroupId' => $SMGroupId])->result();
		$SMGroupDataTrusteeLocation = array_map(function ($row) {
			$row->LocationData = $this->db->get_where('VF_LocationTrustee', ['Id' => $row->ODLocationId])->row();
			return $row;
		}, $SMGroupDataTrusteeLocation);

		echo json_encode($SMGroupDataTrusteeLocation);
	}

	public function viewJobLevelUserGroup()
	{
		$SMGroupId = $this->input->post('id');
		$SMGroupDataTrusteeJobLevel = $this->db->get_where('SMGroupDataTrusteeJobLevel', ['SMGroupId' => $SMGroupId])->result();
		$SMGroupDataTrusteeJobLevel = array_map(function ($row) {
			$row->JobLevelData = $this->db->get_where('VF_JobLevelTrustee', ['Id' => $row->ODJobLevelId])->row();
			return $row;
		}, $SMGroupDataTrusteeJobLevel);

		echo json_encode($SMGroupDataTrusteeJobLevel);
	}

	public function viewOrganizationUserGroup()
	{
		$SMGroupId = $this->input->post('id');
		$SMGroupDataTrusteeOrg = $this->db->get_where('SMGroupDataTrusteeOrg', ['SMGroupId' => $SMGroupId])->result();
		$SMGroupDataTrusteeOrg = array_map(function ($row) {
			$row->OrganizationData = $this->db->get_where('Vf_OrganizationTrustee', ['Id' => $row->OrgId])->row();
			return $row;
		}, $SMGroupDataTrusteeOrg);

		echo json_encode($SMGroupDataTrusteeOrg);
	}

	public function formjob()
	{
		$CompanyId = 1;
		$Position = $this->input->post('Position');
		$Qualification = $this->input->post('Qualification');
		$JobDescription = $this->input->post('JobDescription');
		$JobLevelId = $this->input->post('JobLevelId');
		$JobFunctionId = $this->input->post('JobFunctionId');
		$EducationLevelId = $this->input->post('EducationLevelId');
		$LocationId = $this->input->post('LocationId');
		$EmpTypeId = $this->input->post('EmpTypeId');
		$TotalCandidateHiring = $this->input->post('TotalCandidateHiring');
		$Dateline = $this->input->post('Dateline');
		$IsviewSalary = $this->input->post('IsViewSalary');
		$RangeStartSalary = $this->input->post('RangeStartSalary');
		$RangeEndSalary = $this->input->post('RangeEndSalary');
		$ProvinceId = $this->input->post('ProvinceId');
		$CityId = $this->input->post('CityId');
		$IsRelocation = $this->input->post('IsRelocation');
		$Banner = $this->input->post('Banner');
		$Video = $this->input->post('Video');
		$StartDate = $this->input->post('StartDate');
		$EndDate = $this->input->post('EndDate');
		$CreateBy = $this->input->post('CreateBy');
		$CreateDate = $this->input->post('CreateDate');
		$UpdateBy = $this->input->post('UpdateBy');
		$UpdateDate = $this->input->post('UpdateDate');

		$data = array(
			'CompanyId' => $CompanyId,
			'Position' => $Position,
			'Qualification' => $Qualification,
			'JobDescription' => $JobDescription,
			'JobLevelId' => $JobLevelId,
			'JobFunctionId' => $JobFunctionId,
			'EducationLevelId' => $EducationLevelId,
			'LocationId' => $LocationId,
			'EmpTypeId' => $EmpTypeId,
			'TotalCandidateHiring' => $TotalCandidateHiring,
			'Dateline' => $Dateline,
			'IsviewSalary' => $IsviewSalary,
			'RangeStartSalary' => $RangeStartSalary,
			'RangeEndSalary' => $RangeEndSalary,
			'ProvinceId' => $ProvinceId,
			'CityId' => $CityId,
			'IsRelocation' => $IsRelocation,
			'Banner' => $Banner,
			'Video' => $Video,
			'StartDate' => $StartDate,
			'EndDate' => $EndDate,
			'CreateBy' => $CreateBy,
			'CreateDate' => $CreateDate,
			'UpdateBy' => $UpdateBy,
			'UpdateDate' => $UpdateDate,
		);
		$this->m_data->input_formjob($data, 'JobVacancy');
		redirect('Dashboard');
	}
	public function Dashdetail()
	{
		$data['JobVacancy'] = $this->m_jobvacancy->getJobVacancy();
		$data['Location'] = $this->m_jobvacancy->getLocation();
		$data['Listjob'] = $this->m_jobvacancy->getlistjob();
		$this->load->view('admin/dashdetail', $data);
	}

	public function inviteToApply()
	{
		$id = $this->input->post('id');
		$job = $this->input->post('job');

		if($id && $job){
			$data['CanProfile'] = $this->db->get_where('VCanProfile', ['CanProfileId' => $id])->row_array();
			$data['JobVacancy'] = $this->db->get_where('VJobVacancy', ['JobVacancyId' => $job])->row_array();

			$this->load->library('email');
			$this->email->from('imamachmad18@gmail.com', 'HUMAN CAPITAL INFORMATION SYSTEM');
			// $this->email->to($data['CanProfile']['Email']);
			$this->email->to('iniapa1111@gmail.com');
			$email_message = $this->load->view('user/email_invite_to_apply', $data, TRUE);

			$this->email->subject('HUMAN CAPITAL JNE - INVITATION TO APPLY');
			$this->email->message($email_message);

			if ($this->email->send()) {
				echo json_encode(['status' => true]);
			} else {
				echo json_encode(['status' => false]);
				die;
			}
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function viewUserGroup()
	{
		$id = $this->input->post('id');

		$data['SMGroup'] = $this->db->get_where('SMGroup', ['SMGroupId' => $id])->row_array();
		$data['GroupType'] = $this->db->get_where('GroupType', ['GroupTypeId' => $data['SMGroup']['GroupType']])->row_array();
		
		// var_dump($data['Certification']);
		// exit;
		
		echo json_encode($data);
	}

	public function prosesUserGroup()
	{
		$id = $this->input->post('user_group_id');
		$function = $this->input->post('user_group_function');
		$name = $this->input->post('user_group_name');
		$type = $this->input->post('user_group_type');
		$organization = $this->input->post('user_group_organization');
		$job_level = $this->input->post('user_group_job_level');
		$location = $this->input->post('user_group_location');
		$start_date = $this->input->post('user_group_start_date');
		$end_date = $this->input->post('user_group_end_date');
		$status = $this->input->post('user_group_status');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		if ($SMAccessHd) {
			if ($function == 'Add') {
				$SMGroup = [
					'Description' => $name,
					'GroupType' => $type,
					'IsOrganization' => empty($organization) ? false : true,
					'IsLocation' => empty($location) ? false : true,
					'IsJobLevel' => empty($job_level) ? false : true,
					'StartDate' => $start_date,
					'EndDate' => $end_date,
					'IsActive' => $status,
					'CreateBy' => $this->session->userdata('UserName'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'EditBy' => $this->session->userdata('UserName'),
					'EditDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('SMGroup', $SMGroup);

				$this->session->set_flashdata('success', 'Successfully add user group.');
			}else{
				$this->db->set('Description', $name);
				$this->db->set('GroupType', $type);
				$this->db->set('IsOrganization', empty($organization) ? false : true);
				$this->db->set('IsLocation', empty($location) ? false : true);
				$this->db->set('IsJobLevel', empty($job_level) ? false : true);
				$this->db->set('StartDate', $start_date);
				$this->db->set('EndDate', $end_date);
				$this->db->set('IsActive', $status);
				$this->db->set('EditBy', $this->session->userdata('UserName'));
				$this->db->set('EditDate', date('Y-m-d H:i:s'));
				$this->db->where('SMGroupId', $id);
				$this->db->update('SMGroup');

				$this->session->set_flashdata('success', 'Successfully edit user group.');
			}

			redirect('SystemManager');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit user group.');
			redirect('SystemManager');
		}
	}

	public function deleteUserGroup()
	{
		$id = $this->input->post('id');

		$SMGroup = $this->db->get_where('SMGroup', ['SMGroupId' => $id])->row_array();
		if ($SMGroup) {
			$this->db->delete('SMGroup', ['SMGroupId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function viewTrusteeLocation()
	{
		$id = $this->input->post('id');

		$data['SMGroupDataTrusteeLocation'] = $this->db->get_where('SMGroupDataTrusteeLocation', ['SMGroupDataLocationId' => $id])->row_array();
		$data['SMGroupDataTrusteeLocation']['LocationData'] = $this->db->get_where('VF_LocationTrustee', ['Id' => $data['SMGroupDataTrusteeLocation']['ODLocationId']])->row_array();
		$data['SMGroupDataTrusteeLocation']['SMGroupData'] = $this->db->get_where('SMGroup', ['SMGroupId' => $data['SMGroupDataTrusteeLocation']['SMGroupId']])->row_array();

		// var_dump($data['SMGroupDataTrusteeLocation']);
		// exit;
		
		echo json_encode($data);
	}

	public function viewTrusteeJobLevel()
	{
		$id = $this->input->post('id');

		$data['SMGroupDataTrusteeJobLevel'] = $this->db->get_where('SMGroupDataTrusteeJobLevel', ['SMGroupDataJobLevelId' => $id])->row_array();
		$data['SMGroupDataTrusteeJobLevel']['JobLevelData'] = $this->db->get_where('VF_JobLevelTrustee', ['Id' => $data['SMGroupDataTrusteeJobLevel']['ODJobLevelId']])->row_array();
		$data['SMGroupDataTrusteeJobLevel']['SMGroupData'] = $this->db->get_where('SMGroup', ['SMGroupId' => $data['SMGroupDataTrusteeJobLevel']['SMGroupId']])->row_array();

		// var_dump($data['SMGroupDataTrusteeLocation']);
		// exit;
		
		echo json_encode($data);
	}

	public function viewTrusteeOrganization()
	{
		$id = $this->input->post('id');

		$data['SMGroupDataTrusteeOrg'] = $this->db->get_where('SMGroupDataTrusteeOrg', ['SMGroupDataTrusteeOrgId' => $id])->row_array();
		$data['SMGroupDataTrusteeOrg']['OrganizationData'] = $this->db->get_where('Vf_OrganizationTrustee', ['Id' => $data['SMGroupDataTrusteeOrg']['OrgId']])->row_array();
		$data['SMGroupDataTrusteeOrg']['SMGroupData'] = $this->db->get_where('SMGroup', ['SMGroupId' => $data['SMGroupDataTrusteeOrg']['SMGroupId']])->row_array();

		// var_dump($data['SMGroupDataTrusteeLocation']);
		// exit;
		
		echo json_encode($data);
	}

	public function prosesTrusteeLocation()
	{
		$id = $this->input->post('id_location');
		$group_id = $this->input->post('user_group_id_location');
		$function = $this->input->post('function_location');
		$location = $this->input->post('location_location');
		$status = $this->input->post('status_location');

		
		if ($function == 'Add') {
			$SMGroupDataTrusteeLocation = [
				'SMGroupId' => $group_id,
				'ODLocationId' => $location,
				'Sort' => null,
				'IsActive' => $status == "1" ? true : false,
				'CreateBy' => $this->session->userdata('UserName'),
				'CreateDate' => date('Y-m-d H:i:s'),
				'EditBy' => $this->session->userdata('UserName'),
				'EditDate' => date('Y-m-d H:i:s'),
			];

			$this->db->insert('SMGroupDataTrusteeLocation', $SMGroupDataTrusteeLocation);

			$this->session->set_flashdata('success', 'Successfully add data location.');
		}else{
			$this->db->set('ODLocationId', $location);
			$this->db->set('Sort', null);
			$this->db->set('IsActive', $status == "1" ? true : false);
			$this->db->set('EditBy', $this->session->userdata('UserName'));
			$this->db->set('EditDate', date('Y-m-d H:i:s'));
			$this->db->where('SMGroupDataLocationId', $id);
			$this->db->update('SMGroupDataTrusteeLocation');

			$this->session->set_flashdata('success', 'Successfully edit data location.');
		}

		redirect('SystemManager');
	}

	public function prosesTrusteeJobLevel()
	{
		$id = $this->input->post('id_job');
		$group_id = $this->input->post('user_group_id_job');
		$function = $this->input->post('function_job');
		$job_level = $this->input->post('job_level_job');
		$status = $this->input->post('status_job');

		if ($function == 'Add') {
			$SMGroupDataTrusteeJobLevel = [
				'SMGroupId' => $group_id,
				'ODJobLevelId' => $job_level,
				'Sort' => null,
				'IsActive' => $status == "1" ? true : false,
				'CreateBy' => $this->session->userdata('UserName'),
				'CreateDate' => date('Y-m-d H:i:s'),
				'EditBy' => $this->session->userdata('UserName'),
				'EditDate' => date('Y-m-d H:i:s'),
			];

			$this->db->insert('SMGroupDataTrusteeJobLevel', $SMGroupDataTrusteeJobLevel);

			$this->session->set_flashdata('success', 'Successfully add data job level.');
		}else{
			$this->db->set('ODJobLevelId', $job_level);
			$this->db->set('Sort', null);
			$this->db->set('IsActive', $status == "1" ? true : false);
			$this->db->set('EditBy', $this->session->userdata('UserName'));
			$this->db->set('EditDate', date('Y-m-d H:i:s'));
			$this->db->where('SMGroupDataJobLevelId', $id);
			$this->db->update('SMGroupDataTrusteeJobLevel');

			$this->session->set_flashdata('success', 'Successfully edit data job level.');
		}

		redirect('SystemManager');
	}

	public function prosesTrusteeOrganization()
	{
		$id = $this->input->post('id_organization');
		$group_id = $this->input->post('user_group_id_organization');
		$function = $this->input->post('function_organization');
		$organization = $this->input->post('organization_organization');
		$status = $this->input->post('status_organization');

		if ($function == 'Add') {
			$SMGroupDataTrusteeOrg = [
				'SMGroupId' => $group_id,
				'OrgId' => $organization,
				'Sort' => null,
				'IsActive' => $status == "1" ? true : false,
				'CreateBy' => $this->session->userdata('UserName'),
				'CreateDate' => date('Y-m-d H:i:s'),
				'EditBy' => $this->session->userdata('UserName'),
				'EditDate' => date('Y-m-d H:i:s'),
			];

			$this->db->insert('SMGroupDataTrusteeOrg', $SMGroupDataTrusteeOrg);

			$this->session->set_flashdata('success', 'Successfully add data organization.');
		}else{
			$this->db->set('OrgId', $organization);
			$this->db->set('Sort', null);
			$this->db->set('IsActive', $status == "1" ? true : false);
			$this->db->set('EditBy', $this->session->userdata('UserName'));
			$this->db->set('EditDate', date('Y-m-d H:i:s'));
			$this->db->where('SMGroupDataTrusteeOrgId', $id);
			$this->db->update('SMGroupDataTrusteeOrg');

			$this->session->set_flashdata('success', 'Successfully edit data organization.');
		}

		redirect('SystemManager');
	}

	public function deleteTrusteeLocation()
	{
		$id = $this->input->post('id');

		$SMGroupDataTrusteeLocation = $this->db->get_where('SMGroupDataTrusteeLocation', ['SMGroupDataLocationId' => $id])->row_array();
		if ($SMGroupDataTrusteeLocation) {
			$this->db->delete('SMGroupDataTrusteeLocation', ['SMGroupDataLocationId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteTrusteeJobLevel()
	{
		$id = $this->input->post('id');

		$SMGroupDataTrusteeJobLevel = $this->db->get_where('SMGroupDataTrusteeJobLevel', ['SMGroupDataJobLevelId' => $id])->row_array();
		if ($SMGroupDataTrusteeJobLevel) {
			$this->db->delete('SMGroupDataTrusteeJobLevel', ['SMGroupDataJobLevelId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteTrusteeOrganization()
	{
		$id = $this->input->post('id');

		$SMGroupDataTrusteeOrg = $this->db->get_where('SMGroupDataTrusteeOrg', ['SMGroupDataTrusteeOrgId' => $id])->row_array();
		if ($SMGroupDataTrusteeOrg) {
			$this->db->delete('SMGroupDataTrusteeOrg', ['SMGroupDataTrusteeOrgId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function getODLocation(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getODLocationData($searchTerm);
  
		echo json_encode($response);
	}

	public function getODJobLevel(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getODJobLevelData($searchTerm);
  
		echo json_encode($response);
	}

	public function getODOrganization(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getODOrganizationData($searchTerm);
  
		echo json_encode($response);
	}
}
