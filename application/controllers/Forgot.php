<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgot extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('m_user');
	}
	public function index()
	{

		$this->form_validation->set_rules('Email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Reset Password';
			$this->load->view('user/forgot_password', $data);
		} else {
			$Email = $this->input->post('Email');
			$clean = $this->security->xss_clean($Email);
			$userInfo = $this->m_user->getUserInfoByEmail($clean);

			// if (!$userInfo) {
			// 	$this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');
			// 	redirect(site_url('Auth'), 'refresh');
			// }

			//build token   
			$TokenNumber = $this->m_user->insertToken($userInfo['CanRegisterId']);
			$qstring = $this->base64url_encode($TokenNumber);
			$url = site_url() . '/forgot/reset_password/SMTokenResetPassword/' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>';
			$message = '';
			$message .= '<strong>Hai, anda menerima email ini karena ada permintaan untuk memperbaharui  
                 password anda.</strong><br>';
			$message .= '<strong>Silakan klik link ini:</strong> ' . $link;
			echo $message; //send this through mail  
			exit;
		}
	}

	// public function reset_password()
	// {
	// 	$TokenNumber = $this->base64url_decode($this->uri->segment(4));
	// 	$cleanToken = $this->security->xss_clean($TokenNumber);
	// 	$user_info = $this->m_user->isTokenValid($cleanToken);          

	// 	if (!$user_info) {
	// 		$this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');
	// 		redirect(site_url('Auth'), 'refresh');
	// 	}

	// 	$data = array(
	// 		'title' => 'Reset Password',
	// 		'FirstName' => $user_info->FirstName,
	// 		'Email' => $user_info->Email,
	// 		'SMTokenResetPassword' => $this->base64url_encode($TokenNumber)
	// 	);

	// 	$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
	// 	$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('user/reset_password', $data);
	// 	} else {
	// 		$post = $this->input->post(NULL, TRUE);
	// 		$cleanPost = $this->security->xss_clean($post);
	// 		$hashed = md5($cleanPost['password']);
	// 		$cleanPost['password'] = $hashed;
	// 		$cleanPost['CanRegisterId'] = $user_info->CanRegisterId;
	// 		// unset($cleanPost['passconf']);
	// 		if (!$this->m_user->updatePassword($cleanPost)) {
	// 			$this->session->set_flashdata('sukses', 'Update password gagal.');
	// 		} else {
	// 			$this->session->set_flashdata('sukses', 'Password anda sudah diperbaharui. Silakan login.');
	// 		}
	// 		redirect(site_url('Auth'), 'refresh');
	// 	}
	// }
	public function reset_password()
	{
	}
	public function base64url_encode($data)
	{
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}
	public function base64url_decode($data)
	{
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}
}
