<?php

ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
  $sf=$_SESSION['sfid'];
  
mysql_connect("localhost","root","");

mysql_select_db("asl")or ("Database not found");

$ac=$_GET['act'];

$flash_id=$_GET['id1'];


if($ac==2){
$query="UPDATE flash SET opt=2,help_desk='14co101' WHERE flash_id='$flash_id'";
}
if($ac==3){
$query="UPDATE flash SET opt=3 WHERE flash_id='$flash_id'";
}
if($ac==4){
$query="UPDATE flash SET opt=4 WHERE flash_id='$flash_id'";
}
if($ac==7){
$query="UPDATE flash SET opt=7 WHERE flash_id='$flash_id'";
}
if($ac==5){
$query="UPDATE flash SET opt=5 WHERE flash_id='$flash_id'";
}
if($ac==6){
$query="UPDATE flash SET opt=6 WHERE flash_id='$flash_id'";
}





$result= mysql_query($query);

header("Location: sent.php");
?>