<?php
	mysql_connect("localhost", "root", "") or die (mysql_error());
	mysql_select_db("test") or die(mysql_error());
//	$strSQL = "SELECT * FROM details WHERE first_name='John' ";

//	$rs = mysql_query($strSQL);
	//echo $rs;

$first_name = $_POST['first_name'];
$second_name=$_POST['second_name'];
$sfid=$_POST['sfid'];


	$option = $_POST['problem'];
  if(empty($option)) 
  {
    echo("You didn't select any option.");
  } 
  else
  {
    $N = count($option);
 	
  //  echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
    	
    		$strSQL = "UPDATE details SET $option[$i]=1 WHERE sfid='$sfid' ";
    		$rs = mysql_query($strSQL);
    }

    header('Location:../html/dash.html');
  }



?>