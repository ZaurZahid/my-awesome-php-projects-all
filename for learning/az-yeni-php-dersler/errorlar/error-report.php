<?php

//E_ALL=>butun hatalar
//E_ERROR=>olumcul hatalar test()
//E_WARNING=>uyari substr()
//E_NOTICE=>uyari $test
//E_PARSE=>yazim hatalari "Zaur" "Aliyev"

error_reporting(E_ALL);
echo $test;
test();

echo ini_get('error_log');

?>