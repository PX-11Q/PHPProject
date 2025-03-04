<?php
   include 'header.php';

   ?>

<form action="search.php" method="POST">
    <input type="text" name="search" placeholder="Search for posts">
    <button type="submit" name="submit-search">Search</button>
</form>



<div class="forumpost-container">
    <?php

    $sql = "SELECT * FROM tblPosts";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='post-box'> 
                <h3> ".$row['PostTitle']."</h3>
                <p> ".$row['PostText']."<p>
                <p> ".$row['PostDate']."</p>
                <p> ".$row['PostAuthor']."</p>


            </div>";
        }

    }



    ?>

</div>

</body>
</html