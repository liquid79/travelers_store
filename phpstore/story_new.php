<?php
$page_title = "New Story - Traveler's Store";
ob_start();
require "includes/head.php";
require "includes/phpconnect.php";

$story_headline = $_POST['story_headline'];
$author = $_POST['author'];
$content = $_POST['content'];
$submit = $_POST['submit'];

if ($submit) {
  $sql = "INSERT INTO stories (story_id, story_headline, author, content, date) VALUES (NULL, '$story_headline', '$author', '$content', NULL)";
  $result = $kv_connect->query($sql);
//  print_r($sql);
  $new_story = $kv_connect->insert_id;
  echo "<br />";
//  print_r($new_story);
  mysqli_close($kv_connect);
  ob_clean();
  header("Location: story_show.php?story_id=$new_story");
//  echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";
}

$story_create = <<< STO
<form action='story_new.php' method="POST">
<p>
  <label>Headline</label><br />
  <input type='text' size="50" name='story_headline' value='$story_headline' placeholder='Story Headline' />
</p>
<p>
  <label>Author</label><br />
  <input type='text' size="50" name='author' value='$author' placeholder='Author' />
</p>
<p>
  <label>Story Content 1000 Characters</label><br />
  <textarea rows="25" cols="40" name="content" placeholder="Story Content">$content</textarea>
</p>
<p><input type="submit" name="submit" value="Submit Story" /></p>
</form>
STO;
echo $story_create;
require "includes/footer.php";