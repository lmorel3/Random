<?php

/***
*
*	Get images' links of a Google Images search result 
*	@return array wich contains all links finded 
*
**/

/** /!\ REQUIRE simple_html_dom CLASS /!\ **/

require_once "simple_html_dom.php";

function getGoogleImages($key){
	$images = array();
	$keyfin= ''. str_replace ( ' ', '+', $key) .'+cd'; 
	$html = new simple_html_dom();
	$html=file_get_html('http://images.google.fr/search?num=10&hl=fr&site=&tbm=isch&source=hp&biw=1366&bih=598&q='. $keyfin .'&gs_l=img.12...0.0.0.2119.0.0.0.0.0.0.0.0..0.0...0.0...1ac.8smtvCO4zUo');
 	foreach($html->find('a') as $element) {
 		if(preg_match('#(?:http://)?(http(s?)://([^\s]*)\.(jpg|gif|png))#', $element->href,  $imagelink)){
   			$images[] = $imagelink[];
    	}
	}

	return $images;
}