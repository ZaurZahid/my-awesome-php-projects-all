<?php 

$ch=curl_init();

curl_setopt_array($ch, 
	[
		CURLOPT_URL => 'https://kino-az.com',
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_RETURNTRANSFER => 1
	]);

$veri=curl_exec($ch);
curl_close($ch);
 
 
 preg_match_all('@<div class="menu-home-container">(.*?)</div>@si', $veri, $sonuc);
echo "<pre>";
  foreach ($sonuc[1] as $key) {
	echo $key."<br/>";
}  
?>

