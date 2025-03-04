<?

include 'header.php'

?>

<section class="registration-form">
  <h2> Sign up for the website! </h2>
  <h3> Please fill out the form below to create an account. </h3>
  <div class="registration-form-container">
  <form action="Include-files/iregistration.php" method="POST">
  <ul> <input type="text" name="screen_name" placeholder="Screen name"> </ul> 
  <ul> <input type="text" name="email_address" placeholder="Email Address"> </ul> 
  <ul> <input type="password" name="pwd" placeholder="Password"> </ul> 
    <ul> <input type="password" name="confirm_password" placeholder="Confirm Password"> </ul> 
   <ul> <button type="submit" name="submit">Sign up</button> </ul>
  </form>
    
  </div>
   <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p> Fill in all fields! </p>";
      }
      else if ($_GET["error"] == "invalidscreenname") {
        echo "<p> Invalid screen name! </p>";

      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p> Invalid email address! </p>";

      }
      else if ($_GET["error"] == "passwordtooshort") {
        echo "<p> Password is too short! Enter a password that is longer than 8 characters </p>";

      }
      else if ($_GET["error"] == "passwordtoolong") {
        echo "<p> Password is too long! Enter a password that is shorter than 76 characters </p>";

      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p> Username is taken! </p>";
      }
      else if ($_GET["error"] == "sqlerror") {
        echo "<p> Something went wrong. </p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p> You have successfully created an account! </p>";
      }
    }

    ?>
</section>



