<?php

use Google\Service\Integrations\GoogleCloudIntegrationsV1alphaCreateCloudFunctionRequest;
use Google\Service\Transcoder\Input;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_JobVacancy extends CI_Model
{

	public function getvacancy()
	{
		$result = $this->db->query("SELECT JobVacancyId, Position, Qualification, JobDescription, JobLevelId, JobFunctionId, EducationLevelId, LocationId, EmptypeId, TotalCandidateHiring, Dateline,  IsViewSalary, RangeStartSalary, RangeEndSalary, ProvinceId, CityId, IsRelocation, Banner, Video,  Startdate, EndDate, CreateBy, CreateDate, UpdateBy, UpdateDate FROM Fn_JobVacancy(1)");
		return $result;
	}
	public function getvacancyid($jobID)
	{
		$this->db->where('JobVacancyId', $jobID);
		$result = $this->db->get('Fn_JobVacancy(1)');
		// $result = $this->db->query("SELECT JobVacancyId, Position, Qualification, JobDescription, JobLevelId, JobFunctionId, EducationLevelId, LocationId, EmptypeId, TotalCandidateHiring, Dateline,  IsViewSalary, RangeStartSalary, RangeEndSalary, ProvinceId, CityId, IsRelocation, Banner, Video,  Startdate, EndDate, CreateBy, CreateDate, UpdateBy, UpdateDate FROM Fn_JobVacancy(1)");
		return $result->row();
	}
	public function getJobVacancy()
	{
		return $this->db->get('VJobVacancy')->result_array();
	}

	public function getjobfunction()
	{
		return $this->db->get('VF_JobFunction')->result_array();
	}
	public function getjoblevel()
	{
		return $this->db->get('VF_JobLevel')->result_array();
	}
	public function getEmpType()
	{
		return $this->db->get('VF_EmpType')->result_array();
	}
	public function getLocation()
	{
		return $this->db->get('VF_Location')->result_array();
	}
	public function getCountry()
	{
		return $this->db->get('VF_Country')->result_array();
	}
	public function getProvince()
	{
		return $this->db->get('VF_Province')->result_array();
	}
	public function getCity()
	{
		return $this->db->get('VF_City')->result_array();
	}
	public function getEducation()
	{
		return $this->db->get('VF_EducationLevel')->result_array();
	}
	public function getJobVacancylandingpage()
	{
		$this->db->order_by('CreateDate', 'desc');
		$this->db->limit(9);
        return $this->db->get('Fn_JobVacancy(1)')->result();
	}

	public function getlistjob()
	{
		$query = $this->db->query("select * from [Fn_JobVacancy] ('1')");
		return $query->result();
	}

	function data($number, $offset)
	{
		return $query = $this->db->get('JobVacancy', $number, $offset)->result();
	}

	public function jobdetail($JobVacancyId)
	{
		return $this->db->get_where('Fn_JobVacancy(1)', ['Detail' => $JobVacancyId])->row_array();
	}

	function count_data()
	{
		return $this->db->get('JobVacancy')->num_rows();
	}

	public function findjob()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('Position', $keyword);
		$this->db->or_like('LocationName', $keyword);
		$this->db->or_like('EmpTypeName', $keyword);
		$this->db->or_like('CompanyName', $keyword);
		$this->db->or_like('ProvinceName', $keyword);
		return $this->db->get('Fn_JobVacancy(1)')->result();
	}

	public function countjobdash($SMAccessHdId, $params = null)
	{
		if(isset($params['filter'])){
			$this->db->where('IsStatus', $params['filter']);
		}

		if(isset($params['text'])){
			$this->db->like('Position', $params['text']);
			$this->db->or_like('EmpRequestNo', $params['text']);
		}

		if(isset($params['sort'])){
			if($params['sort'] == 1){
				$this->db->order_by('Position', 'asc');
			}else if($params['sort'] == 2){
				$this->db->order_by('LocationDisplay', 'asc');
			}else if($params['sort'] == 3){
				$this->db->order_by('Startdate', 'asc');
			}
		}
		
		return $this->db->get("Fn_ListDashboardJobVacancy($SMAccessHdId)")->num_rows();
	}

	public function getjobdash($limit, $offset, $SMAccessHdId, $params = null)
	{
		if(isset($params['filter'])){
			$this->db->where('IsStatus', $params['filter']);
		}

		if(isset($params['text'])){
			$this->db->like('Position', $params['text']);
			$this->db->or_like('EmpRequestNo', $params['text']);
		}

		if(isset($params['sort'])){
			if($params['sort'] == 1){
				$this->db->order_by('Position', 'asc');
			}else if($params['sort'] == 2){
				$this->db->order_by('LocationDisplay', 'asc');
			}else if($params['sort'] == 3){
				$this->db->order_by('Startdate', 'asc');
			}
		}else{
			$this->db->order_by('CreateDate', 'desc');
		}
		
		$this->db->limit($limit, $offset);
		return $this->db->get("Fn_ListDashboardJobVacancy($SMAccessHdId)")->result();
	}

	public function getjobinquiry($JobVacancyId)
	{
		$query = $this->db->query("SELECT * from [Fn_ListInquiry] ($JobVacancyId)");
		return $query->result();
	}

	public function getjobapplications($JobVacancyId)
	{
		$query = $this->db->query("SELECT * from [Fn_ListApplications] ($JobVacancyId)");
		return $query->result();
	}

	public function getjobshortlist($JobVacancyId)
	{
		$query = $this->db->query("SELECT * from [Fn_ListShortlist] ($JobVacancyId)");
		return $query->result();
	}

	public function getjobcallout($JobVacancyId)
	{
		$query = $this->db->query("SELECT * from [Fn_ListCallOut] ($JobVacancyId)");
		return $query->result();
	}

	public function getjobcalloutevaluation($JobVacancyId)
	{
		$query = $this->db->query("SELECT * from [Fn_ListCallOutEvaluation] ($JobVacancyId)");
		return $query->result();
	}

	public function getjoboffering($JobVacancyId)
	{
		$query = $this->db->query("SELECT * from [Fn_ListOffering] ($JobVacancyId)");
		return $query->result();
	}

	public function getjobhiring($JobVacancyId)
	{
		$query = $this->db->query("SELECT * from [Fn_ListHiring] ($JobVacancyId)");
		return $query->result();
	}

	public function countJobVacancy($params)
    {
        if(isset($params['province'])){
			$this->db->where_in('ProvinceName', $params['province']);
		}
		if(isset($params['city'])){
			$this->db->where_in('CityName', $params['city']);
		}
		if(isset($params['job_level'])){
			$this->db->where_in('JobLevelName', $params['job_level']);
		}
		if(isset($params['employment_type'])){
			$this->db->where_in('EmpTypeName', $params['employment_type']);
		}
		if(isset($params['job_function'])){
			$this->db->where_in('JobFunctionName', $params['job_function']);
		}
		if(isset($params['education'])){
			$this->db->where_in('EducationLevelName', $params['education']);
		}

        if(isset($params['text'])){
			$this->db->where("LOWER(Position) LIKE '%" . strtolower($params['text']) . "%'");
			$this->db->or_where("LOWER(ProvinceName) LIKE '%" . strtolower($params['text']) . "%'");
			$this->db->or_where("LOWER(CityName) LIKE '%" . strtolower($params['text']) . "%'");
		}

        return $this->db->get('Fn_JobVacancy(1)')->num_rows();
    }

	public function getJobVacancyPage($limit, $offset, $params)
    {
		if(isset($params['province'])){
			$this->db->where_in('ProvinceName', $params['province']);
		}
		if(isset($params['city'])){
			$this->db->where_in('CityName', $params['city']);
		}
		if(isset($params['job_level'])){
			$this->db->where_in('JobLevelName', $params['job_level']);
		}
		if(isset($params['employment_type'])){
			$this->db->where_in('EmpTypeName', $params['employment_type']);
		}
		if(isset($params['job_function'])){
			$this->db->where_in('JobFunctionName', $params['job_function']);
		}
		if(isset($params['education'])){
			$this->db->where_in('EducationLevelName', $params['education']);
		}

        if(isset($params['text'])){
			$this->db->where("LOWER(Position) LIKE '%" . strtolower($params['text']) . "%'");
			$this->db->or_where("LOWER(ProvinceName) LIKE '%" . strtolower($params['text']) . "%'");
			$this->db->or_where("LOWER(CityName) LIKE '%" . strtolower($params['text']) . "%'");
		}

        $this->db->limit($limit, $offset);
        return $this->db->get('Fn_JobVacancy(1)')->result();
		// var_dump($this->db->last_query());
		// exit;
    }

	public function countSaveJob($ProfileId)
    {
		$this->db->where("CanProfileId", $ProfileId);
        return $this->db->get('VCanSaveJob')->num_rows();
    }

	public function getSaveJobPage($limit, $offset, $ProfileId)
    {
		$this->db->where("CanProfileId", $ProfileId);
        $this->db->limit($limit, $offset);
        return $this->db->get('VCanSaveJob')->result();
		// var_dump($this->db->last_query());
		// exit;
    }

	public function getProvinceSearchLimit($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('ProvinceName', $keyword);
		}
		return $this->db->get('Province')->result();
	}

	public function getCitySearchLimit($keyword = null, $id = null)
	{
		if(!empty($keyword)){
			$this->db->like('CityName', $keyword);
		}
		if(!empty($id)){
			$this->db->where('ProvinceId', $id);
		}
		return $this->db->get('City')->result();
	}

	public function getJobLevelSearchLimit($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('JobLevelName', $keyword);
		}
		return $this->db->get('JobLevel')->result();
	}

	public function getEmploymentTypeSearchLimit($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('EmpTypeName', $keyword);
		}
		return $this->db->get('EmpType')->result();
	}

	public function getJobFunctionSearchLimit($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('JobFunctionName', $keyword);
		}
		return $this->db->get('JobFunction')->result();
	}

	public function getEmployeeRequestNo($SMAccessHdId, $keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('Name', $keyword);
		}
		return $this->db->get("Fn_FindEmployeeRequest($SMAccessHdId)")->result();
	}

	public function getEducationSearchLimit($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('EducationLevelName', $keyword);
		}
		return $this->db->get('EducationLevel')->result();
	}

	public function getJobFunctionData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('JobFunctionName', $keyword);
		}
		return $this->db->get('JobFunction')->result();
	}

	public function getGroupTypeData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('GroupTypeName', $keyword);
		}
		return $this->db->get('GroupType')->result();
	}

	public function getUserGroupData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('Description', $keyword);
		}
		return $this->db->get('SMGroup')->result();
	}

	public function getEducationMajorData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('EducationMajorName', $keyword);
		}
		return $this->db->get('EducationMajor')->result();
	}

	public function getCertification($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('CertificationName', $keyword);
		}
		return $this->db->get('Certification')->result();
	}

	public function getLocationData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('LocationName', $keyword);
		}
		return $this->db->get('Location')->result();
	}

	public function getCountryData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('CountryName', $keyword);
		}
		return $this->db->get('Country')->result();
	}

	public function getProvinceData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('ProvinceName', $keyword);
		}
		return $this->db->get('Province')->result();
	}

	public function getCityData($keyword = null, $id)
	{
		if(!empty($keyword)){
			$this->db->like('CityName', $keyword);
		}
		$this->db->where('ProvinceId', $id);
		return $this->db->get('City')->result();
	}

	public function getCityAllData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('CityName', $keyword);
		}
		return $this->db->get('City')->result();
	}

	public function getDistrictData($keyword = null, $id)
	{
		if(!empty($keyword)){
			$this->db->like('KecamatanName', $keyword);
		}
		$this->db->where('CityId', $id);
		return $this->db->get('Kecamatan')->result();
	}

	public function getSubdistrictData($keyword = null, $id)
	{
		if(!empty($keyword)){
			$this->db->like('Kelurahanname', $keyword);
		}
		$this->db->where('KecamatanId', $id);
		return $this->db->get('Kelurahan')->result();
	}

	public function getSkillData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('SkillName', $keyword);
		}
		return $this->db->get('Skill')->result();
	}

	public function getGenderData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('GenderName', $keyword);
		}
		return $this->db->get('Gender')->result();
	}

	public function getJobSeekingStatusData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('JobSeekingStatusName', $keyword);
		}
		return $this->db->get('JobSeekingStatus')->result();
	}

	public function getLanguageData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('CountryName', $keyword);
		}
		return $this->db->get('Country')->result();
	}

	public function getDocumentTypeData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('DocumentTypeName', $keyword);
		}
		return $this->db->get('DocumentType')->result();
	}

	public function getVehicleBranchData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('VehicleBranchName', $keyword);
		}
		return $this->db->get('VehicleBranch')->result();
	}

	public function getODLocationData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('Name', $keyword);
		}
		return $this->db->get('VF_LocationTrustee')->result();
	}

	public function getODJobLevelData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('Name', $keyword);
		}
		return $this->db->get('VF_JobLevelTrustee')->result();
	}

	public function getODOrganizationData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('Name', $keyword);
		}
		$this->db->limit(50);
		return $this->db->get('Vf_OrganizationTrustee')->result();
	}
}
