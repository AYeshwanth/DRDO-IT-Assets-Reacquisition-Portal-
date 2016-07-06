<?php
//session_destroy();
ini_set(session.save_path,'C:\xampp\htdocs\drdo30\session');
session_start();
include("authenticate.php");
 
// check to see if user is logging out
if(isset($_GET['out'])) {
  // destroy session
  session_unset();
  $_SESSION = array();
  unset($_SESSION['user'],$_SESSION['access']);
  session_destroy();
}
 
// check to see if login form has been submitted
if(isset($_POST['userLogin'])){
  // run information through authenticator
  if(authenticate($_POST['userLogin'],$_POST['userPassword']))
  {
    // authentication passed
    $_SESSION['sfid']=$_POST['userLogin'];
    header("Location: home.php");
    die();
  } else {
    // authentication failed
    header("Location: login_fail.php");
  }
}
 
// output error to user
 
// output logout success
//if(isset($_GET['out'])) echo "Logout successful";
?>
 
<!DOCTYPE html>
<html>
   <head>
      <title>IT Portal Login</title>
      <head>
<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>           
  </head>
    <div class="login-page">
  <div class="form">
<form action="login_fail.php" method="post">
  <a class="message" style="color:blue">Successfully Logged Out..!!<br></a>
  <input type="text" placeholder="username" name="userLogin"  />
      <input type="password" placeholder="password" name="userPassword" />
      <button>Login</button>
</form>
  </div>
</div>
</html>