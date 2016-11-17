<?php
$page_title = "Comments - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";

//$comment_id = $_GET['comment_id'];
$sql = "SELECT * FROM comments";
$result = $kv_connect->query($sql);
if ($kv_connect->error) {
  $message = $kv_connect->error;
}
list($comment_id, $c_author, $content, $rate, $c_date, $prod_id) = $result->fetch_row();
echo "<p><a href='comment_new.php'>Add comment</a></p>";
$comment_show = <<< COM
<div class="row">
<h3>$comment_id</h3>
<p>$c_author</p>
<p>$content</p>
<p>$rate</p>
<p>$c_date</p>
<p>$prod_id</p>
</div>
COM;
echo $comment_show;
echo "<p><a href='comment_show.php?comment_id=$comment_id'>View</a> <a href='comment_update.php?comment_id=$comment_id'>Edit</a> <a href='comment_delete.php?comment_id=$comment_id'>Delete</a></p>";
mysqli_close($kv_connect);
?>

    <main>
      <?php
//      echo $comment_show;
//      mysqli_close($kv_connect);
//      echo "<h4>$comment_id</h4>";
//      echo "<p>$c_author</p>";
//      echo "<p>$content</p>";
//      echo "<p>$rate</p>";
//      echo "<p>$c_date</p>";
      ?>
    </main>

<?php
require "includes/footer.php";
?>