<?php 

ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
  $sf=$_SESSION['sfid'];
    $flash_id=$_GET['id']; 
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

	$query1="SELECT * FROM flash WHERE flash_id='$flash_id'";
	$result1= mysql_query($query1);
	$row= mysql_fetch_array($result1);
?>
    <div class="col s12 m9 l10">

      <!--  Collections Section  -->

      <div id="basic" class="section scrollspy">
      		<h4 class="center">Request Details</h4>
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
        <h6><b>Name:</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['name']; ?>
       </div>
       <br><br>

      <div class="col push-s1">
      	<h6><b>Description of the Request(s) </b></h6>
      	</div>
      	<br><br>
      	<div class="col push-s1" style="text-align:justify">
      	<?php if(1){ echo "Request for FlashDrive Access";}
      	?>
       </div>
       <br><br>

     
       
      <div class="col push-s1">
        <h6><b>Designation :</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['desig']; ?>
       </div>
       <br><br>

      <div class="col push-s1">
        <h6><b>3. Flash Drive make and serial number:</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['nas']; ?>
       </div>
       <br> <br>      

      <div class="col push-s1">
        <h6><b>Purpose : (In detail)</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['purp']; ?>
       </div>
       <br>        

      <div class="col push-s1">
        <h6><b>To be enabled on which system : (IP or Name of the computer and Location)</b></h6>
        </div>
        <br><br>
        <div class="col push-s1" style="text-align:justify">
        <?php echo $row['ipon']; ?>
       </div>
       <br> 


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
