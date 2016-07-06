<?php 
 
  ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
  $sf=$_SESSION['sfid'];
   $pc_id=$_GET['id']; 
  ?>
<!DOCTYPE html>

<html>
    <head>
      <title>IT Requistion Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    
      <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/cloudflare.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
      <script type="text/javascript" href="../js/cloudflare"></script>  
      <script type="text/javascript" href="../js/jquery"></script>   


  <link rel="stylesheet" type="text/css" href="../css/responsiveform.css">
  <link rel="stylesheet" media="screen and (max-width: 1550px) and (min-width: 1200px)" href="../css/responsiveform4.css" />
  <link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 601px)" href="../css/responsiveform1.css" />
  <link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 351px)" href="../css/responsiveform2.css" />
  <link rel="stylesheet" media="screen and (max-width: 350px)" href="../css/responsiveform3.css" />
                
  </head>

			<nav>
    <div class="nav-wrapper">
      <a  href="#" class="brand-logo center">IT Assets Requistion Portal</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
         <?php echo "<li class='active'><a href='home.php'>Home</a></li>"; ?>

        <?php echo "<li><a href='sent.php'>Sent Issues</a></li>"; ?>
        <?php 
       mysql_connect("localhost", "root", "") or die (mysql_error());
          mysql_select_db("asl") or die(mysql_error());

          $query="SELECT * FROM info WHERE bsfid='$sf'";
        $result= mysql_query($query);
        $count=0;
        while($row= mysql_fetch_array($result)){
          $count=$count+1;}
        if($count!=0){
       echo "<li><a href='pend.php'>Received</a></li>";
       } ?>
      </ul>
      <ul class="right hide-on-med-and-down">
      
        <li><a class="waves-effect waves-light indigo accent-4 btn" href="logout.php">Log Out</a></li>
       
      </ul>
    </div>
  </nav>

  <body>
 
 <br><br>
  <div class="container grey lighten-2">
  <div class="row">

<?php 
	//$sf=$_GET['id'];
	mysql_connect("localhost", "root", "") or die (mysql_error());
	mysql_select_db("asl") or die(mysql_error());

	$query1="SELECT * FROM pc WHERE pc_id='$pc_id'";
	$result1= mysql_query($query1);
	$row= mysql_fetch_array($result1);
?>
    <div class="col s12 m9 l10">

      <!--  Collections Section  -->

      <div id="basic" class="section scrollspy">
      		<h4 class="center">Issue Details</h4>
        <div class="row">
        <div class="col push-s1">
        <h6><b>SFID : </b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php if(1){ echo $row['sfid'];}
        ?>
       </div>
       <br><br>
      <div class="col push-s1">
      	<h6><b>Description of the issue(s) raised</b></h6>
      	</div>
      	<br><br>
      	<div class="col push-s1" style="text-align:justify">
      	<?php if(1){ echo "New PC Request";}
      	?>
       </div>
       <br>

       <div class="col push-s1">
      	<h6><b>Number of PCs held by Directorate:</b></h6>
      	</div>
      	<br><br>
      	<div class="col push-s1" style="text-align:justify">
      	<?php echo $row['n_pc']; ?>
       </div>
       <br>
       
      <div class="col push-s1">
        <h6><b>Number of PCs held by each group:(In detail)</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['n_pc_des']; ?>
       </div>
       <br>

      <div class="col push-s1">
        <h6><b>Total number of manpower in Directorate:</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['n_mp']; ?>
       </div>
       <br>       

      <div class="col push-s1">
        <h6><b>Total number of manpower in each group:(In detail)</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['n_mp_des']; ?>
       </div>
       <br>        

      <div class="col push-s1">
        <h6><b>Total number of new PCs Required in Directorate</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['n_npc']; ?>
       </div>
       <br> 

      <div class="col push-s1">
        <h6><b>Total number of new PCs Required in each group:(In detail)</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['n_npc_des']; ?>
       </div>
       <br> 

      <div class="col push-s1">
        <h6><b>Justification for New PCs:(Explain that why existing resources cannot be used for the purpose)</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['just']; ?>
       </div>
       <br> 

      <div class="col push-s1">
        <h6><b>Utilization of PCs, please fill up in the order (S.No-PC Name-Name of User-IP Adress-Purpose of Usage)</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['util']; ?>
       </div>
       <br> <br>



       <div class="col push-s1">
      	<h6><b>File(s) uploaded</b></h6>
      	</div>
      	<br><br>
      	<div class="col push-s1" style="text-align:justify">
      	<?php if($row['size_1']!=0){?> 
      		<td><?php echo $row['file_1'] ?></td>
			<td><a href="uploads/<?php echo $row['file_1'] ?>" target="_blank">view file</a></td>
      	<?php }?>
       </div>


       <br>
       <br>

        </div>
      </div>
      <!-- End collections -->


    </div>

  </div>
</div>


  </body>
  </html>
