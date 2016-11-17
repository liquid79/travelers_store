<?php
$page_title = "View Story - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";

$story_id = $_GET['story_id'];
$sql = "SELECT * FROM stories WHERE story_id=$story_id";
$result = $kv_connect->query($sql);
if ($kv_connect->error) {
  $message = $kv_connect->error;
}
list($story_id, $story_headline, $author, $content, $date) = $result->fetch_row();

$story = <<< STO
<h3>$story_headline</h3>
<h5>$author</h5>
<p>$content</p>
<p>$date</p>
<p><a href="admin.php">Back to Admin</a></p>
STO;

echo $story;
mysqli_close($kv_connect);
require "includes/footer.php";