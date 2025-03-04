<?

include 'header.php'

?>

<section class="login-form">
  <h1> Welcome back! </h1>
  <div class="login-form-container">
  <form action="Include-files/ilogin.php" method="POST">
    <ul> <input type="text" name="screen_name" placeholder="Screen name"> </ul>
      <ul> <input type="password" name="pwd" placeholder="Password"> </ul>
        <ul> <button type="submit" name="submit">Log in</button> </ul>
  </form>

  </div>
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
      echo "<p> Fill in all fields! </p>";
    }
    else if ($_GET["error"] == "wronglogin") {
      echo "<p> Invalid login! </p>";

    }
    else if ($_GET["error"] == "none") {
      echo "<p> You have successfully logged in </p>";
    }
  }

  ?>
</section>