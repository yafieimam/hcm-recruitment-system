<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobs extends CI_Controller
{
	public function Index()
	{
		$this->load->view('admin/Jobs');
	}
}
