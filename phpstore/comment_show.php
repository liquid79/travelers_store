<?php
$page_title = "View Comment - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";

if ($kv_connect->error) {
  $message = $kv_connect->error;
}
$comment_id = $_GET['comment_id'];
$sql = "SELECT * FROM comments";
$result = $kv_connect->query($sql);
//list($comment_id, $c_author, $content, $rate, $c_date, $prod_id) = $result->fetch_row();
echo '<div>';
while (list($comment_id, $c_author, $content, $rate, $c_date, $prod_id) = $result->fetch_row()) {
  echo "<h4>$c_author</h4>";
  echo "<p>$content</p>";
  echo "<p>$c_date</p>";
}
echo "</div>";

echo '<div>';
$new_comment = <<< NC
<h1>Any comments?</h1>
<table>
  <form method="POST" action="comment_new.php">
    <input type="hidden" name="comment_id" value="$comment_id" /><br />
    <input type="text" name="c_author" value="$c_author" /><br />
    <textarea name="content" rows="5" cols="30">$content</textarea><br />
    <select name="rate">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select><br />
    <input type="submit" name="submit" value="Submit" />
  </form>
</table>
NC;
echo $new_comment;

echo "</div>";
mysqli_close($kv_connect);
require "includes/footer.php";