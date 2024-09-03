<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wasend extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function Index()
	{
		$this->load->view('user/wasend');
	}
}
