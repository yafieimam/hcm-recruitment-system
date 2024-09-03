<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Data extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	public function input_profile($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function input_formjob($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function input_education($data, $table)
	{
		$this->db->insert($table, $data);
	}
}
