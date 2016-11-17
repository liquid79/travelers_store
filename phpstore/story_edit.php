<?php
$page_title = "Edit Story - Traveler's Store";
ob_start();
require "includes/head.php";
require "includes/phpconnect.php";

$story_id = $_GET['story_id'];
$sql = "SELECT * FROM stories WHERE story_id=$story_id";
//echo $sql;
$result = $kv_connect->query($sql);
list($story_id,$story_headline,$author,$content,$date) = $result->fetch_row();

$submit = $_POST['submit'];
if ($submit) {
  $story_headline = $_POST['headline'];
  $author = $_POST['author'];
  $content = $_POST['content'];
  $sql = "UPDATE stories SET story_headline='$story_headline', author='$author', content='$content' WHERE story_id=$story_id;";
  $result = $kv_connect->query($sql);
  echo "<pre>";
  echo $sql;
  echo "<br/> UPDATE SQL: " . $result . "<br/>";
  echo $kv_connect->connect_error . "<br/>";
  print_r($_POST);
  echo "</pre>";
  ob_clean();
  header("Location: story_show.php?story_id=$story_id");
}

$story = <<< STO
<div class="row">
<form action='story_edit.php?story_id=$story_id' method="POST">
<p>
  <label>Headline</label>
  <input type='text' size="50" name='headline' value='$story_headline' placeholder='Story Headline' />
</p>
<p>
  <label>Author</label>
  <input type='text' size="50" name='author' value='$author' placeholder='Author' />
</p>
<p>
  <label>Story Content 1000 Characters</label><br />
  <textarea rows="25" cols="40" name="content" placeholder="Story Content">$content</textarea>
</p>
<p>
  <input type="submit" name="submit" value="Submit Story" />
</p>
</form>

<h3>$story_headline</h3>
<h5>$author</h5>
<p>$content</p>
<br />
<$date>
</div>
STO;
echo $story;
ob_end_flush();

require "includes/footer.php";

$story_headline = mysqli_real_escape_string($kv_connect, $story_headline);
$author = mysqli_real_escape_string($kv_connect, $author);
$content = mysqli_real_escape_string($kv_connect, $content);