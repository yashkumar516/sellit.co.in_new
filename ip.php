<?php
 $ip = $_SERVER['REMOTE_ADDR'];

 $ch = curl_init();
 curl_setopt($ch,CURLOPT_URL,"https://api.ipgeolocation.io/ipgeo?apiKey=783ea5982f324bbc9561a85159a63869&ip=".$ip);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 $output = curl_exec($ch);
 curl_close($ch);
 echo $output;

?>