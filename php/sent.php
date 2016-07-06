<?php
//include_once 'dbconfig.php';
 ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
  $sf=$_SESSION['sfid'];
  if($_SESSION['alert']==1){
    echo '<script language="javascript">';
    echo 'alert("Submitted Succesfully")';
    echo '</script>';
    $_SESSION['alert']=0;
  }
  
?>
<!DOCTYPE html>

<html>
    <head>
      <title>IT Requistion Portal</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">      
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
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

        <?php echo "<li class='active'><a href='sent.php'>Sent Issues</a></li>"; ?>
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
       <?php


$sn=1;$sn1=1;
mysql_connect("localhost","root","");

mysql_select_db("asl")or ("Database not foyunf");


$query="SELECT * FROM pc WHERE sfid='$sf'";
$result= mysql_query($query);
//$i=0;$ids=array();


while($row= mysql_fetch_array($result)){
  
  if($sn==1){
    
    ?>
<table class="highlight">
        <thead>
          <tr>
              <th data-field="sno">S/No</th>
              <th data-field="id">SFID</th>
              <th data-field="req">Request</th>
              <th data-field="st">Status</th>
          </tr>
        </thead>
        <tbody><?php
  }
  
  echo "<a href='pc_disp.php?id=" . $row['pc_id'] . "'>";
 echo "<div class='row' id=" . $row['pc_id'] . " >";
        /*echo "<div class='col s12 m4'>";
          echo "<div class='card blue-grey darken-1'>";
            echo "<div class='card-content white-text' >";
              echo "<span class='card-title' > Request for new PCs<br> </span>";
              echo "<h6> Number of new PCs required : $row[n_npc] </h6><br>";
              echo "$row[just]";*/
              echo "<tr>";
        echo "<td>".$sn."</td>";$sn=$sn+1;
            echo "<td><a href='pc_disp.php?id=" . $row[pc_id] . "''>$row[sfid]</a></td>";
            echo "<td>PC</td>";
            echo "<td>";
            
            
            if($row[opt]==1) {
              echo "<a>Issue is in boss's dashboard</a>";
            }


            if($row[opt]==2) {
              echo "<a>Issue approved by boss and sent to help desk</a>";
            }
            if($row[opt]==3) {
              echo "<a>Issue declined by boss</a>";
            }
            if($row[opt]==4) {
              echo "<a>Issue retained by boss</a>";
            }
            if($row[opt]==5) {
              echo "<a>Issue approved by help desk</a>";
            }
            if($row[opt]==6) {
              echo "<a>Issue declined by help desk</a>";
            }
            if($row[opt]==7) {
              echo "<a>Issue retained by help desk</a>";
            }


          echo "</td> </tr>";
          echo "</a>";

 
}
  echo "</tbody></table>";



$query1="SELECT * FROM flash WHERE sfid='$sf'";
$result1= mysql_query($query1);
//$i=0;$ids=array();


while($row= mysql_fetch_array($result1)){
  if($sn1==1){
    ?>
<table class="highlight">
        <thead>
          <tr>
              <th data-field="sno">S/No</th>
              <th data-field="id">SFID</th>
              <th data-field="req">Request</th>
              <th data-field="st">Status</th>
          </tr>
        </thead>
        <tbody><?php
  }

  echo "<a href='flash_disp.php?id=" . $row['flash_id'] . "'>";
 echo "<div class='row' id=" . $row['flash_id'] . " >";
        echo "<tr>";
            echo "<td>".$sn1."</td>";$sn1=$sn1+1;
            echo "<td><a href='flash_disp.php?id=" . $row[flash_id] . "''>$row[sfid]</a></td>";
            echo "<td>Flash Drive</td>";echo "<td>";
            
             
            if($row[opt]==1) {
              echo "<a>Issue is in boss's dashboard</a>";
            }
            if($row[opt]==2) {
              echo "<a>Issue approved by boss and sent to help desk</a>";
            }
            if($row[opt]==3) {
              echo "<a>Issue declined by boss</a>";
            }
            if($row[opt]==4) {
              echo "<a>Issue retained by boss</a>";
            }
            if($row[opt]==5) {
              echo "<a>Issue approved by help desk</a>";
            }
            if($row[opt]==6) {
              echo "<a>Issue declined by help desk</a>";
            }
            if($row[opt]==7) {
              echo "<a>Issue retained by help desk</a>";
            }


          echo "</td>";
          echo "</tr>";
          echo "</div>";
          echo "</a>";

}
  echo "</tbody></table>";

?>



   </body>
  <script>
   $(document).ready(function() {
    $('select').material_select();
});</script>
</html>