<?php
//include_once 'dbconfig.php';
 ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
  $sf=$_SESSION['sfid'];
  
  
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
       <?php echo "<li><a href='home.php'>Home</a></li>"; ?>

       <?php echo "<li><a href='sent.php'>Sent Requests</a></li>"; ?>
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
      
        <li  ><a class="waves-effect waves-light indigo accent-4 btn" href="logout.php">Log Out</a></li>
       
      </ul>
    </div>
  </nav>
<br>

<body>

<div id="envelope">
<header>
<h4>Request for New PC(s)</h4>
</header>
<hr>
    <?php echo"<form class='col s12' name='myForm' id='myForm' action='test.php' method='POST' enctype='multipart/form-data'>"; ?>

    <label>Number of PCs held by Directorate:</label>
  <input type="text" id="n_pc" name="n_pc"  required >

      <label>Number of PCs held by each group:(In detail)</label>
  <textarea id="n_pc_des" name="n_pc_des" required ></textarea>
      
      <label>Total number of manpower in Directorate:</label>
  <input type="text" id="n_mp" name="n_mp"  required>
      
      <label>Total number of manpower in each group:(In detail)</label>
  <textarea id="n_mp_des" name="n_mp_des" required></textarea>
      
       <label>Total number of new PCs Required in Directorate:</label>
  <input type="text" id="n_npc" name="n_npc"  required>
       
       <label>Total number of new PCs Required in each group:(In detail)</label>
  <textarea id="n_npc_des" name="n_npc_des"  required></textarea>
     
     <label>Justification for New PCs:(Explain that why existing resources cannot be used for the purpose)</label>
  <textarea id="just" name="just" required></textarea>
      
       <label>Utilization of PCs, please fill up in the order (S.No-PC Name-Name of User-IP Adress-Purpose of Usage)</label>
  <textarea id="util" name="util"  required></textarea>
      <br><br>
      <div >
      <div id="body">
  <!--<form action="upload.php" method="post" enctype="multipart/form-data">-->
      
        <input type="file" name="file" />
    

      </div>
      </div>
        <!--<button type="submit" name="btn-upload">upload</button>
  </form>-->
    

   </li>

      <br><br>
      <input type="submit" value="Send Request" id="btn-upload"  name="btn-upload" onclick="checkscript()">
      
    </form>

</div>
</body>
</html>
