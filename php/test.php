<?php
ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
$sfid=$_SESSION['sfid'];
$n_pc=$_POST['n_pc'];
$n_pc_des=$_POST['n_pc_des'];
$n_mp=$_POST['n_mp'];
$n_mp_des=$_POST['n_mp_des'];
$n_npc=$_POST['n_npc'];
$n_npc_des=$_POST['n_npc_des'];
$just=$_POST['just'];
$util=$_POST['util'];
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
  $pc_id=$row['pc_id'];
}



$query2="INSERT INTO `asl`.`pc` (`sfid`, `bsfid`, `n_pc`, `n_pc_des`, `n_mp`, `n_mp_des`, `n_npc`, `n_npc_des`, `just`, `util`, `opt`, `pc_id`, `size_1`, `type_1`) VALUES ('$sfid', '$bsfid', '$n_pc', '$n_pc_des', '$n_mp', '$n_mp_des', '$n_npc', '$n_npc_des', '$just', '$util', '$a', '$pc_id', '', '')";

$res2=mysql_query($query2);

$pc_id1=$pc_id+1;

$query3="UPDATE info SET pc_id='$pc_id1' WHERE sfid='14co101'";
$res3=mysql_query($query3);



include_once 'dbconfig.php';
if(isset($_POST['btn-upload']))
{    
     
  $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
  $file_size = $_FILES['file']['size'];
  $file_type = $_FILES['file']['type'];
  $folder="uploads/";
  
  // new file size in KB
  $new_size = $file_size/1024;  
  // new file size in KB
  
  // make file name in lower case
  $new_file_name = strtolower($file);
  // make file name in lower case
  
  $final_file=str_replace(' ','-',$new_file_name);
  
  if(move_uploaded_file($file_loc,$folder.$final_file))
  {
    $sql="UPDATE pc SET type_1='$file_type',file_1='$final_file',size_1='$new_size' WHERE pc_id='$pc_id';";
    mysql_query($sql);
   // echo "submission successful!!";
    $_SESSION['alert']=1;
    header("Location: sent.php");
  }
  else
  {
    //echo "error while uploading";
    header("Location: home.php");
  }
}





?>

