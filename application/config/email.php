<?php defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
	'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
	'smtp_host' => 'smtp.gmail.com',
	'smtp_port' => 465,
	'smtp_user' => 'YOUR_EMAIL',
	'smtp_pass' => 'YOUR_PASSWORD_EMAIL',
	'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
	'mailtype' => 'html',
	'charset' => 'utf-8',
	'crlf'    => "\r\n",
	'newline' => "\r\n",
	'smtp_timeout' => '30', //in seconds
	'wordwrap' => TRUE
);
