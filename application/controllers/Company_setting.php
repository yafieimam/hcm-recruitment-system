<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company_setting extends CI_Controller
{
	public function Index()
	{
		$this->load->view('admin/company_setting');
	}
}
