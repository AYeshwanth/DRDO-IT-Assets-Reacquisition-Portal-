<!DOCTYPE html>
<html>
   <head>
      <title>IT Reacquistion Poratal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>             
  </head>

  <body>

    <nav>
    <div class="nav-wrapper">
      <a  href="#" class="brand-logo center">Online IT Assets Reacquistion Portal </a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li class="active"><a href="sass.html">Dashboard</a></li>
        <li><a href="home.html">Issues</a></li>
      </ul>
    </div>
  </nav>
        
<?php


mysql_connect("localhost","root","");

mysql_select_db("test")or ("Database not foyunf");

$query="SELECT * FROM details WHERE opt=1 AND bsfid='22dr222'";
$result= mysql_query($query);
//$i=0;$ids=array();


while($row= mysql_fetch_array($result)){
  echo "<html>";
  echo "<body>";
  echo "<a href='dash_disp.php?id=" . $row['sfid'] . "'>";
 echo "<div class='row' id=" . $row['sfid'] . " >";
        echo "<div class='col s12 m4'>";
          echo "<div class='card blue-grey darken-1'>";
            echo "<div class='card-content white-text' >";
              echo "<span class='card-title' >  $row[first_name] $row[second_name] <br> </span>";
              echo "<h6> $row[sfid] </h6><br>";
              echo "$row[des]";
            echo "</div> ";
            echo "<div class='card-action'>";
              echo "<a href='#'>Appove</a>";
              echo "<a href='#'>Decline</a>";
              echo "<a href='dash.php'>Retain</a>";
            echo "</div>";           
          echo "</div>";
          echo "</a>";
        echo "</div>";?>
        </a>
<?php  echo "</body>";
  echo "</html>";
 
}




?>



   </body>
  <script>
   $(document).ready(function() {
    $('select').material_select();
});</script>
</html>