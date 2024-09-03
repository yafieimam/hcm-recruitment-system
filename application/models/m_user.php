<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	function logged_id()
	{
		return $this->session->userdata('CanRegisterId');
	}

	public function m_register()
	{

		$data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'password' => get_hash($this->input->post('password'))
		);

		return $this->db->insert('CanRegister', $data);
	}

	public function m_cek_mail()
	{

		return $this->db->get_where('CanRegister', array('email' => $this->input->post('email')));
	}
	public function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function get_country()
	{
		return $this->db->get('Country')->result_array();
	}
	public function get_province()
	{
		return $this->db->get('Province')->result_array();
	}
	public function get_city()
	{
		return $this->db->get('City')->result_array();
	}
	public function get_kecamatan()
	{
		return $this->db->get('Kecamatan')->result_array();
	}
	// public function get_kelurahan()
	// {
	// 	return $this->db->get('Kelurahan')->result_array();
	// }
	public function get_education()
	{
		return $this->db->get('EducationLevel')->result_array();
	}
	public function get_educationlevel()
	{
		return $this->db->get('VF_EducationLevel')->result_array();
	}
	public function get_EduMajor()
	{
		return $this->db->get('EducationMajor')->result_array();
	}
	public function getlocation()
	{
		return $this->db->get('VF_Location')->result_array();
	}
	public function get_CanProfile()
	{
		return $this->db->get('CanProfile')->result_array();
	}
	public function get_month()
	{
		return $this->db->get('Month')->result_array();
	}
	public function get_year()
	{
		return $this->db->get('VTahun')->result_array();
	}
	public function getUserInfo($CanRegisterId)
	{
		$q = $this->db->get_where('CanRegister', array('CanRegisterId' => $CanRegisterId), 1);
		if ($this->db->affected_rows() > 0) {
			$row = $q->row();
			return $row;
		} else {
			error_log('no user found getUserInfo(' . $CanRegisterId . ')');
			return false;
		}
	}

	public function getUserInfoByEmail($Email)
	{
		$q = $this->db->get_where('CanRegister', array('Email' => $Email), 1);
		if ($this->db->affected_rows() > 0) {
			$row = $q->row();
			return $row;
		}
	}

	public function insertToken($CanRegisterId)
	{
		$TokenNumber = substr(sha1(rand()), 0, 30);
		$CreateDate = date('Y-m-d');

		$string = array(
			'TokenNumber' => $TokenNumber,
			'CreateDate' => $CreateDate
		);
		$query = $this->db->insert_string('SMTokenResetPassword', $string);
		$this->db->query($query);
		return $TokenNumber . $CanRegisterId;
	}

	public function isTokenValid($TokenNumber)
	{
		$tkn = substr($TokenNumber, 0, 30);
		$uid = substr($TokenNumber, 30);

		$q = $this->db->get_where('SMTokenResetPassword', array(
			'TokenNumber' => $tkn,
			'TokenNumber.CanRegisterId' => $uid
		), 1);

		if ($this->db->affected_rows() > 0) {
			$row = $q->row();

			$created = $row->created;
			$createdTS = strtotime($created);
			$today = date('Y-m-d');
			$todayTS = strtotime($today);

			if ($createdTS != $todayTS) {
				return false;
			}

			$user_info = $this->getUserInfo($row->CanRegisterId);
			return $user_info;
		} else {
			return false;
		}
	}

	public function updatePassword($post)
	{
		$this->db->where('CanRegisterId', $post['CanRegisterId']);
		$this->db->update('CanRegister', array('password' => $post['password']));
		return true;
	}

	public function getTimezone()
	{
		return $this->db->get('VF_TimeZone')->result_array();
	}

	public function getCompanyIndustryData($keyword = null)
	{
		if(!empty($keyword)){
			$this->db->like('IndustryName', $keyword);
		}
		return $this->db->get('Industry')->result();
	}
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */
