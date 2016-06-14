<?php
$inuser =$_POST["user"];
$inpass =$_POST['pass'];
$user="root";
$password="";
$db="temp";
mysql_connect("localhost","root","");

mysql_select_db($db)or ("Database not foyunf");

$query="SELECT * FROM 'user_1' WHERE 'name'='$inuser'";
$querypass="SELECT * FROM 'user_1' WHERE 'pass'='$inpass'";

$result= mysql_query($query);
$resultpass=mysql_query($querypass);

while ($row = mysql_fetch_assoc($result)) {
    echo $row['user'];
    echo $row['password'];
}
$row= mysql_fetch_array($result);
$rowpass=mysql_fetch_array($resultpass);

$serveruser = $row['user'];
$serverpass = $row['pass'];

if($serverpass&&$serveruser)
{
	if(!result)
	{
		die("Username or password is invalid");
	}
	echo "Database Output";
	mysql.close();
	echo $inpass;
	echo $serverpass;
}
if($inpass==$serverpass)
{
	header('Location : home.html');
}
?>