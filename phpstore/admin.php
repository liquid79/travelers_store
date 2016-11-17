<?php
$page_title = "Admin - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";
?>
  <main>
    <div>
      <h3>Administration</h3>
      <h5><a href="story_new.php">Add Story</a></h5>
      <h5><a href="comments_admin.php">Comments</a></h5>
      <h5><a href="product_admin.php">Products</a></h5>
      <h5><a href="user_admin.php">Users</a></h5>
      <table>
        <tr>
          <th>Story ID</th>
          <th>Headline</th>
          <th>Author</th>
          <th>Content</th>
          <th>Date</th>
          <th>View</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        <?php
          $sql = "SELECT * FROM stories";
          $result = $kv_connect->query($sql);
          while (list($story_id, $story_headline, $author, $content, $date) = $result->fetch_row() ) {
            echo "<tr>";
            echo "<td>$story_id</td>";
            echo "<td>$story_headline</td>";
            echo "<td>$author</td>";
            echo "<td>$content</td>";
            echo "<td>$date</td>";
            echo "<td><a href='story_show.php?story_id=$story_id'>View</a></td>";
            echo "<td><a href='story_edit.php?story_id=$story_id'>Edit</a></td>";
            echo "<td><a href='story_delete.php?story_id=$story_id'>Delete</a></td>";
            echo "</tr>";
          }
        mysqli_close($kv_connect);
        //mysqli_connect($kv_connect);
        ?>
        <tr>
          <th><?php echo $confirm; ?></th>
        </tr>
      </table>
    </div>
  </main>
  <p></p>
<?php
require "includes/footer.php";
?>