<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}
	//fungsi cek session
	function logged_id()
	{
		return $this->session->userdata('user_id');
	}
	function check_login($table, $field1, $field2, $field3)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->group_start();
		$this->db->where($field1);
		$this->db->or_where($field3);
		$this->db->group_end();
		$this->db->where($field2);
		$this->db->limit(1);
		$query = $this->db->get();
		// echo $this->db->last_query();
		// exit();
		if ($query->num_rows() == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}
}
