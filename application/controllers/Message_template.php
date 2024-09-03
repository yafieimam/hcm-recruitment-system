<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message_template extends CI_Controller
{
	public function Index()
	{
		$this->load->view('admin/Message_template');
	}
}
