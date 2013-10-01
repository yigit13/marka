<?php

$urun_xml_url=trim($urun_xml_url);

$a=explode('url=', $urun_xml_url);
$b=explode('%3F' ,  $a[1]);


$urun_url=$b[0];


$html=array("%3A","%2F");
$html2=array(":","/");

$urun_url = str_replace($html,$html2,$urun_url);

?>