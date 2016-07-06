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
      
        <li><a class="waves-effect waves-light indigo accent-4 btn" href="logout.php">Log Out</a></li>
       
      </ul>
    </div>
  </nav>
<br>

<body>

<div id="envelope">
<header>
    <h4>Request Form for FlashDrive Access</h4>

</header>
<hr>
<?php echo"<form name='myForm' id='myForm' action='flash_test.php' method='POST' ";  //Form for requesting Flashdrive access
?>  
  <label>Name : </label>
  <input type="text" id="name" name="name"  width="100px;" required>
  <label>Designation :</label>
  <input type="text" id="desig" name="desig" required>   
  <label>Flash Drive name and serial number:</label>
  <input type="text" name="nas" id="nas" required>  
  <label>Purpose : (In detail)</label>
  <textarea name="purp" id="purp" rows="30" cols="15" required></textarea>
    <label>To be enabled on which system(IP or Name of the computer and Location):</label>
  <input type="text" name="ipon" id="ipon" required>
  <input type="submit" value="Send Request" id="btn-upload" onclick="checkscript()">    
</form>
</div>
</body>
</html>

