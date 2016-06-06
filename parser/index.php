<?php

include "simple_html_dom.php";
/*
$base = 'http://23met.ru/plist/mc';

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html_base = new simple_html_dom();
// Load HTML from a string
$html_base->load($str);

foreach($html_base->find('li') as $element) {
    echo "<pre>";
    print_r($element);
    echo "</pre>";
}
var_dump($html_base);
$html_base->clear();
unset($html_base);
?>
*/

$html=file_get_html("http://23met.ru/plist/mc");
//$html=file_get_html("http://23met.ru/price/armatura_a1/6");
$ret=$html->find("tr");
foreach ($ret as $res){
    echo $res."<br>";
}
//var_dump($ret);