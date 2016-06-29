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

			<nav>
              <div class="nav-wrapper">
              <div class="row">
              <a  href="#" class="brand-logo center">Online IT Assets Reacquistion Portal </a>
                <div class="col s12 offset-s3">
                  <a href="dash.php" class="breadcrumb">Dashboard</a>
                  <a href="#!" class="breadcrumb active">Issue details</a>
                </div>
                </div>
              </div>
            </nav>
  <body>
  <br><br>
  <div class="container grey lighten-2">
  <div class="row">

<?php 
	$sf=$_GET['id'];
	mysql_connect("localhost", "root", "") or die (mysql_error());
	mysql_select_db("test") or die(mysql_error());

	$query="SELECT * FROM details WHERE sfid='$sf'";
	$result= mysql_query($query);
	$row= mysql_fetch_array($result);
?>
    <div class="col s12 m9 l10">

      <!--  Collections Section  -->

      <div id="basic" class="section scrollspy">
      		<h4 class="center">Issue Details</h4>
        <div class="row">
        <div class="input-field col s4 push-s1" >
          <input disabled value="<?php echo $row['first_name'] ; echo " ".$row['second_name'];?>" id="disabled" type="text" class="validate blue-text text-darken-2">
          <label for="disabled">Name</label>
        </div>
        <div class="input-field col s4 push-s4" >
          <input disabled value="<?php echo $row['sfid']; ?>" id="disabled" type="text" class="validate blue-text text-darken-2">
          <label for="disabled">Sfid</label>
        </div>
      </div>

       <div class="row">
        <div class="input-field col s6 push-s1" >
            <div class="col">
      			<h6><b>Issue(s) Raised</b></h6>
      		</div>
      		<br>
            <?php if($row['option1']==1){?>
            <p>
    		<input class="with-gap" name="group3" type="radio" id="test5" checked />
    		<label for="test5">Option 1</label>
  			</p>
  			<?php }?>
  			<?php if($row['option2']==1){?>
            <p>
    		<input class="with-gap" name="group4" type="radio" id="test6" checked />
    		<label for="test6">Option 2</label>
  			</p>
  			<?php }?>
  			<?php if($row['option3']==1){?>
            <p>
    		<input class="with-gap" name="group5" type="radio" id="test7" checked />
    		<label for="test7">Option 3</label>
  			</p>
  			<?php }?>
        </div>
      </div>
      <br>
      <div class="col push-s1">
      	<h6><b>Description of the issue(s) raised</b></h6>
      	</div>
      	<br><br>
      	<div class="col push-s1" style="text-align:justify">
      	<?php if($row['des']!=NULL){ echo "$row[des]";}
      	?>
       </div>
        </div>
      </div>
      <!-- End collections -->


    </div>

  </div>
</div>


  </body>
  </html>
