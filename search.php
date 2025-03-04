<?php
 include 'header.php';

 ?>

<h1> Search Page</h1>

<div class="forumpost-container">
<?php 
    if (isset($_POST['submit-search'])) {
      $search = mysqli_real_escape_string($conn, $_POST['search']); // Preventing SQL injection
      $sql = "SELECT * FROM tblPosts WHERE PostTitle LIKE '%$search%' OR PostText LIKE '%$search%' OR PostAuthor LIKE '%$search%' OR PostDate LIKE '%$search%'"; 
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);

      echo "There are " .$queryResult. " results for your search!";


      if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<a href='post.php?title=".$row['PostTitle']."&date=".$row['PostDate']."''> <div class='post-box'> 
              <h3> ".$row['PostTitle']."</h3>
              <p> ".$row['PostText']."<p>
              <p> ".$row['PostDate']."</p>
              <p> ".$row['PostAuthor']."</p>


          </div></a>";
        }
      } else {
        echo "No results found!";
      }
      
    }
      ?>


</div>