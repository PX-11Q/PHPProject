<?php 

session_start();

if (isset($_POST['submit'])) {
$post_title = $_POST["post-title"];
$post_text = $_POST["post-text"];
$post_author = $_SESSION["screen_name"];





  require 'idatabase.php';
  require 'ifunctions.php';

}
else {
  header("location: ../makepost.php");
  exit();
}
createPost($conn, $post_title, $post_text, $post_author);

