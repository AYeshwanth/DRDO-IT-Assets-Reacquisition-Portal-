<?php
ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
  $sf=$_SESSION['sfid']; //sfid is passed as session variable  
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
<br>


  <br><br><br><br>
  	<div align="center">
    	<h3 class="flow-text">Please Select your Issue</h3>
    </div>
  <br><br><br>
  <body>
  	<div align="center">
  		<?php echo "<a class='waves-effect waves-light btn' href='pc.php'>Request for PC</a>"; ?>
  	</div>
  	<br>
  	<div align="center">
  		<?php echo "<a class='waves-effect waves-light btn' href='flash.php'>Request for Flashdrive Access</a>"; ?>
  	</div>
  	<br>
  	

  </body>
</html>