<?php 

    include 'Include-files/idatabase.php';
    session_start();


?>

<!DOCTYPE html>
<head>
    <title> Jeffrey's Blog </title>
    <link rel="stylesheet" type"text/css" href="styles.css">
    </head>
    <body>

        <div class="navigationbar">
            <a href="index.php">Home</a>
            <a href="news.php">News</a>
            <a href="events.php">Events</a>
            <a href="post.php">Posts</a>

            <?php

            if (isset($_SESSION["screen_name"])) {
            echo "<a href='profile.php'>Profile Page</a></li>";
            echo "<a href='Include-files/ilogout.php'>Logout</a></li>";
            echo "<a href='makepost.php'>Make Post</a></li>";
            
            }
            else {
            echo "<a href='login.php'>Log in</a></li>";
            echo "<a href='registration.php'>Register</a></li>";
            }

            


             ?>

            
            


             
                                                           
        </div>