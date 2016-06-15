<?php
$inuser =$_POST["user"];
$inpass =$_POST['pass'];

mysql_connect("localhost","root","");

mysql_select_db("test")or ("Database not foyunf");

$query="SELECT * FROM details WHERE first_name='$inuser'";
$querypass="SELECT * FROM details WHERE second_name='$inpass'";

$result= mysql_query($query);
$resultpass=mysql_query($querypass);

$row= mysql_fetch_array($result);
$rowpass=mysql_fetch_array($resultpass);

$serveruser = $row['first_name'];
$serverpass = $row['second_name'];

if($serverpass&&$serveruser)
{
	if(!$result)
	{
		header('Location:../html/login_fail.html');
		//die("Username or password is invalid");
	}
	//echo "Database Output";
	//echo $inpass;
	//echo $serverpass;
}
if($inpass==$serverpass&&$inpass!=''&&$inuser!="")
{//echo 12;
	header('Location:../html/home.html');
}
else
{	
	header('Location:../html/login_fail.html');
}
?>
