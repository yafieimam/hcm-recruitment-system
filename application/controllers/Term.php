<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Term extends CI_Controller
{
	public function index()
	{
		$this->load->view('Term');
	}
}
