<?php

use PhpParser\Node\Expr\AssignOp\Div;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('M_User');
	}

	private function checkLogin() {
        if ($this->session->userdata('Email')) {
            redirect('user/job-board'); // Redirect ke halaman sign in jika tidak ada sesi login.
        }
    }

	public function index()
	{
		$this->checkLogin();

		$saveJobId = $this->input->get('saveJobId');
		$applyJobId = $this->input->get('applyJobId');

		if(!empty($saveJobId)){
			$this->session->set_userdata('saveJobId', $saveJobId);
		}

		if(!empty($applyJobId)){
			$this->session->set_userdata('applyJobId', $applyJobId);
		}

		$data['CanRegister'] = $this->db->get_where('CanRegister', ['Email' => $this->session->userdata('Email')])->row_array();
		$this->form_validation->set_rules('Email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('Password', 'password', 'trim|required');
		if ($this->form_validation->run() == false) {;
			$this->load->view('Auth/SignIn');
		} else {
			// validasi success
			$this->_login();
		}
	}

	private function _login()
	{
		$Email = $this->input->post('Email');
		$Password = $this->input->post('Password');

		$CanRegister = $this->db->get_where('CanRegister', ['Email' => $Email])->row_array();
		// User Terdaftar
		if ($CanRegister) {
			if ($CanRegister['IsVerifyEmail'] == true) {
				if (password_verify($Password, $CanRegister['Password'])) {
					$data = [
						'Email' => $CanRegister['Email'],
						'role_id' => $CanRegister['role-id']
					];
					$this->session->set_userdata($data);
					redirect('user/job-board');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Invalid Email / Password incorrect!</div>');
					redirect('sign-in');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				This email has not been verified!</div>');
				redirect('sign-in');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered!</div>');
			redirect('sign-in');
		}
	}

	public function SignUp()
	{
		$this->checkLogin();
		
		$saveJobId = $this->input->get('saveJobId');
		$applyJobId = $this->input->get('applyJobId');

		if(!empty($saveJobId)){
			$this->session->set_userdata('saveJobId', $saveJobId);
		}

		if(!empty($applyJobId)){
			$this->session->set_userdata('applyJobId', $applyJobId);
		}

		$this->form_validation->set_rules('FirstName', 'firstname', 'required|trim');
		// $this->form_validation->set_rules('LastName', 'lastname', 'required|trim');
		$this->form_validation->set_rules('Email', 'email', 'required|trim|valid_email');
		$this->form_validation->set_rules('Password', 'password', 'required|trim|min_length[8]|max_length[20]', ['min_length' => 'The password field must be at least 8 characters']);
		if ($this->form_validation->run() == false) {
			$this->load->view('Auth/SignUp');
		} else {
			$CanRegister = $this->db->get_where('CanRegister', ['Email' => $this->input->post('Email', true)])->row_array();
			$SMAccessHd = $this->db->get_where('SMAccessHd', ['Email' => $this->input->post('Email', true)])->row_array();
			// User Terdaftar
			if ($CanRegister || $SMAccessHd) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger m-2" role="alert">
				Sorry, The Email is Already Registered</div>');
				redirect('sign-up');
			}else{
				$Email = $this->input->post('Email', true);
				$data = [
					'FirstName' => htmlspecialchars($this->input->post('FirstName', true)),
					// 'LastName' => htmlspecialchars($this->input->post('LastName', true)),
					'Email' => htmlspecialchars($Email),
					'Password' => password_hash($this->input->post('Password'), PASSWORD_DEFAULT),
					'IsVerifyEmail' => 0,
				];

				$dataProfile = [
					'FirstName' => htmlspecialchars($this->input->post('FirstName', true)),
					// 'LastName' => htmlspecialchars($this->input->post('LastName', true)),
					'Email' => htmlspecialchars($Email),
					'CreateBy' => htmlspecialchars($Email),
					'CreateDate' => date('Y-m-d H:i:s'),
					'UpdateBy' => htmlspecialchars($Email),
					'UpdateDate' => date('Y-m-d H:i:s'),
				];

				// TOKEN KIRIM EMAIL 
				$TokenNumber = base64_encode(random_bytes(32));
				$SMTokenRegister = [
					'Email' => $Email,
					'TokenNumber' => $TokenNumber,
					// 'CreateDate' => time()
				];

				$this->db->insert('CanRegister', $data);
				$canRegisterId = $this->db->insert_id();
				$dataProfile['CanRegisterId'] = $canRegisterId;
				$this->db->insert('SMTokenRegister', $SMTokenRegister);

				$this->db->insert('CanProfile', $dataProfile);

				$this->_sendEmail($TokenNumber, 'verify');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Congratulations! your account has been created. Please activate your account !!!</div>');
				redirect('sign-in');
			}
		}
	}

	private function _sendEmail($TokenNumber, $type)
	{
		$this->load->library('email');
		$this->email->from('imamachmad18@gmail.com', 'HUMAN CAPITAL INFORMATION SYSTEM');
		$this->email->to($this->input->post('Email', true));

		if ($type == 'verify') {
			$this->email->subject('Confirm Your Email Address');
			$this->email->message('Tap the link to confirm your email : ' . base_url() . 'verification?email=' . $this->input->post('Email') . '&TokenNumber=' . urlencode($TokenNumber));
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Tap the link to reset your password : ' . base_url() . 'reset-password?email=' . $this->input->post('Email') . '&TokenNumber=' . urlencode($TokenNumber));
		} else if ($type == 'forgot_admin') {
			$this->email->subject('Reset Password');
			$this->email->message('Tap the link to reset your password : ' . base_url() . 'reset-password-admin?email=' . $this->input->post('Email') . '&TokenNumber=' . urlencode($TokenNumber));
		}
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$Email = $this->input->get('email');
		$TokenNumber = $this->input->get('TokenNumber');
		// Cek Email
		$CanRegister = $this->db->get_where('CanRegister', ['Email' => $Email]);

		if ($CanRegister) {
			$SMTokenRegister = $this->db->get_where('SMTokenRegister', ['TokenNumber' => $TokenNumber]);
			if ($SMTokenRegister) {
				$this->db->set('IsVerifyEmail', 1);
				$this->db->where('Email', $Email);
				$this->db->update('CanRegister');
				$this->db->delete('SMTokenRegister', ['Email' => $Email]);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been activated! Please Login.</div>');
				redirect('sign-in');
				// $this->db->delete('CanRegister', ['Email' => $Email]);
				// $this->db->delete('SMTokenRegister', ['TokenNumber' => $TokenNumber]);
				// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				// Account Activation Failed! Token Expired</div>');
				// redirect('Auth');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Account Activation Failed! Wrong Token</div>');
				redirect('sign-in');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Account Activation Failed! Wrong Email</div>');
			redirect('sign-in');
		}
	}

	// LOGIN UNTUK ADMIN
	public function administrator()
	{
		$this->form_validation->set_rules('Username', 'username', 'trim|required');
		$this->form_validation->set_rules('Password', 'password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('Auth/Administrator');
		} else {
			// validasi success
			$this->_login_admin();
		}
	}
	private function _login_admin()
	{
		$UserName = $this->input->post('Username');
		$Password = $this->input->post('Password');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['UserName' => $UserName])->row_array();
		if (password_verify($Password, $SMAccessHd['Password'])) {
			$data = [
				'UserName' => $SMAccessHd['UserName'],
				'Password' => $SMAccessHd['Password'],
				// $this->session->set_userdata('UserName', TRUE),
			];
			$this->session->set_userdata($data);
			redirect('Dashboard');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Password incorrect!</div>');
			redirect('Auth/Administrator');
		}
	}

	// function cek_login()
	// {
	// 	if (empty($this->session->userdata('UserName'))) {
	// 		redirect('Web_Public');
	// 	}
	// }
	public function logout()
	{
		$this->session->unset_userdata('Email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		You have been logged out !</div>');
		redirect('/');
	}

	public function forgot_password()
	{
		$this->form_validation->set_rules('Email', 'email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->view('user/forgot_password');
		} else {
			$Email = $this->input->post('Email');
			$CanRegister = $this->db->get_where('CanRegister', ['Email' => $Email, 'IsVerifyEmail' => 1])->row_array();

			if ($CanRegister) {
				$TokenNumber = base64_encode(random_bytes(32));
				$SMTokenResetPassword = [
					'Email' => $Email,
					'TokenNumber' => $TokenNumber,
					// 'CreateDate' => time()
				];

				$this->db->insert('SMTokenResetPassword', $SMTokenResetPassword);
				$this->_sendEmail($TokenNumber, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Please check your email to reset your password!</div>');
				redirect('Auth');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered or activated</div>');
				redirect('Auth');
			}
		}
	}

	public function forgot_password_admin()
	{
		$this->form_validation->set_rules('Email', 'email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->view('user/forgot_password_admin');
		} else {
			$Email = $this->input->post('Email');
			$SMAccessHd = $this->db->get_where('SMAccessHd', ['Email' => $Email])->row_array();

			if ($SMAccessHd) {
				$TokenNumber = base64_encode(random_bytes(32));
				$SMTokenResetPassword = [
					'Email' => $Email,
					'TokenNumber' => $TokenNumber,
					// 'CreateDate' => time()
				];

				$this->db->insert('SMTokenResetPassword', $SMTokenResetPassword);
				$this->_sendEmail($TokenNumber, 'forgot_admin');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Please check your email to reset your password!</div>');
				redirect('administrator');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered or activated</div>');
				redirect('administrator');
			}
		}
	}

	public function resetpassword()
	{
		$Email = $this->input->get('email');
		$TokenNumber = $this->input->get('TokenNumber');

		$CanRegister = $this->db->get_where('CanRegister', ['Email' => $Email])->row_array();

		if ($CanRegister) {
			$SMTokenResetPassword = $this->db->get_where('SMTokenResetPassword', ['TokenNumber' => $TokenNumber])->row_array();

			if ($SMTokenResetPassword) {
				$this->session->set_userdata(['reset_email' => $Email]);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Reset failed ! Wrong token.</div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Reset failed ! Wrong email.</div>');
			redirect('Auth');
		}
	}

	public function resetpasswordadmin()
	{
		$Email = $this->input->get('email');
		$TokenNumber = $this->input->get('TokenNumber');

		$SMAccessHd = $this->db->get_where('SMAccessHd', ['Email' => $Email])->row_array();

		if ($SMAccessHd) {
			$SMTokenResetPassword = $this->db->get_where('SMTokenResetPassword', ['TokenNumber' => $TokenNumber])->row_array();

			if ($SMTokenResetPassword) {
				$this->session->set_userdata(['reset_email' => $Email]);
				$this->changePasswordAdmin();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Reset failed ! Wrong token.</div>');
				redirect('administrator');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Reset failed ! Wrong email.</div>');
			redirect('administrator');
		}
	}

	public function changePassword()
	{

		// if (!$this->session->userdata('reset_email')) {
		// 	redirect('Auth');
		// }
		$this->form_validation->set_rules('Password', 'password', 'required|trim|min_length[8]|max_length[20]', ['min_length' => 'The password field must be at least 8 characters']);
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/change-password');
		} else {
			$Password = password_hash($this->input->post('Password'), PASSWORD_DEFAULT);
			$Email = $this->session->userdata('reset_email');

			$this->db->set('Password', $Password);
			$this->db->where('Email', $Email);
			$this->db->update('CanRegister');
			$this->db->delete('SMTokenResetPassword', ['Email' => $Email]);

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Password has been changed! Please login!</div>');
			redirect('Auth');
		}
	}

	public function changePasswordAdmin()
	{

		// if (!$this->session->userdata('reset_email')) {
		// 	redirect('Auth');
		// }
		$this->form_validation->set_rules('Password', 'password', 'required|trim|min_length[8]|max_length[20]', ['min_length' => 'The password field must be at least 8 characters']);
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/change-password-admin');
		} else {
			$Password = password_hash($this->input->post('Password'), PASSWORD_DEFAULT);
			$Email = $this->session->userdata('reset_email');

			$this->db->set('Password', $Password);
			$this->db->where('Email', $Email);
			$this->db->update('SMAccessHd');
			$this->db->delete('SMTokenResetPassword', ['Email' => $Email]);

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Password has been changed! Please login!</div>');
			redirect('administrator');
		}
	}
}
