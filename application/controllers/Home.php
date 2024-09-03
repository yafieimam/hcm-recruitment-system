<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	// function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('auth');
	// 	$this->auth->cek_login();
	// }
	public function index()
	{
		$this->load->view('user/main');
	}
	public function Setting()
	{
		$this->load->view('user/Setting');
	}
}
