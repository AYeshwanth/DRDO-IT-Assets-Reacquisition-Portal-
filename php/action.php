<?php

ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
  $sf=$_SESSION['sfid'];
  

mysql_connect("localhost","root","");

mysql_select_db("asl")or ("Database not found");

$ac=$_GET['act'];

$pc_id=$_GET['id1'];

	

if($ac==2){ //Issue approved by boss and sent to help desk
$query="UPDATE pc SET opt=2,help_desk='14co101' WHERE pc_id='$pc_id'";
}
if($ac==3){//Issue declined by boss
$query="UPDATE pc SET opt=3 WHERE pc_id='$pc_id'";
}
if($ac==4){//Issue retained by boss
$query="UPDATE pc SET opt=4 WHERE pc_id='$pc_id'";
}
if($ac==7){//Issue retained by help desk
$query="UPDATE pc SET opt=7 WHERE pc_id='$pc_id'";
}
if($ac==5){//Issue approved by help desk
$query="UPDATE pc SET opt=5 WHERE pc_id='$pc_id'";
}
if($ac==6){//Issue declined by help desk
$query="UPDATE pc SET opt=6 WHERE pc_id='$pc_id'";
}

// value of 'opt' is set based on the place where request is currently underprocess 



$result= mysql_query($query);

header("Location: pend.php");
?>