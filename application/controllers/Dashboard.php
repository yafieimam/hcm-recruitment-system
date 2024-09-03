<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

	public function Index($page = 1)
	{
		$this->checkLogin();

		$this->load->library('pagination');
		$this->load->library('encryption');
		$this->load->model('M_Message');

		$filter = $this->input->get('filter');

		$params = [];

		$textValue = $this->input->get('text');
		$sortValue = $this->input->get('sort');
		$filterValue = $this->input->get('filter');

		if(!empty($textValue)){
			$params['text'] = $textValue;
		}

		if(!empty($sortValue)){
			$params['sort'] = $sortValue;
		}

		if(!empty($filterValue)){
			$params['filter'] = $filterValue;
		}

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Menu'] = $this->M_menu->getMenuAdmin();
		$data['Title'] = 'Dashboard';
		$data['main'] = 'admin/Dashboard';
		$data['script'] = 'Script/dashboard';
		$data['modal'] = 'modal/dashboard';
		$data['MenuAdmin'] = $this->M_menu->get_menu();

		$config['base_url'] = base_url('Dashboard'); // URL dasar untuk pagination
        $config['total_rows'] = $this->m_jobvacancy->countjobdash($data['SMAccessHd']['SMAccessHdId'], $params); // Jumlah total baris data
        $config['per_page'] = 5; // Jumlah data per halaman
		$config['uri_segment'] = 2;

		$this->pagination->initialize($config);
		$offset = ($page - 1) * $config['per_page'];

		$total_pages = ceil($config['total_rows'] / $config['per_page']);
		$page = max(1, min($total_pages, (int)$page));

		if($params){
			$data['JobList'] = $this->m_jobvacancy->getjobdash($config['per_page'], $offset, $data['SMAccessHd']['SMAccessHdId'], $params);
		}else{
			$data['JobList'] = $this->m_jobvacancy->getjobdash($config['per_page'], $offset, $data['SMAccessHd']['SMAccessHdId']);
		}

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

		$data['JobList'] = array_map(function($result) {
			$result->JobVacancyId = $this->secure->encrypt_url($result->JobVacancyId);
			// $encryptData = $this->encryption->encrypt($result->JobVacancyId);
			// $encryptData = $this->my_encrypt($result->JobVacancyId);
			// $result->JobVacancyId = urlencode($encryptData);
			return $result;
		}, $data['JobList']);

		$data['pagination_links'] = $pagination_links;
		$data['jobfunction'] = $this->m_jobvacancy->getjobfunction();
		$data['joblevel'] = $this->m_jobvacancy->getjoblevel();
		$data['EmpType'] = $this->m_jobvacancy->getEmpType();
		$data['Country'] = $this->m_user->get_country();
		$data['Province'] = $this->m_user->get_province();
		$data['City'] = $this->m_user->get_city();
		$data['EducationLevel'] = $this->m_user->get_educationlevel();
		$data['Location'] = $this->m_user->getlocation();

		// var_dump($data['JobList']);
		// exit;

		$this->load->view('admin/custom_dashboard', $data);
	}

	public function redirectToPage($page = 1)
    {
        redirect('Dashboard/' . $page);
    }

	function createPaginationLink($page, $params) {
		$baseUrl = base_url('Dashboard');
		$baseUrl .= '/' . $page;
	
		// Tambahkan parameter ke URL jika ada
		if (!empty($params)) {
			$queryString = http_build_query($params);
			$baseUrl .= '?' . $queryString;
		}
	
		return $baseUrl;
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

		// var_dump($data['SMAccessHdId']);
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
		$employee_request_no = $this->input->post('employee_request_no');

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
					'EmpRequestNo' => ($job_type == 2) ? $employee_request_no : null,
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
				$this->db->set('EmpRequestNo', ($job_type == 2) ? $employee_request_no : null);
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
		// $jobId = urldecode($jobId);
		$jobIdDecrypt = $this->secure->decrypt_url($jobId);
		// $jobIdDecrypt = $this->encryption->decrypt($jobId);
		// $jobIdDecrypt = $this->my_decrypt($jobId);

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Menu'] = $this->M_menu->getMenuAdmin();
		$data['JobVacancy'] = $this->db->get_where('JobVacancy', ['JobVacancyId' => $jobIdDecrypt])->row_array();
		$data['JobVacancy']['JobVacancyId'] = $this->secure->encrypt_url($data['JobVacancy']['JobVacancyId']);
		// $data['JobVacancy']['JobVacancyId'] = $this->encryption->encrypt($data['JobVacancy']['JobVacancyId']);
		// $data['JobVacancy']['JobVacancyId'] = $this->my_encrypt($data['JobVacancy']['JobVacancyId']);
		$data['Category'] = $category;
		$data['JobId'] = $jobIdDecrypt;

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
			// $data['JobDetail'] = array_map(function ($job) {
			// 	$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
			// 	return $job;
			// }, $data['JobDetail']);
		}else if($category == 5){
			$data['JobDetail'] = $this->m_jobvacancy->getjobcalloutevaluation($jobIdDecrypt);
			// $data['JobDetail'] = array_map(function ($job) {
			// 	$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
			// 	return $job;
			// }, $data['JobDetail']);
		}else if($category == 6){
			$data['JobDetail'] = $this->m_jobvacancy->getjoboffering($jobIdDecrypt);
			// $data['JobDetail'] = array_map(function ($job) {
			// 	$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
			// 	return $job;
			// }, $data['JobDetail']);
		}else if($category == 7){
			$data['JobDetail'] = $this->m_jobvacancy->getjobhiring($jobIdDecrypt);
			// $data['JobDetail'] = array_map(function ($job) {
			// 	$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
			// 	return $job;
			// }, $data['JobDetail']);
		}

		// var_dump($data['JobDetail']);
		// exit;

		$this->load->view('admin/custom_job_status', $data);
	}

	public function viewJobStatusFilter()
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

		$jobId = $this->input->post('jobId');
		$category = $this->input->post('category');
		$filter = $this->input->post('filter');
		$encryptJobId = $this->secure->encrypt_url($jobId);
		// $encryptJobId = $this->encryption->encrypt($jobId);
		// $encryptJobId = $this->my_encrypt($jobId);

		$data['SMAccessHd'] = $this->db->get_where('SMAccessHd', ['UserName' => $this->session->userdata('UserName')])->row_array();
		$data['Category'] = $category;
		$data['JobId'] = $encryptJobId;
		// $data['JobId'] = urlencode($encryptJobId);
		$CanProfileIds = [];

		if(!empty($filter)){
			$yearExperience = [];
			$salary = [];
			$jobLevel = [];
			$education = [];
			$yearGraduation = [];
			foreach($filter as $index => $value){
				if($value['id'] == 'filter_keyword'){
					foreach($value['values'] as $index2 => $value2){
						$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByKeyword] ('$value2')")->result_array();
						$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
					}
				}

				if($value['id'] == 'filter_job_title'){
					foreach($value['values'] as $index2 => $value2){
						$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByJobTitles] ('$value2')")->result_array();
						$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
					}
				}

				if($value['id'] == 'filter_job_function'){
					foreach($value['values'] as $index2 => $value2){
						$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByJobFunctions] ('$value2')")->result_array();
						$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
					}
				}

				if($value['id'] == 'filter_from_year_experience' || $value['id'] == 'filter_to_year_experience'){
					$yearExperience[] = $value['values'];
				}

				if($value['id'] == 'filter_from_salary' || $value['id'] == 'filter_to_salary'){
					$salary[] = $value['values'];
				}

				if($value['id'] == 'filter_past_company'){
					foreach($value['values'] as $index2 => $value2){
						$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByPastCurrentCompanies] ('$value2')")->result_array();
						$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
					}
				}

				if($value['id'] == 'filter_from_job_level' || $value['id'] == 'filter_to_job_level'){
					$jobLevel[] = $value['values'];
				}

				if($value['id'] == 'filter_licenses'){
					foreach($value['values'] as $index2 => $value2){
						$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByLicenses] ('$value2')")->result_array();
						$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
					}
				}

				if($value['id'] == 'filter_from_education_attainment' || $value['id'] == 'filter_to_education_attainment'){
					$education[] = $value['values'];
				}

				if($value['id'] == 'filter_from_year_graduation' || $value['id'] == 'filter_to_year_graduation'){
					$yearGraduation[] = $value['values'];
				}

				if($value['id'] == 'filter_field_study'){
					foreach($value['values'] as $index2 => $value2){
						$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByFieldOfStudy] ('$value2')")->result_array();
						$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
					}
				}

				if($value['id'] == 'filter_skill'){
					foreach($value['values'] as $index2 => $value2){
						$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdBySkills] ('$value2')")->result_array();
						$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
					}
				}

				if($value['id'] == 'filter_job_status'){
					foreach($value['values'] as $index2 => $value2){
						$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByJobSeekingStatus] ('$value2')")->result_array();
						$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
					}
				}

				if($value['id'] == 'filter_location'){
					foreach($value['values'] as $index2 => $value2){
						$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByLocation] ('$value2')")->result_array();
						$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
					}
				}
			}

			if(!empty($yearExperience)){
				$yearExperienceString = implode(',', $yearExperience);
				$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByYearOfWorkExperience] ($yearExperienceString)")->result_array();
				$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
			}

			if(!empty($salary)){
				$salaryString = implode(',', $salary);
				$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdBySalaryRange] ($salaryString)")->result_array();
				$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
			}

			if(!empty($jobLevel)){
				$jobLevelString = implode(',', $jobLevel);
				$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByJobLevel] ($jobLevelString)")->result_array();
				$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
			}

			if(!empty($education)){
				$educationString = implode(',', $education);
				$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByEducation] ($educationString)")->result_array();
				$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
			}

			if(!empty($yearGraduation)){
				$yearGraduationString = implode(',', $yearGraduation);
				$result = $this->db->query("SELECT CanProfileId from [Fn_FindCanProfileIdByYearOfGraduation] ($yearGraduationString)")->result_array();
				$CanProfileIds = array_merge($CanProfileIds, array_column($result, 'CanProfileId'));
			}

			$CanProfileIds = array_unique($CanProfileIds);

			// var_dump($CanProfileIds);
			// exit;
		}

		if($category == 1){
			if(!empty($filter)){
				if(!empty($CanProfileIds)){
					$canProfileIdsString = implode(',', $CanProfileIds);
					$data['JobDetail'] = $this->db->query("SELECT * from [Fn_ListInquiry] ($jobId) WHERE CanProfileId IN ($canProfileIdsString)")->result();
				}else{
					$data['JobDetail'] = $this->db->query("SELECT * from [Fn_ListInquiry] ($jobId) WHERE CanProfileId IN (NULL)")->result();
				}
			}else{
				$data['JobDetail'] = $this->db->query("SELECT * from [Fn_ListInquiry] ($jobId)")->result();
			}
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				$job->CanProfileId = $this->secure->encrypt_url($job->CanProfileId);
				// $encryptData = $this->encryption->encrypt($job->CanProfileId);
				// $encryptData = $this->my_encrypt($job->CanProfileId);
				// $job->CanProfileId = urlencode($encryptData);
				return $job;
			}, $data['JobDetail']);
		}else if($category == 2){
			if(!empty($filter)){
				if(!empty($CanProfileIds)){
					$canProfileIdsString = implode(',', $CanProfileIds);
					$data['JobDetail'] = $this->db->query("SELECT * from [Fn_ListApplications] ($jobId) WHERE CanProfileId IN ($canProfileIdsString)")->result();
				}else{
					$data['JobDetail'] = $this->db->query("SELECT * from [Fn_ListApplications] ($jobId) WHERE CanProfileId IN (NULL)")->result();
				}
			}else{
				$data['JobDetail'] = $this->db->query("SELECT * from [Fn_ListApplications] ($jobId)")->result();
			}
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				$job->CanProfileId = $this->secure->encrypt_url($job->CanProfileId);
				// $encryptData = $this->encryption->encrypt($job->CanProfileId);
				// $encryptData = $this->my_encrypt($job->CanProfileId);
				// $job->CanProfileId = urlencode($encryptData);
				return $job;
			}, $data['JobDetail']);
		}else if($category == 3){
			if(!empty($filter)){
				if(!empty($CanProfileIds)){
					$canProfileIdsString = implode(',', $CanProfileIds);
					$data['JobDetail'] = $this->db->query("SELECT * from [Fn_ListShortlist] ($jobId) WHERE CanProfileId IN ($canProfileIdsString)")->result();
				}else{
					$data['JobDetail'] = $this->db->query("SELECT * from [Fn_ListShortlist] ($jobId) WHERE CanProfileId IN (NULL)")->result();
				}
			}else{
				$data['JobDetail'] = $this->db->query("SELECT * from [Fn_ListShortlist] ($jobId)")->result();
			}
			$data['JobDetail'] = array_map(function ($job) {
				$job->CanProfileData = $this->db->get_where('CanProfile', ['CanProfileId' => $job->CanProfileId])->row_array();
				$job->CanProfileId = $this->secure->encrypt_url($job->CanProfileId);
				// $encryptData = $this->encryption->encrypt($job->CanProfileId);
				// $encryptData = $this->my_encrypt($job->CanProfileId);
				// $job->CanProfileId = urlencode($encryptData);
				return $job;
			}, $data['JobDetail']);
		}

		// var_dump($data['JobDetail']);
		// exit;

		echo json_encode($data);
	}

	public function viewCandidateJobStatus($CanProfileId = null, $JobVacancyId = null, $Category = null)
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

		if(!empty($JobVacancyId)){
			$JobVacancyId = $this->secure->decrypt_url($JobVacancyId);
			// $JobVacancyId = $this->encryption->decrypt(urldecode($JobVacancyId));
			// $JobVacancyId = $this->my_decrypt(urldecode($JobVacancyId));
		}

		if(!empty($CanProfileId)){
			$CanProfileId = $this->secure->decrypt_url($CanProfileId);
			// $CanProfileId = $this->my_decrypt(urldecode($CanProfileId));
		}

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

			$data['CanProfile']['CanProfileId'] = $this->secure->encrypt_url($data['CanProfile']['CanProfileId']);
			$data['JobVacancy']['JobVacancyId'] = $this->secure->encrypt_url($data['JobVacancy']['JobVacancyId']);
			// $data['JobVacancy']['JobVacancyId'] = urlencode($this->encryption->encrypt($data['JobVacancy']['JobVacancyId']));
			// $data['JobVacancy']['JobVacancyId'] = urlencode($this->my_encrypt($data['JobVacancy']['JobVacancyId']));
		}else{
			$data['JobVacancy'] = null;
			$data['CanProfile'] = null;
		}

		// var_dump($data['JobVacancy']);
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
		$this->load->library('encryption');

		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  

		$id = $this->input->post('id');
		$job = $this->input->post('job');

		$id = $this->secure->decrypt_url($id);
		$job = $this->secure->decrypt_url($job);
		// $id = $this->encryption->decrypt(urldecode($id));
		// $job = $this->encryption->decrypt(urldecode($job));
		// $id = $this->my_decrypt(urldecode($id));
		// $job = $this->my_decrypt(urldecode($job));

		if($id && $job){
			$data['CanProfile'] = $this->db->get_where('VCanProfile', ['CanProfileId' => $id])->row_array();
			$data['JobVacancy'] = $this->db->get_where('VJobVacancy', ['JobVacancyId' => $job])->row_array();

			$this->load->library('email');
			$this->email->from('imamachmad18@gmail.com', 'HUMAN CAPITAL INFORMATION SYSTEM');
			$this->email->to($data['CanProfile']['Email']);
			// $this->email->to('iniapa1111@gmail.com');
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

	public function prosesShortlist()
	{
		$this->load->library('encryption');

		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  

		$id = $this->input->post('id');
		$job = $this->input->post('job');

		$id = $this->secure->decrypt_url($id);
		$job = $this->secure->decrypt_url($job);
		// $id = $this->encryption->decrypt(urldecode($id));
		// $job = $this->encryption->decrypt(urldecode($job));
		// $id = $this->my_decrypt(urldecode($id));
		// $job = $this->my_decrypt(urldecode($job));

		if($id && $job){
			$CanShortlist = $this->db->get_where('CanShortlist', ['CanProfileId' => $id, 'JobVacancyId' => $job])->result_array();
			$CanApply = $this->db->get_where('CanApply', ['CanProfileId' => $id, 'JobVacancyId' => $job])->result_array();
			if (empty($CanShortlist)) {
				$CanShortlist = [
					'CanProfileId' => $id,
					'JobVacancyId' => $job,
					'CreateBy' => $this->session->userdata('UserName'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('UserName'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanShortlist', $CanShortlist);

				if ($CanApply) {
					$this->db->delete('CanApply', ['CanProfileId' => $id, 'JobVacancyId' => $job]);
				}

				$data['CanProfile'] = $this->db->get_where('VCanProfile', ['CanProfileId' => $id])->row_array();
				$data['JobVacancy'] = $this->db->get_where('VJobVacancy', ['JobVacancyId' => $job])->row_array();

				$this->load->library('email');
				$this->email->from('imamachmad18@gmail.com', 'HUMAN CAPITAL INFORMATION SYSTEM');
				$this->email->to($data['CanProfile']['Email']);
				// $this->email->to('iniapa1111@gmail.com');
				$email_message = $this->load->view('user/email_shortlist', $data, TRUE);

				$this->email->subject('HUMAN CAPITAL JNE - SHORTLIST');
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
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function prosesCallout()
	{
		$this->load->library('encryption');

		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  

		$id = $this->input->post('id');
		$job = $this->input->post('job');

		$id = $this->secure->decrypt_url($id);
		$job = $this->secure->decrypt_url($job);
		// $id = $this->encryption->decrypt(urldecode($id));
		// $job = $this->encryption->decrypt(urldecode($job));
		// $id = $this->my_decrypt(urldecode($id));
		// $job = $this->my_decrypt(urldecode($job));

		if($id && $job){
			$data['CanProfile'] = $this->db->get_where('VCanProfile', ['CanProfileId' => $id])->row_array();
			$data['JobVacancy'] = $this->db->get_where('VJobVacancy', ['JobVacancyId' => $job])->row_array();

			$this->load->library('email');
			$this->email->from('imamachmad18@gmail.com', 'HUMAN CAPITAL INFORMATION SYSTEM');
			$this->email->to($data['CanProfile']['Email']);
			// $this->email->to('iniapa1111@gmail.com');
			$email_message = $this->load->view('user/email_callout', $data, TRUE);

			$this->email->subject('HUMAN CAPITAL JNE - CALL OUT');
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

	public function prosesRejectApplication()
	{
		$this->load->library('encryption');

		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  

		$id = $this->input->post('id');
		$job = $this->input->post('job');

		$id = $this->secure->decrypt_url($id);
		$job = $this->secure->decrypt_url($job);
		// $id = $this->encryption->decrypt(urldecode($id));
		// $job = $this->encryption->decrypt(urldecode($job));
		// $id = $this->my_decrypt(urldecode($id));
		// $job = $this->my_decrypt(urldecode($job));

		if($id && $job){
			$CanApply = $this->db->get_where('CanApply', ['CanProfileId' => $id, 'JobVacancyId' => $job])->result_array();
			
			if ($CanApply) {
				$this->db->delete('CanApply', ['CanProfileId' => $id, 'JobVacancyId' => $job]);

				$data['CanProfile'] = $this->db->get_where('VCanProfile', ['CanProfileId' => $id])->row_array();
				$data['JobVacancy'] = $this->db->get_where('VJobVacancy', ['JobVacancyId' => $job])->row_array();

				$this->load->library('email');
				$this->email->from('imamachmad18@gmail.com', 'HUMAN CAPITAL INFORMATION SYSTEM');
				$this->email->to($data['CanProfile']['Email']);
				// $this->email->to('iniapa1111@gmail.com');
				$email_message = $this->load->view('user/email_reject', $data, TRUE);

				$this->email->subject('HUMAN CAPITAL JNE - REJECT APPLICATION');
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
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function prosesRejectShortlist()
	{
		$this->load->library('encryption');

		$this->encryption->initialize(
			array(
					'cipher' => 'aes-256',
					'mode' => 'ctr',
					'key' => '4lWC8cegO92vhTRbiRy21sh90TwFz6DR' // Same key you used for encryption
				)
			);  

		$id = $this->input->post('id');
		$job = $this->input->post('job');

		$id = $this->secure->decrypt_url($id);
		$job = $this->secure->decrypt_url($job);
		// $id = $this->encryption->decrypt(urldecode($id));
		// $job = $this->encryption->decrypt(urldecode($job));
		// $id = $this->my_decrypt(urldecode($id));
		// $job = $this->my_decrypt(urldecode($job));

		if($id && $job){
			$CanShortlist = $this->db->get_where('CanShortlist', ['CanProfileId' => $id, 'JobVacancyId' => $job])->result_array();
			
			if ($CanShortlist) {
				$this->db->delete('CanShortlist', ['CanProfileId' => $id, 'JobVacancyId' => $job]);

				$data['CanProfile'] = $this->db->get_where('VCanProfile', ['CanProfileId' => $id])->row_array();
				$data['JobVacancy'] = $this->db->get_where('VJobVacancy', ['JobVacancyId' => $job])->row_array();

				$this->load->library('email');
				$this->email->from('imamachmad18@gmail.com', 'HUMAN CAPITAL INFORMATION SYSTEM');
				$this->email->to($data['CanProfile']['Email']);
				// $this->email->to('iniapa1111@gmail.com');
				$email_message = $this->load->view('user/email_reject', $data, TRUE);

				$this->email->subject('HUMAN CAPITAL JNE - REJECT SHORTLIST');
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
		}else{
			echo json_encode(['status' => false]);
		}
	}
}
