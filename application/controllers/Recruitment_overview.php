<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recruitment_overview extends CI_Controller
{
	public function Index()
	{
		$this->load->view('admin/Recruitment_overview');
	}
}
