<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function callback()
	{
		require_once APPPATH . "config/autoload.php";
		$google_client = new Google_Client();
		$google_client->setClientId('YOUR_CLIENT_ID');
        $google_client->setClientSecret('YOUR_CLIENT_SECRET');
        $google_client->setRedirectUri(base_url() . 'login/callback');
		$google_client->setAccessType('offline');
		$google_client->addScope('email');
		$google_client->addScope('profile');
		$google_client->addScope('https://www.googleapis.com/auth/user.birthday.read');

		if (isset($_GET["code"])) {
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			if (!isset($token["error"])) {
				$google_client->setAccessToken($token['access_token']);
				$this->session->set_userdata('access_token', $token['access_token']);
				$google_service = new Google_Service_Oauth2($google_client);
				$data = $google_service->userinfo->get();
				$current_datetime = date('Y-m-d H:i:s');
				$CanRegister = $this->db->get_where('CanRegister', ['Email' => htmlspecialchars($data->email)])->row_array();
				$SMAccessHd = $this->db->get_where('SMAccessHd', ['Email' => htmlspecialchars($data->email)])->row_array();
				$CanProfile = $this->db->get_where('CanProfile', ['Email' => htmlspecialchars($data->email)])->row_array();

				if ($SMAccessHd) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Email Already Exist!</div>');
					redirect('Auth');
				}

				if (!$CanRegister) {
					$arrData = [
						'FirstName' => htmlspecialchars($data->givenName),
						'LastName' => htmlspecialchars($data->familyName),
						'Email' => htmlspecialchars($data->email),
						'Password' => isset($data->birthday) ? password_hash(date('dmY', strtotime($data->birthday)), PASSWORD_DEFAULT) : password_hash($data->givenName . 'JNE123', PASSWORD_DEFAULT),
						'IsVerifyEmail' => 1,
					];

					$this->db->insert('CanRegister', $arrData);
				} else {
					$this->db->set('FirstName', htmlspecialchars($data->givenName));
					$this->db->set('LastName', htmlspecialchars($data->familyName));
					$this->db->where('Email', htmlspecialchars($data->email));
					$this->db->update('CanRegister');
				}

				if (!$CanProfile) {
					$CanRegisterDetail = $this->db->get_where('CanRegister', ['Email' => htmlspecialchars($data->email)])->row_array();

					$arrDataProfile = [
						'CanRegisterId' => $CanRegisterDetail['CanRegisterId'],
						'FirstName' => htmlspecialchars($data->givenName),
						'LastName' => htmlspecialchars($data->familyName),
						'Email' => htmlspecialchars($data->email),
						'CreateBy' => htmlspecialchars($data->email),
						'CreateDate' => date('Y-m-d H:i:s'),
						'UpdateBy' => htmlspecialchars($data->email),
						'UpdateDate' => date('Y-m-d H:i:s'),
					];

					$this->db->insert('CanProfile', $arrDataProfile);
				} else {
					$CanRegisterDetail = $this->db->get_where('CanRegister', ['Email' => htmlspecialchars($data->email)])->row_array();

					$this->db->set('CanRegisterId', $CanRegisterDetail['CanRegisterId']);
					$this->db->set('FirstName', htmlspecialchars($data->givenName));
					$this->db->set('LastName', htmlspecialchars($data->familyName));
					$this->db->set('UpdateBy', htmlspecialchars($data->email));
					$this->db->set('UpdateDate', date('Y-m-d H:i:s'));
					$this->db->where('Email', htmlspecialchars($data->email));
					$this->db->update('CanProfile');
				}
				
				$user_data = array(
					'Email' => htmlspecialchars($data->email),
					'role_id'  => NULL
				);
				$this->session->set_userdata($user_data);
				redirect('user/job-board');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Something went wrong!</div>');
					redirect('Auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Something went wrong!</div>');
				redirect('Auth');
		}
		// $login_button = '';
		// if (!$this->session->userdata('access_token')) {
		// 	$login_button = '<a href="' . $google_client->createAuthUrl() . '"  class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"><i class="fa fa-google"></i> Sign in with google</a>';
		// 	$data['login_button'] = $login_button;
		// 	$this->load->view('Applicant', $data);
		// } else {
		// 	// uncomentar kode dibawah untuk melihat data session email
		// 	echo json_encode($this->session->userdata('access_token'));
		// 	echo json_encode($this->session->userdata('user_data'));
		// 	redirect('Job_Board');
		// }
	}
	public function login() {
		require_once APPPATH . "config/autoload.php";
        $google_client = new Google_Client();
        $google_client->setClientId('YOUR_CLIENT_ID');
        $google_client->setClientSecret('YOUR_CLIENT_SECRET');
        $google_client->setRedirectUri(base_url() . 'login/callback');
        $google_client->setAccessType('offline'); // For getting refresh token
		$google_client->addScope('email');
		$google_client->addScope('profile');
		$google_client->addScope('https://www.googleapis.com/auth/user.birthday.read');

        $authUrl = $google_client->createAuthUrl();
        redirect($authUrl);
    }
	public function login_proses()
	{
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

		if ($this->form_validation->run() == TRUE) {

			if ($this->m_user->m_cek_mail()->num_rows() == 1) {

				$db = $this->m_user->m_cek_mail()->row();
				if (hash_verified($this->input->post('password'), $db->password)) {

					$data_login = array(
						'is_login' => TRUE,
						'email'  => $db->email,
						'firstname'   => $db->firstname,
						'lastname' => $db->lastname
					);

					$this->session->set_userdata($data_login);
					redirect('Job_Board');
				} else {

					$this->session->set_flashdata('pesan', 'Login gagal: password salah!');
					redirect('Login');
				}
			} else { // jika email tidak terdaftar!

				$this->session->set_flashdata('pesan', 'Login gagal: email salah!');
				redirect('/', 'refresh');
			}
		} else {

			redirect('Job_Board');
		}
	}
	public function administrator()
	{
		$this->load->view('Administrator');
	}

	public function login_administrator()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);
		$cek = $this->m_user->cek_login("SMAccessHd", $where)->num_rows();
		if ($cek > 0) {

			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("Home"));
		} else {
			$this->session->set_flashdata('pesan', 'Login gagal: password salah!');
			redirect('Job_Board', 'refresh');
		}
	}
	public function Logout_user()
	{

		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('firstname');
		$this->session->unset_userdata('lastname');
		$this->session->unset_userdata('email');

		session_destroy();
		//$this->session->set_flashdata('pesan', 'Sign Out Berhasil!');
		redirect('/', 'refresh');
	}
	public function logout()
	{
		$this->session->unset_userdata('access_token');

		$this->session->unset_userdata('user_data');
		echo "Logout berhasil";
	}
}
