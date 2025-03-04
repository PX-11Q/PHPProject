<?php

function emptyInputSignup($screen_name, $email_address, $pwd, $confirm_password) {
  $result;
  if (empty($screen_name) || empty($email_address) || empty($pwd) || empty($confirm_password)) {
    $result = true;   
  }
  else{
    $result = false;
  }
  return $result;
}

function InvalidScreenName($screen_name) {
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $screen_name)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function InvalidEmail($email_address) {
  $result;
  if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}


function PasswordTooShort($pwd, $confirm_password) {
  $result;
  if(strlen($pwd) < 6) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function PasswordTooLong($pwd, $confirm_password) {
  $result;
  if(strlen($pwd) > 76) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function UserExists($conn, $screen_name, $email_address) {
  $sql = "SELECT * FROM tblUsers WHERE Screen_Name = ? OR Email_Address = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../registration.php>error=sqlerror");
    exit();
  }

mysqli_stmt_bind_param($stmt, "ss", $screen_name, $email_address);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($resultData)) {
  return $row;
}
else {
  $result = false;
  return $result;
}
  mysqli_stmt_close($stmt);
}

function CreateUser($conn, $screen_name, $email_address, $pwd)  {
  $sql = "INSERT INTO tblUsers (Screen_Name, Email_Address, Password, Registration_Date, Privilege) VALUES (?, ?, ?, NOW(), ('Non-Admin'));";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../registration.php>error=sqlerror");
    exit();
  }

$hashedPassword = password_hash($pwd, PASSWORD_DEFAULT); // Hashing the password 
  
mysqli_stmt_bind_param($stmt, "sss", $screen_name, $email_address, $hashedPassword);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: ../login.php?error=none");
exit();
}

function emptyInputLogin($screen_name, $pwd) {
  $result;
  if (empty($screen_name) || empty($pwd)) { 
    $result = true;  
  }
  else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $screen_name, $pwd) {
  $User_Exists = UserExists($conn, $screen_name, $screen_name);

  if ($User_Exists === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $User_Exists["Password"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }
  else if ($checkPwd === true) {
    session_start();
    $_SESSION["screen_name"] = $screen_name;
    $_SESSION["privilege"] = $User_Exists["Privilege"];
    header("location: ../index.php");
    exit();
  }
}

function CreatePost($conn, $post_title, $post_text, $post_author)  {
  $sql = "INSERT INTO tblPosts (PostTitle, PostText, PostAuthor, PostDate) VALUES (?, ?, ?, NOW());";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../registration.php>error=sqlerror");
    exit();
  }



mysqli_stmt_bind_param($stmt, "sss", $post_title, $post_text, $post_author);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location: ../login.php?error=none");
exit();

}