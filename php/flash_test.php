<?php
ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
  $sfid=$_SESSION['sfid'];

$name=$_POST['name'];//echo $n_pc1;
$desig=$_POST['desig'];//echo $n_pc_des1;
$nas=$_POST['nas'];// echo $n_mp1;
$purp=$_POST['purp']; //echo $n_mp_des1;
$ipon=$_POST['ipon'];//echo $n_npc1;
$a=1;


  mysql_connect("localhost", "root", "") or die (mysql_error());
  mysql_select_db("asl") or die(mysql_error());
//  $strSQL = "SELECT * FROM details WHERE first_name='John' ";

//  $rs = mysql_query($strSQL);
 // echo $sfid;
$query="SELECT * FROM info WHERE sfid='$sfid'";
$res=mysql_query($query);

while($row=mysql_fetch_array($res)){
  $bsfid=$row['bsfid'];
}

$query1="SELECT * FROM info WHERE sfid='14co101'";//Help Desk ID
$res1=mysql_query($query1);

while($row=mysql_fetch_array($res1)){
  $flash_id=$row['flash_id'];//getting flash_id
}



$query2="INSERT INTO `asl`.`flash` (`sfid`, `bsfid`, `name`, `desig`, `nas`, `purp`, `ipon`, `opt`, `flash_id`) VALUES ('$sfid', '$bsfid', '$name', '$desig', '$nas', '$purp', '$ipon', '$a', '$flash_id')";

$res2=mysql_query($query2);

$flash_id1=$flash_id+1;

$query3="UPDATE info SET flash_id='$flash_id1' WHERE sfid='14co101'";
$res3=mysql_query($query3);



   header("Location:../php/sent.php");





?>