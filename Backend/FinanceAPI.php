<?php

function get_market_summary(){

	$curl = curl_init();


	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/market/get-summary?region=US&lang=en",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_SSL_VERIFYHOST => false, 
		CURLOPT_SSL_VERIFYPEER => false, 
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
			"x-rapidapi-key: eab7cb3d4fmsh7218e7d8a32d07dp131570jsn4a3ac98cce01"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$data = $err; 
	} else {
		$data =  $response;
	}

	return $data; 
}





function get_stock(){


	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/get-detail?region=US&lang=en&symbol=NBEV",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_SSL_VERIFYHOST => false, 
		CURLOPT_SSL_VERIFYPEER => false, 
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
			"x-rapidapi-key: eab7cb3d4fmsh7218e7d8a32d07dp131570jsn4a3ac98cce01"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$data = $err; 
	} else {
		$data =  $response;
	}
	return $data; 
		}

		
$_SESSION['market_summary'] = get_market_summary(); 
$_SESSION['stocks'] = get_stock(); 


?>