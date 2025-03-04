<?php 

if (isset($_POST['submit'])) {
  $screen_name = $_POST["screen_name"];
  $pwd = $_POST["pwd"];
  require 'idatabase.php';
  require 'ifunctions.php';

  if (emptyInputLogin($screen_name, $pwd) !== false) {
    header("location: ../login.php>error=emptyinput"); 
    exit();
  }

  loginUser($conn, $screen_name, $pwd);
}
else {
  header("location: ../login.php");
  exit();
}