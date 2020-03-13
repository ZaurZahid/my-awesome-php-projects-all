<?php
session_destroy();
header("location:". (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : site_url()));
exit;
?>