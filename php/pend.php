<?php  
ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
  $sf=$_SESSION['sfid'];
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

    <link rel="stylesheet" type="text/css" href="../css/responsiveform.css">
  <link rel="stylesheet" media="screen and (max-width: 1550px) and (min-width: 1200px)" href="../css/responsiveform4.css" />
  <link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 601px)" href="../css/responsiveform1.css" />
  <link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 351px)" href="../css/responsiveform2.css" />
  <link rel="stylesheet" media="screen and (max-width: 350px)" href="../css/responsiveform3.css" />

      <script type="text/javascript" href="../js/cloudflare"></script>  
      <script type="text/javascript" href="../js/jquery"></script>
      <style >
        #secondary {
    float: left;
    width: 32%;
}

      </style>              
  </head>

  <nav>
    <div class="nav-wrapper">
      <a  href="#" class="brand-logo center">IT Assets Requistion Portal</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
       <?php echo "<li><a href='home.php'>Home</a></li>"; ?>

       <?php echo "<li><a href='sent.php'>Sent Issues</a></li>"; ?>
        <?php 
       mysql_connect("localhost", "root", "") or die (mysql_error());
          mysql_select_db("asl") or die(mysql_error()) ;

          $query="SELECT * FROM info WHERE bsfid='$sf'";
        $result= mysql_query($query);
        $count=0;
        while($row= mysql_fetch_array($result)){
          $count=$count+1;}
        if($count!=0){
       echo "<li class='active'><a href='pend.php'>Received</a></li>";
       } ?>
      </ul>
      <ul class="right hide-on-med-and-down">
      
        <li><a class="waves-effect waves-light indigo accent-4 btn" href="logout.php">Log Out</a></li>
       
      </ul>
    </div>
  </nav>
  <nav>
  <div class="nav-wrapper  " style="color: blue">
      <ul id="nav-mobile" class="right hide-on-med-and-down" >
       <?php echo "<li><a href='acc.php'>Accepted</a></li>"; ?>
       <?php echo "<li><a href='decl.php'>Declined</a></li>";?>
       <?php echo "<li class='active'><a href='pend.php'>Pending</a></li>"; ?>
      </ul>
    </div>


  </nav>


  <body>

<?php 

if($sf!='14co101'){

$query1="SELECT * FROM pc WHERE bsfid='$sf' AND opt=1";
$result1= mysql_query($query1);
//$i=0;$ids=array();
}
if($sf=='14co101'){
  $query1="SELECT * FROM pc WHERE (bsfid='$sf' AND opt=1) OR (help_desk='$sf' AND opt=4)";
$result1= mysql_query($query1);

}
$a1=2;$a2=3;$a3=4;$a4=5;$a5=6;$a6=7;$x=1;
$c=1;$sn=1;$pc=0;$fl=0;$sn1=1;

while($row= mysql_fetch_array($result1)){

  if($sn==1){
    ?><table class="highlight centered">
        <thead>
          <tr>
              <th data-field="sno">S/No</th>
              <th data-field="id">SFID</th>
              <th data-field="req">Request</th>
              <th data-field="acc">Accept</th>
              <th data-field="decl">Decline</th>
              <th data-field="ret">Retain</th>

          </tr>
        </thead>
        <tbody><?php
  }


    echo "<a>";
 
  echo "<div class='row' id=" . $row['pc_id'] . " >";
 
        echo "<tr>";
          echo "<td>".$sn."</td>";$sn=$sn+1;
            echo "<td><a href='pc_disp.php?id=" . $row[pc_id] . "''>$row[sfid]</a></td>";
            echo "<td>PC</td>";
            echo "<td><a class='waves-effect waves-light ' href='action.php?act=" . $a1 . "&id1=" . $row[pc_id] . "'>Approve</a>";echo "</td>";
            echo "<td><a class='waves-effect waves-light  ' href='action.php?act=" . $a2 . "&id1=" . $row[pc_id] . "'>Decline</a>";echo "</td>";
            echo "<td><a class='waves-effect waves-light  ' href='action.php?act=" . $a3 . "&id1=" . $row[pc_id] . "'>Retain</a>";echo "</td>";
          echo "</tr>";
          $pc=$pc+1;
        /*echo "<div id='secondary'>";
          echo "<div class='card blue-grey '>";
            echo "<div class='card-content white-text' >";
              echo "<span class='card-title' > Request for new PCs<br> </span>";
              echo "<h6> Number of new PCs required : $row[n_npc] </h6><br>";
              echo "$row[just]";
            echo "</div> ";
            echo "<div class='card-action center'>";
              echo "<a href='action.php?act=" . $a1 . "&id1=" . $row[pc_id] . "'>Approve</a>";
              echo "<a href='action.php?act=" . $a2 . "&id1=" . $row[pc_id] . "'>Decline</a>";
              echo "<a href='action.php?act=" . $a3 . "'>Retain</a>";
            echo "</div>";*/
            echo "</div>";
          echo "</div>";
          echo "</a>";
  if($row[opt]==2&&$row[help_desk]=='14co101'){

      echo "<a href='pc_disp.php?id=" . $row['pc_id'] . "'>";
     
        echo "<div class='row' id=" . $row['pc_id'] . " >";
         
        echo "<tr>";
        echo "<td>".$sn."</td>";$sn=$sn+1;
            echo "<td><a href='pc_disp.php?id=" . $row[pc_id] . "''>$row[sfid]</a></td>";
            echo "<td>PC</td>";
            echo "<td><a class='waves-effect waves-light'  href='action.php?act=" . $a4 . "&id1=" . $row[pc_id] . "'>Approve</a>";echo "</td>";
            echo "<td><a class='waves-effect waves-light  ' href='action.php?act=" . $a5 . "&id1=" . $row[pc_id] . "'>Decline</a>";echo "</td>";
            echo "<td><a class='waves-effect waves-light  ' href='action.php?act=" . $a6 . "&id1=" . $row[pc_id] . "'>Retain</a>";echo "</td>";
          echo "</tr>";$pc=$pc+1;
          /*
        echo "<div id='secondary'>";
          echo "<div class='card blue-grey'>";
            echo "<div class='card-content white-text' >";
              echo "<span class='card-title' > Request for new PCs<br> </span>";
              echo "<h6> Number of new PCs required : $row[n_npc] </h6><br>";
              echo "$row[just]";
            echo "</div> ";
            echo "<div class='card-action center'>";
              echo "<a href='action.php?act=" . $a4 . "&id1=" . $row[pc_id] . "'>Approve</a>";
              echo "<a href='action.php?act=" . $a5 . "&id1=" . $row[pc_id] . "'>Decline</a>";
              echo "<a href='action.php?act=" . $a6 . "'>Retain</a>";
            echo "</div>";
                   
          echo "</div>";*/
          echo "</div>";
          echo "</div>";
          echo "</a>";
    }
        $c=$c+1;
}
echo "</tbody></table>";
if($sf!='14co101'){

$query1="SELECT * FROM flash WHERE bsfid='$sf' AND opt=1";
$result1= mysql_query($query1);
//$i=0;$ids=array();
}
if($sf=='14co101'){
  $query1="SELECT * FROM flash WHERE (bsfid='$sf' AND opt=1) OR (help_desk='$sf' AND opt=4)";
$result1= mysql_query($query1);

}
//echo "<div class='center'> <h5>Pending requests</h5></div>";


while($row= mysql_fetch_array($result1)){

    if($sn1==1){
    ?><table class="highlight centered">
        <thead>
          <tr>
              <th data-field="sno">S/No</th>
              <th data-field="id">SFID</th>
              <th data-field="req">Request</th>
              <th data-field="acc">Accept</th>
              <th data-field="decl">Decline</th>
              <th data-field="ret">Retain</th>

          </tr>
        </thead>
        <tbody><?php
  }
   
  if($row[opt]==1){
    
  echo "<a href='flash_disp.php?id=" . $row['flash_id'] . "'>";

  echo "<div class='row' id=" . $row['flash_id'] . " >";
 
        echo "<tr>";
            echo "<td>".$sn1."</td>";$sn1=$sn1+1;
            echo "<td><a href='flash_disp.php?id=" . $row[flash_id] . "''>$row[sfid]</a></td>";
            echo "<td>Flash Drive</td>";
            echo "<td><a class='waves-effect waves-light  href='flash_action.php?act=" . $a1 . "&id1=" . $row[flash_id] . "'>Approve</a>";echo "</td>";
            echo "<td><a class='waves-effect waves-light  ' href='flash_action.php?act=" . $a2 . "&id1=" . $row[flash_id] . "'>Decline</a>";echo "</td>";
            echo "<td><a class='waves-effect waves-light  ' href='flash_action.php?act=" . $a3 . "&id1=" . $row[flash_id] . "'>Retain</a>";echo "</td>";
          echo "</tr>";$fl=$fl+1;
          /*
          echo "<div class='card blue-grey'>";
            echo "<div class='card-content white-text' >";
              echo "<span class='card-title' > Request for FlashDrive Acess<br> </span>";
              echo "<h6> IP or Name of PC for Acess : $row[ipon] </h6><br>";
              echo "PURPOSE : $row[purp]";
            echo "</div> ";
            echo "<div class='card-action center'>";
              echo "<a href='flash_action.php?act=" . $a1 . "&id1=" . $row[flash_id] . "'>Approve</a>";
              echo "<a href='flash_action.php?act=" . $a2 . "&id1=" . $row[flash_id] . "'>Decline</a>";
              echo "<a href='flash_action.php?act=" . $a3 . "'>Retain</a>";
            */
            echo "</div>";
          echo "</div>";
          echo "</a>";
            }
            if($row[opt]==2&&$row[help_desk]=='14co101'){
            echo "<a href='flash_disp.php?id=" . $row['sfid'] . "'>";
  
  echo "<div class='row' id=" . $row['flash_id'] . " >";
 
          echo "<tr>";  
            echo "<td>".$sn1."</td>";$sn1=$sn1+1;
            echo "<td><a href='flash_disp.php?id=" . $row[flash_id] . "''>$row[sfid]</a></td>";
            echo "<td>Flash Drive</td>";
            echo "<td><a class='waves-effect waves-light  href='flash_action.php?act=" . $a4 . "&id1=" . $row[flash_id] . "'>Approve</a>";echo "</td>";
            echo "<td><a class='waves-effect waves-light  ' href='flash_action.php?act=" . $a5 . "&id1=" . $row[flash_id] . "'>Decline</a>";echo "</td>";
            echo "<td><a class='waves-effect waves-light  ' href='flash_action.php?act=" . $a6 . "&id1=" . $row[flash_id] . "'>Retain</a>";echo "</td>";
          echo "</tr>";$fl=$fl+1;
          /*

          echo "<div class='card blue-grey'>";
            echo "<div class='card-content white-text' >";
              echo "<span class='card-title' > Request for FlashDrive Acess<br> </span>";
              echo "<h6> IP or Name of PC for Acess : $row[ipon] </h6><br>";
              echo "PURPOSE : $row[purp]";
            echo "</div> ";
            echo "<div class='card-action center'>";
              echo "<a href='flash_action.php?act=" . $a4 . "&id1=" . $row[flash_id] . "'>Approve</a>";
              echo "<a href='flash_action.php?act=" . $a5 . "&id1=" . $row[flash_id] . "'>Decline</a>";
              echo "<a href='flash_action.php?act=" . $a6 . "'>Retain</a>";
            echo "</div>";
                   
          */
          echo "</div>";
          echo "</div>";
          echo "</a>";
        }
}?>



</tbody>



   </body>
  <script>
   $(document).ready(function() {
    $('select').material_select();
});</script>
</html>