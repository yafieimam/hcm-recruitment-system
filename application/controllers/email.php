<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
	public function send()
	{
		// set konfigurasi email library
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'donyharisandi2000@gmail.com',
			'smtp_pass' => 'zxdkcldewzwyiaut',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1'
		);

		// load library email
		$this->load->library('email', $config);

		// set email yang akan dikirim
		$this->email->set_newline("\r\n");
		$this->email->from('donyharisandi2000@gmail.com', 'Doni');
		$this->email->to('sharingquran038@gmail.com');
		$this->email->subject('Percobaan email');
		$this->email->message('Halo Kak! Ini adalah email percobaan untuk Tutorial CodeIgniter: Mengirim Email via Gmail SMTP menggunakan Email Library CodeIgniter @ qadrlabs.com');

		// proses kirim email
		if (!$this->email->send()) {
			// tampilkan error, ketika gagal kirim email
			show_error($this->email->print_debugger());
		} else {
			// tampilkan keterangan sukses kirim email
			echo 'Success to send email';
		}
	}
}
