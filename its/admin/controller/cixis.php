<?php
session_destroy();
header("location:".admin_url('login'));
exit;
?>