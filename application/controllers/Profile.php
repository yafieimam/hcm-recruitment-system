<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('secure');
		$this->load->model('m_jobvacancy');
		$this->load->model('m_user');
		$this->load->model('m_data');
	}

	private function checkLogin() {
        if (!$this->session->userdata('Email')) {
            redirect('sign-in'); // Redirect ke halaman sign in jika tidak ada sesi login.
        }
    }

	public function Index()
	{
		$this->checkLogin();

		$this->load->model('M_Message');

		// $totalProgress = 0;
		// $arrData1 = array(
		// 	'CanProfile', 'SalaryExpectation', 'WorkExperience', 'Education', 'Skill', 
		// 	'Affiliation', 'Seminar', 'Award', 'TestScore', 'Volunteerism', 
		// 	'Reference', 'CoCurricular', 'Project', 'Language', 'Certification',
		// );
		// $arrData2 = array(
		// 	'Summary', 'Resume'
		// );

		$data['CanRegister'] = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$CanProfileId = $data['CanProfile']['CanProfileId'];
		$data['SalaryExpectation'] = $this->db->get_where('VCanSalaryExpectation', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['WorkExperience'] = $this->db->get_where('VCanWorkExperience', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Education'] = $this->db->get_where('VCanEducation', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Skill'] = $this->db->get_where('VCanSkill', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Summary'] = $this->db->get_where('VCanSummary', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Affiliation'] = $this->db->get_where('VCanAffiliation', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Seminar'] = $this->db->get_where('VCanSeminarTraining', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Award'] = $this->db->get_where('VCanAward', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['TestScore'] = $this->db->get_where('VCanTestScore', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Volunteerism'] = $this->db->get_where('VCanVolunteerism', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Reference'] = $this->db->get_where('CanReference', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['CoCurricular'] = $this->db->get_where('VCanCoCurricularActivities', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Project'] = $this->db->get_where('VCanProject', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Language'] = $this->db->get_where('VCanLanguage', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Certification'] = $this->db->get_where('VCanCertification', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Resume'] = $this->db->get_where('VCanResume', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->row_array();
		$data['ToDoList'] = $this->db->get_where('VCategoryProfile', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['ToDoListNumber'] = $this->db->get_where('VCategoryProfileSummary', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Family'] = $this->db->get_where('CanFamily', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['IdentityCard'] = $this->db->get_where('CanIdentityCard', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Vehicle'] = $this->db->get_where('CanVehicle', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['PersonalDocument'] = $this->db->get_where('CanPersonalDocument', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		// $sql = "DECLARE @binaryData VARBINARY(MAX);
		// 		SELECT @binaryData = AttachFile FROM CanPersonalDocument WHERE CanProfileId = ?;
		// 		SELECT CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@binaryData\"))', 'VARCHAR(MAX)') AS Base64";
		// $params = array($data['CanProfile']['CanProfileId']);
		// $data['PersonalDocument'] = $this->db->query($sql, $params);
		$data['Emergency'] = $this->db->get_where('CanEmergency', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['DataCertification'] = $this->db->get('Certification')->result_array();
		$data['Currency'] = $this->db->get('Currency')->result_array();
		$data['Religion'] = $this->db->get('Religion')->result_array();
		$data['MaritalStatus'] = $this->db->get('MaritalStatus')->result_array();
		$data['Blood'] = $this->db->get('Blood')->result_array();
		$data['Gender'] = $this->db->get('Gender')->result_array();
		$data['IdentityCardType'] = $this->db->get('IdentityCardType')->result_array();
		$data['VehicleType'] = $this->db->get('VehicleType')->result_array();
		$data['FamRel'] = $this->db->get('FamRel')->result_array();
		$data['JobLevel'] = $this->db->get('JobLevel')->result_array();
		$data['JobFunction'] = $this->db->get('JobFunction')->result_array();
		$data['EducationLevel'] = $this->db->get('EducationLevel')->result_array();
		$data['EducationMajor'] = $this->db->get('EducationMajor')->result_array();
		$data['EducationLevel'] = $this->db->get('EducationLevel')->result_array();
		$data['Cause'] = $this->db->get('Cause')->result_array();
		$data['Country'] = $this->db->get('Country')->result_array();
		$data['JobSeeking'] = $this->db->get('JobSeekingStatus')->result_array();
		$data['LevelSkill'] = $this->db->get('LevelSkill')->result_array();
		$data['LevelLanguage'] = $this->db->get('LevelLanguage')->result_array();
		$data['CompletedProfile'] = $this->db->get("Fn_CheckCompletedProfile($CanProfileId)")->row_array();
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

		$data['Family'] = array_map(function ($row) {
			$row['FamRelData'] = $this->db->get_where('FamRel', ['FamRelId' => $row['FamRelId']])->row_array();
			$row['FamGenderData'] = $this->db->get_where('Gender', ['GenderId' => $row['FamGenderId']])->row_array();
			return $row;
		}, $data['Family']);

		$data['IdentityCard'] = array_map(function ($row) {
			$sql = "DECLARE @binaryData VARBINARY(MAX);
				SELECT @binaryData = AttachFile FROM CanIdentityCard WHERE CanIdentityCardId = ?;
				SELECT CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@binaryData\"))', 'VARCHAR(MAX)') AS Base64";
			$params = array($row['CanIdentityCardId']);
			$query = $this->db->query($sql, $params);
			$row_query = $query->row();
			$row['AttachFile'] = $row_query->Base64;
			$row['IdentityCardTypeData'] = $this->db->get_where('IdentityCardType', ['IdentityCardTypeId' => $row['IdentityCardTypeId']])->row_array();
			// $row['FamGenderData'] = $this->db->get_where('Gender', ['GenderId' => $row['FamGenderId']])->row_array();
			return $row;
		}, $data['IdentityCard']);

		$data['Vehicle'] = array_map(function ($row) {
			$sql = "DECLARE @binaryData VARBINARY(MAX);
				SELECT @binaryData = AttachFile FROM CanVehicle WHERE CanVehicleId = ?;
				SELECT CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@binaryData\"))', 'VARCHAR(MAX)') AS Base64";
			$params = array($row['CanVehicleId']);
			$query = $this->db->query($sql, $params);
			$row_query = $query->row();
			$row['AttachFile'] = $row_query->Base64;
			$row['VehicleTypeData'] = $this->db->get_where('VehicleType', ['VehicleTypeId' => $row['VehicleTypeId']])->row_array();
			$row['VehicleBranchData'] = $this->db->get_where('VehicleBranch', ['VehicleBranchId' => $row['VehicleBranchId']])->row_array();
			return $row;
		}, $data['Vehicle']);

		$data['PersonalDocument'] = array_map(function ($row) {
			$sql = "DECLARE @binaryData VARBINARY(MAX);
				SELECT @binaryData = AttachFile FROM CanPersonalDocument WHERE CanPersonalDocumentId = ?;
				SELECT CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@binaryData\"))', 'VARCHAR(MAX)') AS Base64";
			$params = array($row['CanPersonalDocumentId']);
			$query = $this->db->query($sql, $params);
			$row_query = $query->row();
			$row['AttachFile'] = $row_query->Base64;
			// $row['AttachFile'] = base64_encode($row['AttachFile']);
			$row['DocumentTypeData'] = $this->db->get_where('DocumentType', ['DocumentTypeId' => $row['DocumentTypeId']])->row_array();
			return $row;
		}, $data['PersonalDocument']);

		$data['Emergency'] = array_map(function ($row) {
			$row['FamRelData'] = $this->db->get_where('FamRel', ['FamRelId' => $row['FamRelId']])->row_array();
			return $row;
		}, $data['Emergency']);

		// foreach ($arrData1 as $value) {
		// 	if (!empty($data[$value])) { // Check if data array is not empty
		// 		$totalProgress += 6; // Increment by 5 if data exists
		// 	}
		// }

		// foreach ($arrData2 as $value) {
		// 	if (!empty($data[$value])) { // Check if data array is not empty
		// 		$totalProgress += 5; // Increment by 5 if data exists
		// 	}
		// }

		// $data['TotalProgress'] = $totalProgress;
		// var_dump($data['Vehicle']);
		// exit;
		
		$this->load->view('user/custom_profile', $data);
	}

	public function uploadPhotoProfile() {
		if (!empty($_FILES['file']['name'])) {
			$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		
			$config['upload_path'] = './assets/template/images/avatar/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 500; // maksimal 2MB
			$config['file_name'] = $data['CanProfile']['CanProfileId'];
			$config['overwrite'] = TRUE;
	
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('file')) {
				$uploadedData = $this->upload->data();

				$this->db->set('PhotoProfile', $uploadedData['file_name']);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $data['CanProfile']['CanProfileId']);
				$this->db->update('CanProfile');
	
				// $publicUrl = base_url('assets/template/images/avatar/' . $uploadedData['file_name']);
	
				echo json_encode(base_url('assets/template/images/avatar/' . $uploadedData['file_name']));
			} else {
				echo json_encode(['error' => $this->upload->display_errors()], 400);
			}
		} else {
			echo json_encode(['error' => 'No file uploaded.'], 400);
		}
	}

	public function downloadProfile() {
		$data['CanRegister'] = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['SalaryExpectation'] = $this->db->get_where('VCanSalaryExpectation', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['WorkExperience'] = $this->db->get_where('VCanWorkExperience', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Education'] = $this->db->get_where('VCanEducation', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Skill'] = $this->db->get_where('VCanSkill', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Summary'] = $this->db->get_where('VCanSummary', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Affiliation'] = $this->db->get_where('VCanAffiliation', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Seminar'] = $this->db->get_where('VCanSeminarTraining', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Award'] = $this->db->get_where('VCanAward', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['TestScore'] = $this->db->get_where('VCanTestScore', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Volunteerism'] = $this->db->get_where('VCanVolunteerism', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Reference'] = $this->db->get_where('CanReference', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['CoCurricular'] = $this->db->get_where('VCanCoCurricularActivities', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Project'] = $this->db->get_where('VCanProject', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Language'] = $this->db->get_where('VCanLanguage', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Certification'] = $this->db->get_where('VCanCertification', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['Resume'] = $this->db->get_where('VCanResume', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();
		$data['CanApply'] = $this->db->get_where('VCanApply', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();

		// var_dump($data['CanApply']);
		// exit;

        $this->load->library('pdf');

		$options = $this->pdf->getOptions(); 
		$options->set(array('isRemoteEnabled' => true));
		$this->pdf->setOptions($options);

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = 'Profile ' . $data['CanProfile']['FirstName'] . '.pdf';
		$this->pdf->load_view('user/download_profile', $data);

        // Load HTML to dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first parameter: output type, second parameter: file path)
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream('Profile' . $data['CanProfile']['FirstName'] . '.pdf', array('Attachment' => false));
    }

	public function downloadProfileCandidate($CanProfileId = null) {
		if(!empty($CanProfileId)){
			$CanProfileId = $this->secure->decrypt_url($CanProfileId);
			// $CanProfileId = $this->my_decrypt(urldecode($CanProfileId));
		}

		// $data['CanRegister'] = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
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
		$data['CanApply'] = $this->db->get_where('VCanApply', ['CanProfileId' => $CanProfileId])->result_array();

		// var_dump($data['CanApply']);
		// exit;

        $this->load->library('pdf');

		$options = $this->pdf->getOptions(); 
		$options->set(array('isRemoteEnabled' => true));
		$this->pdf->setOptions($options);

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = 'Profile ' . $data['CanProfile']['FirstName'] . '.pdf';
		$this->pdf->load_view('user/download_profile', $data);

        // Load HTML to dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first parameter: output type, second parameter: file path)
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream('Profile' . $data['CanProfile']['FirstName'] . '.pdf', array('Attachment' => false));
    }

	public function data_profile()
	{
		$FirstName = $this->input->post('FirstName');
		$LastName = $this->input->post('LastName');
		$CountryId = $this->input->post('CountryId');
		$Address = $this->input->post('Address');
		$RT = $this->input->post('RT');
		$RW = $this->input->post('RW');
		$HouseNo = $this->input->post('HouseNo');
		$ProvinceId = $this->input->post('ProvinceId');
		$CityId = $this->input->post('Cityid');
		$KecamatanId = $this->input->post('KecamatanId');
		$KelurahanId = $this->input->post('KelurahanId');
		$BirthDay = $this->input->post('BirthDay');
		$GenderId = $this->input->post('GenderId');
		$Email = $this->input->post('Email');
		$PhoneNumberCode = $this->input->post('PhoneNumberCode');
		$PhoneNumber = $this->input->post('PhoneNumber');
		$PhotoProfile = $this->input->post('PhotoProfile');

		$data = array(
			'FirstName' => $FirstName,
			'LastName' => $LastName,
			'CountryId' => $CountryId,
			'Address' => $Address,
			'RT' => $RT,
			'RW' => $RW,
			'HouseNo' => $HouseNo,
			'ProvinceId' => $ProvinceId,
			'CityId' => $CityId,
			'KecamatanId' => $KecamatanId,
			'KelurahanId' => $KelurahanId,
			'BirthDay' => $BirthDay,
			'GenderId' => $GenderId,
			'Email' => $Email,
			'PhoneNumberCode' => $PhoneNumberCode,
			'PhoneNumber' => $PhoneNumber,
			'PhotoProfile' => $PhotoProfile
		);
		$this->m_data->input_profile($data, 'CanProfile');
		redirect('Profile');
	}

	public function data_education()
	{
		$CanProfileId = $this->input->post('CanProfileId');
		$EducationLevelId = $this->input->post('EducationLevelId');
		$EducationMajorId = $this->input->post('EducationMajorId');
		$SchoolName = $this->input->post('SchoolName');
		$StartMonth = $this->input->post('StartMonth');
		$StartYear = $this->input->post('StartYear');
		$EndMonth = $this->input->post('EndMonth');
		$EndYear = $this->input->post('EndYear');

		$data = array(
			'CanProfileId' => $CanProfileId,
			'EducationLevelId' => $EducationLevelId,
			'EducationMajorId' => $EducationMajorId,
			'SchoolName' => $SchoolName,
			'StartMonth' => $StartMonth,
			'StartYear' => $StartYear,
			'EndMonth' => $EndMonth,
			'EndYear' => $EndYear
		);
		$this->m_data->input_education($data, 'CanEducation');
		redirect('Profile');
	}

	public function prosesBasicInformation()
	{
		// var_dump($_FILES['add_profile_basic']['name']);
		// exit;
		// $function = $this->input->post('function_salary');
		$first_name = $this->input->post('first_name_basic');
		$country = $this->input->post('country_basic');
		$region = $this->input->post('region_basic');
		$city = $this->input->post('city_basic');
		$district = $this->input->post('district_basic');
		$subdistrict = $this->input->post('subdistrict_basic');
		$street_address = $this->input->post('street_address_basic');
		$rt = $this->input->post('rt_basic');
		$rw = $this->input->post('rw_basic');
		$no = $this->input->post('no_basic');
		$gender = $this->input->post('gender_basic');
		$birthday = $this->input->post('birthday_basic');
		$email = $this->input->post('email_basic');
		$code_mobile = $this->input->post('code_mobile_basic');
		$mobile_number = $this->input->post('mobile_number_basic');
		$job_seeking = $this->input->post('job_seeking_basic');
		$birth_place = $this->input->post('birth_place_basic');
		$marital_status = $this->input->post('marital_status_basic');
		$religion = $this->input->post('religion_basic');
		$blood_type = $this->input->post('blood_type_basic');

		// var_dump($gender);
		// exit;

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {

			if (!empty($_FILES['add_profile_basic']['name'])) {
				$config['upload_path'] = './assets/template/images/avatar/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 500; // maksimal 2MB
				$config['file_name'] = $CanProfile['CanProfileId'];
				$config['overwrite'] = TRUE;
		
				$this->load->library('upload', $config);
		
				if ($this->upload->do_upload('add_profile_basic')) {
					$uploadedData = $this->upload->data();
	
					$this->db->set('FirstName', $first_name);
					$this->db->set('CountryId', $country);
					$this->db->set('Address', $street_address);
					$this->db->set('ProvinceId', $region);
					$this->db->set('CityId', $city);
					$this->db->set('KecamatanId', $district);
					$this->db->set('KelurahanId', $subdistrict);
					$this->db->set('RT', $rt);
					$this->db->set('RW', $rw);
					$this->db->set('HouseNo', $no);
					$this->db->set('GenderId', (int) $gender);
					$this->db->set('BirthDay', date('Y-m-d', strtotime($birthday)));
					$this->db->set('Email', $email);
					$this->db->set('PhoneNumberCode', $code_mobile);
					$this->db->set('PhoneNumber', $mobile_number);
					$this->db->set('JobSeekingStatusId', $job_seeking);
					$this->db->set('PlaceOfBirth', $birth_place);
					$this->db->set('MaritalStatusId', $marital_status);
					$this->db->set('ReligionId', $religion);
					$this->db->set('BloodId', $blood_type);
					$this->db->set('PhotoProfile', $uploadedData['file_name']);
					$this->db->set('UpdateBy', $this->session->userdata('Email'));
					$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
					$this->db->update('CanProfile');

					$this->session->set_flashdata('success', 'Successfully edit basic information.');

					redirect('user/profile');
				} else {
					$this->session->set_flashdata('error', $this->upload->display_errors());

					redirect('user/profile');
				}
			} else {
				$this->db->set('FirstName', $first_name);
				$this->db->set('CountryId', $country);
				$this->db->set('Address', $street_address);
				$this->db->set('ProvinceId', $region);
				$this->db->set('CityId', $city);
				$this->db->set('KecamatanId', $district);
				$this->db->set('KelurahanId', $subdistrict);
				$this->db->set('RT', $rt);
				$this->db->set('RW', $rw);
				$this->db->set('HouseNo', $no);
				$this->db->set('GenderId', (int) $gender);
				$this->db->set('BirthDay', date('Y-m-d', strtotime($birthday)));
				$this->db->set('Email', $email);
				$this->db->set('PhoneNumberCode', $code_mobile);
				$this->db->set('PhoneNumber', $mobile_number);
				$this->db->set('JobSeekingStatusId', $job_seeking);
				$this->db->set('PlaceOfBirth', $birth_place);
				$this->db->set('MaritalStatusId', $marital_status);
				$this->db->set('ReligionId', $religion);
				$this->db->set('BloodId', $blood_type);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanProfile');

				$this->session->set_flashdata('success', 'Successfully edit basic information.');

				redirect('user/profile');
			}
		}else{
			$this->session->set_flashdata('error', 'Failed to edit basic information.');
			redirect('user/profile');
		}
	}

	public function viewBasicInformation()
	{
		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		
		// var_dump($data['CanProfile']);
		// exit;
		
		echo json_encode($data['CanProfile']);
	}

	public function viewSalaryExpectation()
	{
		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['SalaryExpectation'] = $this->db->get_where('VCanSalaryExpectation', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();

		// var_dump($data['SalaryExpectation']);
		// exit;
		
		echo json_encode($data['SalaryExpectation']);
	}

	public function viewWorkExperience()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['WorkExperience'] = $this->db->get_where('VCanWorkExperience', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanWorkExperienceId' => $id])->result_array();

		// var_dump($data['WorkExperience']);
		// exit;
		
		echo json_encode($data['WorkExperience']);
	}

	public function viewEducation()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Education'] = $this->db->get_where('VCanEducation', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanEducationId' => $id])->result_array();

		// var_dump($data['Education']);
		// exit;
		
		echo json_encode($data['Education']);
	}

	public function viewSkill()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Skill'] = $this->db->get_where('VCanSkill', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanSkillId' => $id])->result_array();

		// var_dump($data['Skill']);
		// exit;
		
		echo json_encode($data['Skill']);
	}

	public function viewSummary()
	{
		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Summary'] = $this->db->get_where('VCanSummary', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->row_array();

		// var_dump($data['Summary']);
		// exit;
		
		echo json_encode($data['Summary']);
	}

	public function viewAffiliation()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Affiliation'] = $this->db->get_where('VCanAffiliation', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanAffiliationId' => $id])->result_array();

		// var_dump($data['Affiliation']);
		// exit;
		
		echo json_encode($data['Affiliation']);
	}

	public function viewSeminar()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Seminar'] = $this->db->get_where('VCanSeminarTraining', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanSeminarTrainingId' => $id])->result_array();

		// var_dump($data['Seminar']);
		// exit;
		
		echo json_encode($data['Seminar']);
	}

	public function viewAward()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Award'] = $this->db->get_where('VCanAward', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanAwardId' => $id])->result_array();

		// var_dump($data['Award']);
		// exit;
		
		echo json_encode($data['Award']);
	}

	public function viewTestScore()
	{
		$id = $this->input->post('id');
		
		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['TestScore'] = $this->db->get_where('VCanTestScore', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanTestScoreId' => $id])->result_array();

		// var_dump($data['TestScore']);
		// exit;
		
		echo json_encode($data['TestScore']);
	}

	public function viewVolunteerism()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Volunteerism'] = $this->db->get_where('VCanVolunteerism', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanVolunteerismId' => $id])->result_array();

		// var_dump($data['Volunteerism']);
		// exit;
		
		echo json_encode($data['Volunteerism']);
	}

	public function viewReference()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Reference'] = $this->db->get_where('CanReference', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanReferenceId' => $id])->result_array();

		// var_dump($data['Reference']);
		// exit;
		
		echo json_encode($data['Reference']);
	}

	public function viewCoCurricular()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['CoCurricular'] = $this->db->get_where('VCanCoCurricularActivities', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanCoCurricularActivitiesId' => $id])->result_array();

		// var_dump($data['CoCurricular']);
		// exit;
		
		echo json_encode($data['CoCurricular']);
	}

	public function viewProject()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Project'] = $this->db->get_where('VCanProject', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanProjectId' => $id])->result_array();

		// var_dump($data['Project']);
		// exit;
		
		echo json_encode($data['Project']);
	}

	public function viewLanguage()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Language'] = $this->db->get_where('VCanLanguage', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanLanguageId' => $id])->result_array();

		// var_dump($data['Language']);
		// exit;
		
		echo json_encode($data['Language']);
	}

	public function viewCertification()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Certification'] = $this->db->get_where('VCanCertification', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanCertificationId' => $id])->result_array();

		// var_dump($data['Certification']);
		// exit;
		
		echo json_encode($data['Certification']);
	}

	public function viewResume()
	{
		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Resume'] = $this->db->get_where('VCanResume', ['CanProfileId' => $data['CanProfile']['CanProfileId']])->result_array();

		// var_dump($data['Resume']);
		// exit;
		
		echo json_encode($data['Resume']);
	}

	public function viewFamily()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Family'] = $this->db->get_where('CanFamily', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanFamilyId' => $id])->result_array();

		// var_dump($data['Family']);
		// exit;
		
		echo json_encode($data['Family']);
	}

	public function viewIdentityCard()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['IdentityCard'] = $this->db->get_where('CanIdentityCard', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanIdentityCardId' => $id])->result_array();
		$data['IdentityCard'] = array_map(function ($row) {
			$sql = "DECLARE @binaryData VARBINARY(MAX);
				SELECT @binaryData = AttachFile FROM CanIdentityCard WHERE CanIdentityCardId = ?;
				SELECT CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@binaryData\"))', 'VARCHAR(MAX)') AS Base64";
			$params = array($row['CanIdentityCardId']);
			$query = $this->db->query($sql, $params);
			$row_query = $query->row();
			$row['AttachFile'] = $row_query->Base64;
			$row['IdentityCardTypeData'] = $this->db->get_where('IdentityCardType', ['IdentityCardTypeId' => $row['IdentityCardTypeId']])->row_array();
			// $row['FamGenderData'] = $this->db->get_where('Gender', ['GenderId' => $row['FamGenderId']])->row_array();
			return $row;
		}, $data['IdentityCard']);

		// var_dump($data['IdentityCard']);
		// exit;
		
		echo json_encode($data['IdentityCard']);
	}

	public function viewVehicle()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Vehicle'] = $this->db->get_where('CanVehicle', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanVehicleId' => $id])->result_array();
		// $data['Vehicle']['VehicleBranchData'] = $this->db->get_where('VehicleBranch', ['VehicleBranchId' => $data['Vehicle']['VehicleBranchId']])->row_array();
		$data['Vehicle'] = array_map(function ($row) {
			$sql = "DECLARE @binaryData VARBINARY(MAX);
				SELECT @binaryData = AttachFile FROM CanVehicle WHERE CanVehicleId = ?;
				SELECT CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@binaryData\"))', 'VARCHAR(MAX)') AS Base64";
			$params = array($row['CanVehicleId']);
			$query = $this->db->query($sql, $params);
			$row_query = $query->row();
			$row['AttachFile'] = $row_query->Base64;
			$row['VehicleTypeData'] = $this->db->get_where('VehicleType', ['VehicleTypeId' => $row['VehicleTypeId']])->row_array();
			$row['VehicleBranchData'] = $this->db->get_where('VehicleBranch', ['VehicleBranchId' => $row['VehicleBranchId']])->row_array();
			return $row;
		}, $data['Vehicle']);

		// var_dump($data['Vehicle']);
		// exit;
		
		echo json_encode($data['Vehicle']);
	}

	public function viewPersonalDocument()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['PersonalDocument'] = $this->db->get_where('CanPersonalDocument', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanPersonalDocumentId' => $id])->result_array();
		// $data['PersonalDocument']['DocumentTypeData'] = $this->db->get_where('DocumentType', ['DocumentTypeId' => $data['PersonalDocument']['DocumentTypeId']])->row_array();
		$data['PersonalDocument'] = array_map(function ($row) {
			$sql = "DECLARE @binaryData VARBINARY(MAX);
				SELECT @binaryData = AttachFile FROM CanPersonalDocument WHERE CanPersonalDocumentId = ?;
				SELECT CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@binaryData\"))', 'VARCHAR(MAX)') AS Base64";
			$params = array($row['CanPersonalDocumentId']);
			$query = $this->db->query($sql, $params);
			$row_query = $query->row();
			$row['AttachFile'] = $row_query->Base64;
			// $row['AttachFile'] = base64_encode($row['AttachFile']);
			$row['DocumentTypeData'] = $this->db->get_where('DocumentType', ['DocumentTypeId' => $row['DocumentTypeId']])->row_array();
			return $row;
		}, $data['PersonalDocument']);

		// var_dump($data['PersonalDocument']);
		// exit;
		
		echo json_encode($data['PersonalDocument']);
	}

	public function viewEmergencyContact()
	{
		$id = $this->input->post('id');

		$data['CanProfile'] = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		$data['Emergency'] = $this->db->get_where('CanEmergency', ['CanProfileId' => $data['CanProfile']['CanProfileId'], 'CanEmergencyId' => $id])->result_array();

		// var_dump($data['Emergency']);
		// exit;
		
		echo json_encode($data['Emergency']);
	}

	public function updateEmail()
	{
		// $function = $this->input->post('function_salary');
		$email = $this->input->post('email');

		$CanRegister = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanRegister) {
			$CanRegisterNew = $this->db->get_where('CanRegister', ['Email' => $email])->row_array();
			$SMAccessHdNew = $this->db->get_where('SMAccessHd', ['Email' => $email])->row_array();
			// User Terdaftar
			if ($CanRegisterNew || $SMAccessHdNew) {
				echo json_encode(['status' => false, 'message' => 'Sorry, Email is Already Registered.']);
			}else{
				$this->db->set('Email', $email);
				$this->db->where('Email', $this->session->userdata('Email'));
				$this->db->update('CanRegister');

				$this->db->set('Email', $email);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('Email', $this->session->userdata('Email'));
				$this->db->update('CanProfile');

				$this->session->unset_userdata('Email');

				$this->session->set_userdata(['Email' => $email]);

				echo json_encode(['status' => true, 'message' => 'Successfully change email. Please verify your new email.']);
			}
		}else{
			echo json_encode(['status' => false, 'message' => 'No Data Found!']);
		}
	}

	public function prosesSalaryExpectation()
	{
		// $function = $this->input->post('function_salary');
		$currency = $this->input->post('currency_salary');
		$minimum = $this->input->post('minimum_salary');
		$maximum = $this->input->post('maximum_salary');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$CanSalaryExpectation = $this->db->get_where('CanSalaryExpectation', ['CanProfileId' => $CanProfile['CanProfileId']])->result_array();
			if (empty($CanSalaryExpectation)) {
				$CanSalaryExpectation = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'CurrencyId' => $currency,
					'MinimumSalary' => $minimum,
					'MaximumSalary' => $maximum
				];

				$this->db->insert('CanSalaryExpectation', $CanSalaryExpectation);

				$this->session->set_flashdata('success', 'Successfully add salary expectation.');
			}else{
				$this->db->set('CurrencyId', $currency);
				$this->db->set('MinimumSalary', $minimum);
				$this->db->set('MaximumSalary', $maximum);
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanSalaryExpectation');

				$this->session->set_flashdata('success', 'Successfully edit salary expectation.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit salary expectation.');
			redirect('user/profile');
		}
	}

	public function prosesWorkExperience()
	{
		// $function = $this->input->post('function_salary');
		$job_title = $this->input->post('job_title_work');
		$function = $this->input->post('function_work');
		$company = $this->input->post('company_work');
		$from_month = $this->input->post('from_month_work');
		$from_year = $this->input->post('from_year_work');
		$currently_work = $this->input->post('currently_work_work');
		if(!empty($currently_work)){
			$to_month = null;
			$to_year = null;
		}else{
			$to_month = $this->input->post('to_month_work');
			$to_year = $this->input->post('to_year_work');
		}
		$description = $this->input->post('description_work');
		$job_level = $this->input->post('job_level_work');
		$job_function = $this->input->post('job_function_work');
		$currency = $this->input->post('currency_work');
		$amount = $this->input->post('amount_work');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanWorkExperience = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'JobTitle' => $job_title,
					'Company' => $company,
					'StartMonth' => $from_month,
					'EndMonth' => $to_month,
					'StartYear' => $from_year,
					'EndYear' => $to_year,
					'IsCurrently' => empty($currently_work) ? false : true,
					'Description' => $description,
					'JobLevelId' => $job_level,
					'JobFunctionId' => $job_function,
					'SalaryAmount' => !empty($amount) ? $amount : 0,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanWorkExperience', $CanWorkExperience);

				$this->session->set_flashdata('success', 'Successfully add work experience.');
			}else{
				$this->db->set('JobTitle', $job_title);
				$this->db->set('Company', $company);
				$this->db->set('StartMonth', $from_month);
				$this->db->set('EndMonth', $to_month);
				$this->db->set('StartYear', $from_year);
				$this->db->set('EndYear', $to_year);
				$this->db->set('IsCurrently', empty($currently_work) ? false : true);
				$this->db->set('Description', $description);
				$this->db->set('JobLevelId', $job_level);
				$this->db->set('JobFunctionId', $job_function);
				$this->db->set('SalaryAmount', !empty($amount) ? $amount : 0);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanWorkExperience');

				$this->session->set_flashdata('success', 'Successfully edit work experience.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit work experience.');
			redirect('user/profile');
		}
	}

	public function prosesEducation()
	{
		// $function = $this->input->post('function_salary');
		$education_attainment = $this->input->post('education_attainment_education');
		$function = $this->input->post('function_education');
		$school = $this->input->post('school_education');
		$majoring = $this->input->post('majoring_education');
		$from_month = $this->input->post('from_month_education');
		$from_year = $this->input->post('from_year_education');
		$to_month = $this->input->post('to_month_education');
		$to_year = $this->input->post('to_year_education');
		$description = $this->input->post('description_education');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanEducation = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'EducationLevelId' => $education_attainment,
					'EducationMajorId' => $majoring,
					'SchoolName' => $school,
					'StartMonth' => $from_month,
					'EndMonth' => $to_month,
					'StartYear' => $from_year,
					'EndYear' => $to_year,
					'Description' => $description,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanEducation', $CanEducation);

				$this->session->set_flashdata('success', 'Successfully add education.');
			}else{
				$this->db->set('EducationMajorId', $majoring);
				$this->db->set('EducationLevelId', $education_attainment);
				$this->db->set('SchoolName', $school);
				$this->db->set('StartMonth', $from_month);
				$this->db->set('EndMonth', $to_month);
				$this->db->set('StartYear', $from_year);
				$this->db->set('EndYear', $to_year);
				$this->db->set('Description', $description);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanEducation');

				$this->session->set_flashdata('success', 'Successfully edit education.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit education.');
			redirect('user/profile');
		}
	}

	public function prosesSkill()
	{
		// $function = $this->input->post('function_salary');
		$skill = $this->input->post('skill_skill');
		$level = $this->input->post('level_skill');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$CanSkill = [
				'CanProfileId' => $CanProfile['CanProfileId'],
				'SkillId' => is_numeric($skill) ? $skill : 0,
				'SkillName' => is_numeric($skill) ? null : $skill,
				'LevelSkillId' => $level,
				'CreateBy' => $this->session->userdata('Email'),
				'CreateDate' => date('Y-m-d H:i:s'),
				'UpdateBy' => $this->session->userdata('Email'),
				'UpdateDate' => date('Y-m-d H:i:s'),
			];

			$this->db->insert('CanSkill', $CanSkill);

			$this->session->set_flashdata('success', 'Successfully add skill.');

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit skill.');
			redirect('user/profile');
		}
	}

	public function prosesSummary()
	{
		// $function = $this->input->post('function_salary');
		$summary = $this->input->post('description_summary');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$CanSummary = $this->db->get_where('CanSummary', ['CanProfileId' => $CanProfile['CanProfileId']])->result_array();
			if (empty($CanSummary)) {
				$CanSummary = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'description' => $summary,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanSummary', $CanSummary);

				$this->session->set_flashdata('success', 'Successfully add summary.');
			}else{
				$this->db->set('description', $summary);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanSummary');

				$this->session->set_flashdata('success', 'Successfully edit summary.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit summary.');
			redirect('user/profile');
		}
	}

	public function prosesAffiliation()
	{
		// $function = $this->input->post('function_salary');
		$organization = $this->input->post('organizations_affiliations');
		$function = $this->input->post('function_affiliation');
		$role = $this->input->post('role_affiliations');
		$from_month = $this->input->post('from_month_affiliations');
		$from_year = $this->input->post('from_year_affiliations');
		$present = $this->input->post('present_affiliations');
		if(!empty($present)){
			$to_month = null;
			$to_year = null;
		}else{
			$to_month = $this->input->post('to_month_affiliations');
			$to_year = $this->input->post('to_year_affiliations');
		}
		$description = $this->input->post('description_affiliations');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanAffiliation = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'Organization' => $organization,
					'Position' => $role,
					'StartMonth' => $from_month,
					'EndMonth' => $to_month,
					'StartYear' => $from_year,
					'EndYear' => $to_year,
					'IsPresent' => empty($present) ? false : true,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanAffiliation', $CanAffiliation);

				$this->session->set_flashdata('success', 'Successfully add affiliation.');
			}else{
				$this->db->set('Organization', $organization);
				$this->db->set('Position', $role);
				$this->db->set('StartMonth', $from_month);
				$this->db->set('EndMonth', $to_month);
				$this->db->set('StartYear', $from_year);
				$this->db->set('EndYear', $to_year);
				$this->db->set('IsPresent', empty($present) ? false : true);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanAffiliation');

				$this->session->set_flashdata('success', 'Successfully edit affiliation.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit affiliation.');
			redirect('user/profile');
		}
	}

	public function prosesSeminar()
	{
		// $function = $this->input->post('function_salary');
		$title = $this->input->post('title_seminars');
		$function = $this->input->post('function_seminars');
		$organizer = $this->input->post('organizer_seminars');
		$from_month = $this->input->post('from_month_seminars');
		$from_year = $this->input->post('from_year_seminars');
		$single_date = $this->input->post('single_date_seminars');
		if(!empty($single_date)){
			$to_month = null;
			$to_year = null;
		}else{
			$to_month = $this->input->post('to_month_seminars');
			$to_year = $this->input->post('to_year_seminars');
		}

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanSeminarTraining = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'SeminarTrainingName' => $title,
					'Organizer' => $organizer,
					'StartMonth' => $from_month,
					'EndMonth' => $to_month,
					'StartYear' => $from_year,
					'EndYear' => $to_year,
					'IsSingleDate' => empty($single_date) ? false : true,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanSeminarTraining', $CanSeminarTraining);

				$this->session->set_flashdata('success', 'Successfully add seminar training.');
			}else{
				$this->db->set('SeminarTrainingName', $title);
				$this->db->set('Organizer', $organizer);
				$this->db->set('StartMonth', $from_month);
				$this->db->set('EndMonth', $to_month);
				$this->db->set('StartYear', $from_year);
				$this->db->set('EndYear', $to_year);
				$this->db->set('IsSingleDate', empty($single_date) ? false : true);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanSeminarTraining');

				$this->session->set_flashdata('success', 'Successfully edit seminar training.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit seminar training.');
			redirect('user/profile');
		}
	}

	public function prosesAward()
	{
		// $function = $this->input->post('function_salary');
		$title = $this->input->post('title_awards');
		$function = $this->input->post('function_awards');
		$issuer = $this->input->post('issuer_awards');
		$date_month = $this->input->post('date_month_awards');
		$date_year = $this->input->post('date_year_awards');
		$description = $this->input->post('description_awards');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanAward = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'Title' => $title,
					'Issuer' => $issuer,
					'Month' => $date_month,
					'Year' => $date_year,
					'Description' => $description,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanAward', $CanAward);

				$this->session->set_flashdata('success', 'Successfully add award achievement.');
			}else{
				$this->db->set('Title', $title);
				$this->db->set('Issuer', $issuer);
				$this->db->set('Month', $date_month);
				$this->db->set('Year', $date_year);
				$this->db->set('Description', $description);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanAward');

				$this->session->set_flashdata('success', 'Successfully edit award achievement.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit award achievement.');
			redirect('user/profile');
		}
	}

	public function prosesTestScore()
	{
		// $function = $this->input->post('function_salary');
		$title = $this->input->post('title_test');
		$function = $this->input->post('function_test');
		$result = $this->input->post('result_test');
		$date_month = $this->input->post('date_month_test');
		$date_year = $this->input->post('date_year_test');
		$description = $this->input->post('description_test');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanTestScore = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'Title' => $title,
					'Result' => $result,
					'Month' => $date_month,
					'Year' => $date_year,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanTestScore', $CanTestScore);

				$this->session->set_flashdata('success', 'Successfully add test score.');
			}else{
				$this->db->set('Title', $title);
				$this->db->set('Result', $result);
				$this->db->set('Month', $date_month);
				$this->db->set('Year', $date_year);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanTestScore');

				$this->session->set_flashdata('success', 'Successfully edit test score.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit test score.');
			redirect('user/profile');
		}
	}

	public function prosesVolunteerism()
	{
		// $function = $this->input->post('function_salary');
		$organization = $this->input->post('organization_volunteerism');
		$function = $this->input->post('function_volunteerism');
		$cause = $this->input->post('cause_volunteerism');
		$role = $this->input->post('role_volunteerism');
		$from_month = $this->input->post('from_month_volunteerism');
		$from_year = $this->input->post('from_year_volunteerism');
		$present = $this->input->post('present_volunteerism');
		if(!empty($present)){
			$to_month = null;
			$to_year = null;
		}else{
			$to_month = $this->input->post('to_month_volunteerism');
			$to_year = $this->input->post('to_year_volunteerism');
		}
		$link = $this->input->post('link_volunteerism');
		$description = $this->input->post('description_volunteerism');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanVolunteerism = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'Organization' => $organization,
					'CauseId' => $cause,
					'Position' => $role,
					'StartMonth' => $from_month,
					'EndMonth' => $to_month,
					'StartYear' => $from_year,
					'EndYear' => $to_year,
					'IsCurrent' => empty($present) ? false : true,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanVolunteerism', $CanVolunteerism);

				$this->session->set_flashdata('success', 'Successfully add volunteerism.');
			}else{
				$this->db->set('Organization', $organization);
				$this->db->set('CauseId', $cause);
				$this->db->set('Position', $role);
				$this->db->set('StartMonth', $from_month);
				$this->db->set('EndMonth', $to_month);
				$this->db->set('StartYear', $from_year);
				$this->db->set('EndYear', $to_year);
				$this->db->set('IsCurrent', empty($present) ? false : true);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanVolunteerism');

				$this->session->set_flashdata('success', 'Successfully edit volunteerism.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit volunteerism.');
			redirect('user/profile');
		}
	}

	public function prosesReference()
	{
		// $function = $this->input->post('function_salary');
		$available = $this->input->post('available_references');
		$function = $this->input->post('function_references');
		$name = $this->input->post('name_references');
		$occupation = $this->input->post('occupation_references');
		$company = $this->input->post('company_references');
		$phone = $this->input->post('phone_references');
		$email = $this->input->post('email_references');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanReference = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'Name' => $name,
					'Occupation' => $occupation,
					'Company' => $company,
					'Phone' => $phone,
					'Email' => $email,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanReference', $CanReference);

				$this->session->set_flashdata('success', 'Successfully add reference.');
			}else{
				$this->db->set('Name', $name);
				$this->db->set('Occupation', $occupation);
				$this->db->set('Company', $company);
				$this->db->set('Phone', $phone);
				$this->db->set('Email', $email);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanReference');

				$this->session->set_flashdata('success', 'Successfully edit reference.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit reference.');
			redirect('user/profile');
		}
	}

	public function prosesCoCurricular()
	{
		// $function = $this->input->post('function_salary');
		$organization = $this->input->post('organization_co_curricular');
		$function = $this->input->post('function_co_curricular');
		$role = $this->input->post('role_co_curricular');
		$from_month = $this->input->post('from_month_co_curricular');
		$from_year = $this->input->post('from_year_co_curricular');
		$present = $this->input->post('present_co_curricular');
		if(!empty($present)){
			$to_month = null;
			$to_year = null;
		}else{
			$to_month = $this->input->post('to_month_co_curricular');
			$to_year = $this->input->post('to_year_co_curricular');
		}
		$description = $this->input->post('description_co_curricular');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanCoCurricularActivities = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'Organization' => $organization,
					'Role' => $role,
					'StartMonth' => $from_month,
					'EndMonth' => $to_month,
					'StartYear' => $from_year,
					'EndYear' => $to_year,
					'Description' => $description,
					'IsPresent' => empty($present) ? false : true,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanCoCurricularActivities', $CanCoCurricularActivities);

				$this->session->set_flashdata('success', 'Successfully add co-curricular activities.');
			}else{
				$this->db->set('Organization', $organization);
				$this->db->set('Role', $role);
				$this->db->set('StartMonth', $from_month);
				$this->db->set('EndMonth', $to_month);
				$this->db->set('StartYear', $from_year);
				$this->db->set('EndYear', $to_year);
				$this->db->set('Description', $description);
				$this->db->set('IsPresent', empty($present) ? false : true);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanCoCurricularActivities');

				$this->session->set_flashdata('success', 'Successfully edit co-curricular activities.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit co-curricular activities.');
			redirect('user/profile');
		}
	}

	public function prosesProject()
	{
		// $function = $this->input->post('function_salary');
		$project_name = $this->input->post('project_name_projects');
		$function = $this->input->post('function_projects');
		$role = $this->input->post('role_projects');
		$link = $this->input->post('link_projects');
		$from_month = $this->input->post('from_month_projects');
		$from_year = $this->input->post('from_year_projects');
		$present = $this->input->post('present_projects');
		if(!empty($present)){
			$to_month = null;
			$to_year = null;
		}else{
			$to_month = $this->input->post('to_month_projects');
			$to_year = $this->input->post('to_year_projects');
		}
		$description = $this->input->post('description_projects');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanProject = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'ProjectName' => $project_name,
					'RoleDescription' => $role,
					'Link' => $link,
					'StartMonth' => $from_month,
					'EndMonth' => $to_month,
					'StartYear' => $from_year,
					'EndYear' => $to_year,
					'Description' => $description,
					'IsPresent' => empty($present) ? false : true,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanProject', $CanProject);

				$this->session->set_flashdata('success', 'Successfully add projects.');
			}else{
				$this->db->set('ProjectName', $project_name);
				$this->db->set('RoleDescription', $role);
				$this->db->set('Link', $link);
				$this->db->set('StartMonth', $from_month);
				$this->db->set('EndMonth', $to_month);
				$this->db->set('StartYear', $from_year);
				$this->db->set('EndYear', $to_year);
				$this->db->set('Description', $description);
				$this->db->set('IsPresent', empty($present) ? false : true);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanProject');

				$this->session->set_flashdata('success', '>Successfully edit projects.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit projects.');
			redirect('user/profile');
		}
	}

	public function prosesLanguage()
	{
		// $function = $this->input->post('function_salary');
		$language = $this->input->post('language_language');
		$level = $this->input->post('level_language');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$CanLanguage = [
				'CanProfileId' => $CanProfile['CanProfileId'],
				'CountryId' => $language,
				'LevelLanguageId' => $level,
				'CreateBy' => $this->session->userdata('Email'),
				'CreateDate' => date('Y-m-d H:i:s'),
				'UpdateBy' => $this->session->userdata('Email'),
				'UpdateDate' => date('Y-m-d H:i:s'),
			];

			$this->db->insert('CanLanguage', $CanLanguage);

			$this->session->set_flashdata('success', 'Successfully add language.');

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit language.');
			redirect('user/profile');
		}
	}

	public function prosesCertification()
	{
		// $function = $this->input->post('function_salary');
		$certification_title = $this->input->post('certification_title_certification');
		$function = $this->input->post('function_certification');
		$issuer = $this->input->post('issuer_certification');
		$date_month = $this->input->post('issuance_date_start_certification');
		$date_year = $this->input->post('issuance_date_end_certification');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanCertification = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'CertificationId' => $certification_title,
					'Issuer' => $issuer,
					'IssuanceDateFrom' => $date_month,
					'IssuanceDateEnd' => $date_year,
					'CreateBy' => $this->session->userdata('Email'),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => $this->session->userdata('Email'),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanCertification', $CanCertification);

				$this->session->set_flashdata('success', 'Successfully add certification.');
			}else{
				$this->db->set('CertificationId', $certification_title);
				$this->db->set('Issuer', $issuer);
				$this->db->set('IssuanceDateFrom', $date_month);
				$this->db->set('IssuanceDateEnd', $date_year);
				$this->db->set('UpdateBy', $this->session->userdata('Email'));
				$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanProject');

				$this->session->set_flashdata('success', 'Successfully edit certification.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit certification.');
			redirect('user/profile');
		}
	}

	public function prosesResume() {
		if (!empty($_FILES['file']['name'])) {
			$CanProfile = $this->db->get_where('VCanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		
			$config['upload_path'] = './assets/template/file/resume/';
			$config['allowed_types'] = 'pdf|doc|docx';
			$config['max_size'] = 10240; // maksimal 2MB
			$config['file_name'] = 'Resume_' . $CanProfile['CanProfileId'];
			$config['overwrite'] = TRUE;
	
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('file')) {
				$uploadedData = $this->upload->data();

				$CanResume = $this->db->get_where('CanResume', ['CanProfileId' => $CanProfile['CanProfileId']])->result_array();
				if (empty($CanResume)) {
					$CanResume = [
						'CanProfileId' => $CanProfile['CanProfileId'],
						'AttachFile' => 'CanResume',
						'NameFile' => $uploadedData['file_name'],
						'CreateBy' => $this->session->userdata('Email'),
						'CreateDate' => date('Y-m-d H:i:s'),
						'UpdateBy' => $this->session->userdata('Email'),
						'UpdateDate' => date('Y-m-d H:i:s'),
					];

					$this->db->insert('CanResume', $CanResume);
				}else{
					$this->db->set('NameFile', $uploadedData['file_name']);
					$this->db->set('AttachFile', 'CanResume');
					$this->db->set('UpdateBy', $this->session->userdata('Email'));
					$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
					$this->db->update('CanResume');
				}
	
				echo json_encode(['status' => true]);
			} else {
				echo json_encode(['status' => false]);
			}
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function prosesFamily()
	{
		$function = $this->input->post('function_family');
		$name = $this->input->post('name_family');
		$relation = $this->input->post('relation_family');
		$id_no = $this->input->post('id_no_family');
		$birth_place = $this->input->post('birth_place_family');
		$birth_date = $this->input->post('birth_date_family');
		$gender = $this->input->post('gender_family');
		$blood = $this->input->post('blood_family');
		$address = $this->input->post('address_family');
		$passed_away = $this->input->post('passed_away_family');
		$phone = $this->input->post('phone_family');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanFamily = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'FamRelId' => $relation,
					'FamName' => $name,
					'FamIdCardNo' => $id_no,
					'FamPlaceOfBirth' => $birth_place,
					'FamDateBirth' => $birth_date,
					'FamGenderId' => $gender,
					'FamBloodId' => $blood,
					'FamResAddr' => $address,
					'PassedAway' => empty($passed_away) ? false : true,
					'FamPhone' => $phone,
					// 'CreateBy' => $this->session->userdata('Email'),
					// 'CreateDate' => date('Y-m-d H:i:s'),
					// 'UpdateBy' => $this->session->userdata('Email'),
					// 'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanFamily', $CanFamily);

				$this->session->set_flashdata('success', 'Successfully add family.');
			}else{
				$this->db->set('FamRelId', $relation);
				$this->db->set('FamName', $name);
				$this->db->set('FamIdCardNo', $id_no);
				$this->db->set('FamPlaceOfBirth', $birth_place);
				$this->db->set('FamDateBirth', $birth_date);
				$this->db->set('FamGenderId', $gender);
				$this->db->set('FamBloodId', $blood);
				$this->db->set('FamResAddr', $address);
				$this->db->set('PassedAway', empty($passed_away) ? false : true);
				$this->db->set('FamPhone', $phone);
				// $this->db->set('UpdateBy', $this->session->userdata('Email'));
				// $this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanFamily');

				$this->session->set_flashdata('success', 'Successfully edit family.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit family.');
			redirect('user/profile');
		}
	}

	public function prosesIdentityCard()
	{
		$function = $this->input->post('function_identity');
		$type = $this->input->post('type_identity');
		$no = $this->input->post('no_identity');
		$start_date = $this->input->post('start_date_identity');
		$lifetime = $this->input->post('lifetime_identity');
		if(empty($lifetime)){
			$end_date = $this->input->post('end_date_identity');
		}else{
			$end_date = null;
		}

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				if (!empty($_FILES['file_identity']['name'])) {
					$config['upload_path'] = './assets/template/file/identity_card/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size'] = 2048; // maksimal 2MB
					$config['file_name'] = $type . '_' . $CanProfile['CanProfileId'];
					$config['overwrite'] = TRUE;
			
					$this->load->library('upload', $config);

					$sql = "DECLARE @base64_string VARCHAR(MAX) = ?; 
							INSERT INTO CanIdentityCard (AttachFile, CanProfileId, IdentityCardTypeId, IdentityCardNo, Startdate, Islifetime, Enddate, CreateBy, CreateDate, UpdateBy, UpdateDate)
							VALUES (CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@base64_string\"))', 'VARBINARY(MAX)'), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

					$CanIdentityCard = [
						'CanProfileId' => $CanProfile['CanProfileId'],
						'IdentityCardTypeId' => $type,
						'IdentityCardNo' => $no,
						'Startdate' => $start_date,
						'Islifetime' => empty($lifetime) ? false : true,
						'Enddate' => $end_date,
						'AttachFile' => base64_encode(file_get_contents($_FILES['file_identity']['tmp_name'])),
						'CreateBy' => $this->session->userdata('Email'),
						'CreateDate' => date('Y-m-d H:i:s'),
						'UpdateBy' => $this->session->userdata('Email'),
						'UpdateDate' => date('Y-m-d H:i:s'),
					];

					$this->db->query($sql, array($CanIdentityCard['AttachFile'], $CanIdentityCard['CanProfileId'], $CanIdentityCard['IdentityCardTypeId'], $CanIdentityCard['IdentityCardNo'], $CanIdentityCard['Startdate'], $CanIdentityCard['Islifetime'], $CanIdentityCard['Enddate'], $CanIdentityCard['CreateBy'], $CanIdentityCard['CreateDate'], $CanIdentityCard['UpdateBy'], $CanIdentityCard['UpdateDate']));

					// $this->db->insert('CanIdentityCard', $CanIdentityCard);

					$this->session->set_flashdata('success', 'Successfully add identity card.');
				}else{
					$CanIdentityCard = [
						'CanProfileId' => $CanProfile['CanProfileId'],
						'IdentityCardTypeId' => $type,
						'IdentityCardNo' => $no,
						'Startdate' => $start_date,
						'Islifetime' => empty($lifetime) ? false : true,
						'Enddate' => $end_date,
						'CreateBy' => $this->session->userdata('Email'),
						'CreateDate' => date('Y-m-d H:i:s'),
						'UpdateBy' => $this->session->userdata('Email'),
						'UpdateDate' => date('Y-m-d H:i:s'),
					];

					$this->db->insert('CanIdentityCard', $CanIdentityCard);

					$this->session->set_flashdata('success', 'Successfully add identity card.');
				}
			}else{
				if (!empty($_FILES['file_identity']['name'])) {
					$config['upload_path'] = './assets/template/file/identity_card/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size'] = 2048; // maksimal 2MB
					$config['file_name'] = $type . '_' . $CanProfile['CanProfileId'];
					$config['overwrite'] = TRUE;
			
					$this->load->library('upload', $config);

					$sql = "DECLARE @base64_string VARCHAR(MAX) = ?; 
							UPDATE CanIdentityCard 
							SET AttachFile = CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@base64_string\"))', 'VARBINARY(MAX)'), 
								IdentityCardTypeId = ?, 
								IdentityCardNo = ?,
								Startdate = ?,
								Islifetime = ?,
								Enddate = ?,
								UpdateBy = ?, 
								UpdateDate = ? 
							WHERE CanProfileId = ?";

					$this->db->query($sql, array(base64_encode(file_get_contents($_FILES['file_identity']['tmp_name'])), $type, $no, $start_date, empty($lifetime) ? false : true, $end_date, $this->session->userdata('Email'), date('Y-m-d H:i:s'), $CanProfile['CanProfileId']));

					// $this->db->set('IdentityCardTypeId', $type);
					// $this->db->set('IdentityCardNo', $no);
					// $this->db->set('Startdate', $start_date);
					// $this->db->set('Islifetime', empty($lifetime) ? false : true);
					// $this->db->set('Enddate', $end_date);
					// $this->db->set('AttachFile', base64_encode(file_get_contents($_FILES['file_identity']['tmp_name'])));
					// $this->db->set('UpdateBy', $this->session->userdata('Email'));
					// $this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					// $this->db->where('CanProfileId', $CanProfile['CanProfileId']);
					// $this->db->update('CanIdentityCard');

					$this->session->set_flashdata('success', 'Successfully edit identity card.');
				}else{
					$this->db->set('IdentityCardTypeId', $type);
					$this->db->set('IdentityCardNo', $no);
					$this->db->set('Startdate', $start_date);
					$this->db->set('Islifetime', empty($lifetime) ? false : true);
					$this->db->set('Enddate', $end_date);
					$this->db->set('UpdateBy', $this->session->userdata('Email'));
					$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
					$this->db->update('CanIdentityCard');

					$this->session->set_flashdata('success', 'Successfully edit identity card.');
				}
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit identity card.');
			redirect('user/profile');
		}
	}

	public function prosesVehicle()
	{
		$function = $this->input->post('function_vehicle');
		$type = $this->input->post('type_vehicle');
		$branch = $this->input->post('branch_vehicle');
		$police_no = $this->input->post('police_no_vehicle');
		$end_date = $this->input->post('end_date_vehicle');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				if (!empty($_FILES['file_vehicle']['name'])) {
					$config['upload_path'] = './assets/template/file/vehicle/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size'] = 2048; // maksimal 2MB
					$config['file_name'] = $police_no . '_' . $CanProfile['CanProfileId'];
					$config['overwrite'] = TRUE;
			
					$this->load->library('upload', $config);

					$sql = "DECLARE @base64_string VARCHAR(MAX) = ?; 
							INSERT INTO CanVehicle (AttachFile, CanProfileId, VehicleTypeId, VehicleBranchId, PoliceNo, EndDate, CreateBy, CreateDate, UpdateBy, UpdateDate)
							VALUES (CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@base64_string\"))', 'VARBINARY(MAX)'), ?, ?, ?, ?, ?, ?, ?, ?, ?);";

					$CanVehicle = [
						'CanProfileId' => $CanProfile['CanProfileId'],
						'VehicleTypeId' => $type,
						'VehicleBranchId' => $branch,
						'PoliceNo' => $police_no,
						'EndDate' => $end_date,
						'AttachFile' => base64_encode(file_get_contents($_FILES['file_vehicle']['tmp_name'])),
						'CreateBy' => $this->session->userdata('Email'),
						'CreateDate' => date('Y-m-d H:i:s'),
						'UpdateBy' => $this->session->userdata('Email'),
						'UpdateDate' => date('Y-m-d H:i:s'),
					];

					$this->db->query($sql, array($CanVehicle['AttachFile'], $CanVehicle['CanProfileId'], $CanVehicle['VehicleTypeId'], $CanVehicle['VehicleBranchId'], $CanVehicle['PoliceNo'], $CanVehicle['EndDate'], $CanVehicle['CreateBy'], $CanVehicle['CreateDate'], $CanVehicle['UpdateBy'], $CanVehicle['UpdateDate']));

					// $this->db->insert('CanVehicle', $CanVehicle);

					$this->session->set_flashdata('success', 'Successfully add vehicle.');
				}else{
					$CanVehicle = [
						'CanProfileId' => $CanProfile['CanProfileId'],
						'VehicleTypeId' => $type,
						'VehicleBranchId' => $branch,
						'PoliceNo' => $police_no,
						'EndDate' => $end_date,
						'CreateBy' => $this->session->userdata('Email'),
						'CreateDate' => date('Y-m-d H:i:s'),
						'UpdateBy' => $this->session->userdata('Email'),
						'UpdateDate' => date('Y-m-d H:i:s'),
					];

					$this->db->insert('CanVehicle', $CanVehicle);

					$this->session->set_flashdata('success', 'Successfully add vehicle.');
				}
			}else{
				if (!empty($_FILES['file_vehicle']['name'])) {
					$config['upload_path'] = './assets/template/file/vehicle/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size'] = 10240; // maksimal 2MB
					$config['file_name'] = $police_no . '_' . $CanProfile['CanProfileId'];
					$config['overwrite'] = TRUE;
			
					$this->load->library('upload', $config);

					$sql = "DECLARE @base64_string VARCHAR(MAX) = ?; 
							UPDATE CanIdentityCard 
							SET AttachFile = CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@base64_string\"))', 'VARBINARY(MAX)'), 
								VehicleTypeId = ?, 
								VehicleBranchId = ?,
								PoliceNo = ?,
								EndDate = ?,
								UpdateBy = ?, 
								UpdateDate = ? 
							WHERE CanProfileId = ?";

					$this->db->query($sql, array(base64_encode(file_get_contents($_FILES['file_vehicle']['tmp_name'])), $type, $branch, $police_no, $end_date, $this->session->userdata('Email'), date('Y-m-d H:i:s'), $CanProfile['CanProfileId']));

					// $this->db->set('VehicleTypeId', $type);
					// $this->db->set('VehicleBranchId', $branch);
					// $this->db->set('PoliceNo', $police_no);
					// $this->db->set('EndDate', $end_date);
					// $this->db->set('AttachFile', base64_encode(file_get_contents($_FILES['file_vehicle']['tmp_name'])));
					// $this->db->set('UpdateBy', $this->session->userdata('Email'));
					// $this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					// $this->db->where('CanProfileId', $CanProfile['CanProfileId']);
					// $this->db->update('CanVehicle');

					$this->session->set_flashdata('success', 'Successfully edit vehicle.');
				}else{
					$this->db->set('VehicleTypeId', $type);
					$this->db->set('VehicleBranchId', $branch);
					$this->db->set('PoliceNo', $police_no);
					$this->db->set('EndDate', $end_date);
					$this->db->set('UpdateBy', $this->session->userdata('Email'));
					$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
					$this->db->update('CanVehicle');

					$this->session->set_flashdata('success', 'Successfully edit vehicle.');
				}
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit vehicle.');
			redirect('user/profile');
		}
	}

	public function prosesPersonalDocument()
	{
		$function = $this->input->post('function_personal');
		$type = $this->input->post('type_personal');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				if (!empty($_FILES['file_personal']['name'])) {
					// $file_content = file_get_contents($_FILES['file_personal']['tmp_name']);
					// $base64_content = base64_encode($file_content);
					$config['upload_path'] = './assets/template/file/personal_document/';
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = 2048; // maksimal 2MB
					$config['file_name'] = $type . '_' . $CanProfile['CanProfileId'];
					$config['overwrite'] = TRUE;
			
					$this->load->library('upload', $config);

					// var_dump(file_get_contents($_FILES['file_personal']['tmp_name']));
					// exit;

					$sql = "DECLARE @base64_string VARCHAR(MAX) = ?; 
							INSERT INTO CanPersonalDocument (AttachFile, CanProfileId, DocumentTypeId, CreateBy, CreateDate, UpdateBy, UpdateDate)
							VALUES (CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@base64_string\"))', 'VARBINARY(MAX)'), ?, ?, ?, ?, ?, ?);";
					
					$CanPersonalDocument = [
						'CanProfileId' => $CanProfile['CanProfileId'],
						'DocumentTypeId' => $type,
						'AttachFile' => base64_encode(file_get_contents($_FILES['file_personal']['tmp_name'])),
						'CreateBy' => $this->session->userdata('Email'),
						'CreateDate' => date('Y-m-d H:i:s'),
						'UpdateBy' => $this->session->userdata('Email'),
						'UpdateDate' => date('Y-m-d H:i:s'),
					];

					$this->db->query($sql, array($CanPersonalDocument['AttachFile'], $CanPersonalDocument['CanProfileId'], $CanPersonalDocument['DocumentTypeId'], $CanPersonalDocument['CreateBy'], $CanPersonalDocument['CreateDate'], $CanPersonalDocument['UpdateBy'], $CanPersonalDocument['UpdateDate']));

					// $this->db->insert('CanPersonalDocument', $CanPersonalDocument);

					$this->session->set_flashdata('success', 'Successfully add personal document.');
				}else{
					$CanPersonalDocument = [
						'CanProfileId' => $CanProfile['CanProfileId'],
						'DocumentTypeId' => $type,
						'CreateBy' => $this->session->userdata('Email'),
						'CreateDate' => date('Y-m-d H:i:s'),
						'UpdateBy' => $this->session->userdata('Email'),
						'UpdateDate' => date('Y-m-d H:i:s'),
					];

					$this->db->insert('CanPersonalDocument', $CanPersonalDocument);

					$this->session->set_flashdata('success', 'Successfully add personal document.');
				}
			}else{
				if (!empty($_FILES['file_personal']['name'])) {
					$config['upload_path'] = './assets/template/file/personal_document/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size'] = 10240; // maksimal 2MB
					$config['file_name'] = $type . '_' . $CanProfile['CanProfileId'];
					$config['overwrite'] = TRUE;
			
					$this->load->library('upload', $config);

					$sql = "DECLARE @base64_string VARCHAR(MAX) = ?; 
							UPDATE CanPersonalDocument 
							SET AttachFile = CAST('' AS XML).value('xs:base64Binary(sql:variable(\"@base64_string\"))', 'VARBINARY(MAX)'), 
								DocumentTypeId = ?, 
								UpdateBy = ?, 
								UpdateDate = ? 
							WHERE CanProfileId = ?";

					$this->db->query($sql, array(base64_encode(file_get_contents($_FILES['file_personal']['tmp_name'])), $type, $this->session->userdata('Email'), date('Y-m-d H:i:s'), $CanProfile['CanProfileId']));

					// $this->db->set('DocumentTypeId', $type);
					// $this->db->set('AttachFile', file_get_contents($_FILES['file_personal']['tmp_name']));
					// $this->db->set('UpdateBy', $this->session->userdata('Email'));
					// $this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					// $this->db->where('CanProfileId', $CanProfile['CanProfileId']);
					// $this->db->update('CanPersonalDocument');

					$this->session->set_flashdata('success', 'Successfully edit personal document.');
				}else{
					$this->db->set('DocumentTypeId', $type);
					$this->db->set('UpdateBy', $this->session->userdata('Email'));
					$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
					$this->db->update('CanPersonalDocument');

					$this->session->set_flashdata('success', 'Successfully edit personal document.');
				}
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit personal document.');
			redirect('user/profile');
		}
	}

	public function prosesEmergencyContact()
	{
		$function = $this->input->post('function_emergency');
		$relation = $this->input->post('relation_emergency');
		$name = $this->input->post('name_emergency');
		$address = $this->input->post('address_emergency');
		$phone = $this->input->post('phone_emergency');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			if ($function == 'Add') {
				$CanEmergency = [
					'CanProfileId' => $CanProfile['CanProfileId'],
					'FamRelId' => $relation,
					'EcontactName' => $name,
					'EcontactAddr' => $address,
					'EcontactPhone' => $phone,
					// 'CreateBy' => $this->session->userdata('Email'),
					// 'CreateDate' => date('Y-m-d H:i:s'),
					// 'UpdateBy' => $this->session->userdata('Email'),
					// 'UpdateDate' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('CanEmergency', $CanEmergency);

				$this->session->set_flashdata('success', 'Successfully add emergency contact.');
			}else{
				$this->db->set('FamRelId', $relation);
				$this->db->set('EcontactName', $name);
				$this->db->set('EcontactAddr', $address);
				$this->db->set('EcontactPhone', $phone);
				// $this->db->set('UpdateBy', $this->session->userdata('Email'));
				// $this->db->set('UpdateDate', date('Y-m-d H:i:s'));
				$this->db->where('CanProfileId', $CanProfile['CanProfileId']);
				$this->db->update('CanEmergency');

				$this->session->set_flashdata('success', 'Successfully edit emergency contact.');
			}

			redirect('user/profile');
		}else{
			$this->session->set_flashdata('error', 'Failed to add/edit emergency contact.');
			redirect('user/profile');
		}
	}

	public function deleteSalaryExpectation()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanSalaryExpectation', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanSalaryExpectitionId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteWorkExperience()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanWorkExperience', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanWorkExperienceId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteEducation()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanEducation', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanEducationId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteSkill()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanSkill', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanSkillId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteSummary()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanSummary', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanSummaryId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteAffiliation()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanAffiliation', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanAffiliationId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteSeminar()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanSeminarTraining', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanSeminarTrainingId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteAward()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanAward', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanAwardId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteTestScore()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanTestScore', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanTestScoreId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteVolunteerism()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanVolunteerism', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanVolunteerismId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteReference()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanReference', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanReferenceId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteCoCurricular()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanCoCurricularActivities', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanCoCurricularActivitiesId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteProject()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanProject', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanProjectId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteLanguage()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanLanguage', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanLanguageId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteCertification()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanCertification', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanCertificationId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteResume()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanResume', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanResumeId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteFamily()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanFamily', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanFamilyId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteIdentityCard()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanIdentityCard', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanIdentityCardId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteVehicle()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanVehicle', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanVehicleId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deletePersonalDocument()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanPersonalDocument', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanPersonalDocumentId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function deleteEmergencyContact()
	{
		$id = $this->input->post('id');

		$CanProfile = $this->db->get_where('CanProfile', ['Email' => $this->session->userdata('Email')])->row_array();
		if ($CanProfile) {
			$this->db->delete('CanEmergency', ['CanProfileId' => $CanProfile['CanProfileId'], 'CanEmergencyId' => $id]);

			echo json_encode(['status' => true]);
		}else{
			echo json_encode(['status' => false]);
		}
	}

	public function getEducationMajor(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getEducationMajorData($searchTerm);
  
		echo json_encode($response);
	}

	public function getCertification(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getCertification($searchTerm);
  
		echo json_encode($response);
	}

	public function getLocation(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getLocationData($searchTerm);
  
		echo json_encode($response);
	}

	public function getCountry(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getCountryData($searchTerm);
  
		echo json_encode($response);
	}

	public function getProvince(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getProvinceData($searchTerm);
  
		echo json_encode($response);
	}

	public function getCity(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');
		$id = $this->input->post('id');

		$response = $this->M_JobVacancy->getCityData($searchTerm, $id);
  
		echo json_encode($response);
	}

	public function getCityAll(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getCityAllData($searchTerm);
  
		echo json_encode($response);
	}

	public function getDistrict(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');
		$id = $this->input->post('id');

		$response = $this->M_JobVacancy->getDistrictData($searchTerm, $id);
  
		echo json_encode($response);
	}

	public function getSubdistrict(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');
		$id = $this->input->post('id');

		$response = $this->M_JobVacancy->getSubdistrictData($searchTerm, $id);
  
		echo json_encode($response);
	}

	public function getSkill(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getSkillData($searchTerm);
  
		echo json_encode($response);
	}

	public function getGender(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getGenderData($searchTerm);
  
		echo json_encode($response);
	}

	public function getJobSeekingStatus(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getJobSeekingStatusData($searchTerm);
  
		echo json_encode($response);
	}

	public function getLanguage(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getLanguageData($searchTerm);
  
		echo json_encode($response);
	}

	public function getDocumentType(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getDocumentTypeData($searchTerm);
  
		echo json_encode($response);
	}

	public function getVehicleBranch(){
		$this->load->model('M_JobVacancy');

		$searchTerm = $this->input->post('searchTerm');

		$response = $this->M_JobVacancy->getVehicleBranchData($searchTerm);
  
		echo json_encode($response);
	}
}


