<?php

if (isset($_POST['submit'])) {
  $screen_name = $_POST["screen_name"];
  $email_address = $_POST["email_address"];
  $pwd = $_POST["pwd"];
  $confirm_password = $_POST["confirm_password"];

  require 'idatabase.php';
  require 'ifunctions.php';

  // Catching common errors - Basic validation 

if (emptyInputSignup($screen_name, $email_address, $pwd, $confirm_password) !== false) {
  header("location: ../registration.php>error=emptyinput"); 
  exit();
}

if (InvalidScreenName($screen_name) !== false) {
    header("location: ../registration.php>error=invalidscreenname"); 
    exit();
}

if (InvalidEmail($email_address) !== false) {
      header("location: ../registration.php>error=invalidemail"); 
      exit();
}

if (PasswordTooShort($pwd, $confirm_password) !== false) {
  header("location: ../registration.php>error=passwordtooshort");
  exit();
}

if (PasswordTooLong($pwd, $confirm_password) !== false) {
  header( "location: ../registration.php>error=passwordtoolong");
  exit();
}

if (UserExists($conn, $screen_name, $email_address) !== false) {
    header( "location: ../registration.php>error=usernametaken");
    exit();
}


createUser($conn, $screen_name, $email_address, $pwd);

}

else{
  header("location: ../registration.php");
  exit();
}




  