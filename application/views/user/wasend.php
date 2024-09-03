<?php
$dataSending = array();
$dataSending["api_key"] = "7IL7IPW7TOZIMNTG";
$dataSending["number_key"] = "VFRRPSF5nWUbmHhu";
$dataSending["phone_no"] = "6287866780747";
$dataSending["message"] = "<p>*Pellentesque *habitant* morbi tristique senectus et netus et
 malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, 
 ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. 
 Aenean ultricies mi vitae est. Mauris placerat eleifend leo.*</p>";
$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => json_encode($dataSending),
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json'
	),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

// $dataSending = array();
// $dataSending["api_key"] = "7IL7IPW7TOZIMNTG";
// $dataSending["number_key"] = "VFRRPSF5nWUbmHhu";
// $dataSending["phone_no"] = "6287866780747";
// $dataSending["message"] = "coba";
// $dataSending["url"] = "https://icon-library.com/images/url-icon-png/url-icon-png-1.jpg";
// $dataSending["separate_caption"] = "1";
// $curl = curl_init();
// curl_setopt_array($curl, array(
// 	CURLOPT_URL => 'https://api.watzap.id/v1/send_image_url',
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_ENCODING => '',
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 0,
// 	CURLOPT_FOLLOWLOCATION => true,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => 'POST',
// 	CURLOPT_POSTFIELDS => json_encode($dataSending),
// 	CURLOPT_HTTPHEADER => array(
// 		'Content-Type: application/json'
// 	),
// ));
// $response = curl_exec($curl);
// curl_close($curl);
// echo $response;


// $dataSending = array();
// $dataSending["api_key"] = "7IL7IPW7TOZIMNTG";
// $dataSending["number_key"] = "VFRRPSF5nWUbmHhu";
// $dataSending["phone_no"] = "6287866780747";
// $dataSending["url"] = "https://sismik.metrouniv.ac.id/v2/uploaddata/file/44lampiran_1_SURAT_PERMOHONAN2.doc";
// $curl = curl_init();
// curl_setopt_array($curl, array(
// 	CURLOPT_URL => 'https://api.watzap.id/v1/send_file_url',
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_ENCODING => '',
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 0,
// 	CURLOPT_FOLLOWLOCATION => true,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => 'POST',
// 	CURLOPT_POSTFIELDS => json_encode($dataSending),
// 	CURLOPT_HTTPHEADER => array(
// 		'Content-Type: application/json'
// 	),
// ));
// $response = curl_exec($curl);
// curl_close($curl);
// echo $response;
