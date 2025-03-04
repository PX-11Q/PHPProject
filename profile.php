<?php 

include 'header.php';

if (!isset($_SESSION["screen_name"])) {
  header("location: ../login.php");
}

$screen_name = $_SESSION["screen_name"];
$privilege = $_SESSION["privilege"];
$query = "SELECT * FROM tblUsers WHERE Screen_Name = '$screen_name'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) == 1) {
   while ($row = mysqli_fetch_assoc($result)) {
     $dbuser_id = $row["User_ID"];
     $dbscreen_name = $row["Screen_Name"];
     $dbemail_address = $row["Email_Address"];
     $dbprivilege = $row["Privilege"];
   }

}

?>

<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile page</title>
  </head>

  <body>
    <div class="container-field">
      <div class="row">
        <div class="col">

  <div class="card" style="width: 10rem;">
  <div class="card-body">
  <h5 class="card-title">"
  

  
      <?php 
      if (isset($_SESSION["screen_name"])) {
          echo "<h2> Welcome back, " .$_SESSION["screen_name"]. "!</h2>";
      }
      ?><br>
      
    </div>

  
</html>

   
