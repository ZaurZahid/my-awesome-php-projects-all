<?php
/* $time=time();
$tarix=getdate($time);
print_r($tarix);
 */
//echo date_default_timezone_get();
/* date_default_timezone_set('Asia/Baku');
setlocale(LC_TIME,"az_AZ");
echo strftime('%d %B %Y %A - %X');
 */
/* date_default_timezone_set('Asia/Baku'); 
$tarix=new DateTime();
//echo $tarix->format('Y-m-d H:i:s');
echo $tarix->getTimeStamp(); */
/* $tarix=new DateTime();
$tarix->SetTimezone(new DateTimeZone('Asia/Baku'));
echo $tarix->format('Y-m-d H:i:s'); */

/* date_default_timezone_set('Asia/Baku');
$tarix=getdate();
print_r($tarix); */

/* ========================================== */

date_default_timezone_set('Asia/Baku');
$tarix1=new DateTime('1999-03-01');
$tarix2=new DateTime();
$ferq=$tarix1->diff($tarix2);
echo $ferq->format('%y il %m ay %d gun %h saat %i deqiqe %s saniye');
//eger cavablarda sifir saat falan olarsa str_replace ile duzelde bilerem
?>