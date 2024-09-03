<?php
class Auth extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	function SignUp($FirstName, $LastName, $Email, $password)
	{
		$data_user = array(
			'FirstName' => $FirstName,
			'LastName' => $LastName,
			'Email' => $Email,
			'password' => password_hash($password, PASSWORD_DEFAULT),
		);
		$this->db->insert('CanRegister', $data_user);
	}

	function login_user($Email, $password)
	{
		$query = $this->db->get_where('CanRegister', array('Email' => $Email));
		if ($query->num_rows() > 0) {
			$data_user = $query->row();
			if (password_verify($password, $data_user->password)) {
				$this->session->set_userdata('Email', $Email);
				$this->session->set_userdata('FirstName', $data_user->FirstName);
				$this->session->set_userdata('LastName', $data_user->LastName);
				$this->session->set_userdata('is_login', TRUE);
				$this->session->set_userdata('');
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function cek_login()
	{
		if (empty($this->session->userdata('is_login'))) {
			redirect('login');
		}
	}
}
