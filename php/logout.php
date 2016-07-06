<?php 
session_start();
session_destroy();

header("Location: re_login.php");
?>