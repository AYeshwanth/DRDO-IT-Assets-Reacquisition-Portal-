<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "asl";

	mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to server'); 
	mysql_select_db($dbname) or die('database selection problem');
?>