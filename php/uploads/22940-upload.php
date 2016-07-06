<?php
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
		$sql="UPDATE info SET type_1='$file_type',file_1='$final_file',size_1='$new_size' WHERE sfid='14co151'";
	    /*$sql1="UPDATE info SET file_1='$final_file' WHERE sfid='14co151'";
	    $sql2="UPDATE info SET size_1='$new_size' WHERE sfid='14co151'";*/
		mysql_query($sql);
		/*mysql_query($sql1);
		mysql_query($sql2);*/
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='home.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='home.php?fail';
        </script>
		<?php
	}
}
?>