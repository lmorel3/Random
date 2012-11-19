<?php

/**
*	
*	Retrieve Shoutcast server informations and statistics via the cURL librairy 
*	@return string with XML file content
*
**/

function getShoutcastInfos($host, $port, $password){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://".$host.":".$port."/admin.cgi?mode=viewxml");
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, false);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_USERPWD, "admin:".$password);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
	$xml = curl_exec($curl);
	curl_close($curl);

	return $xml;
}

?>