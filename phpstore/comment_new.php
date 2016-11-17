<?php
ob_start();
require "includes/head.php";
require "includes/phpconnect.php";

$c_author = $_POST['c_author'];
$content = $_POST['content'];
$rate = $_POST['rating'];
$prod_id = $_POST['prod_id'];
$submit = $_POST['submit'];

if($submit) {
  $sql = "INSERT INTO comments VALUES (DEFAULT , '$c_author', '$content', '$rate', CURRENT_TIMESTAMP, '$prod_id')";
  $result = $kv_connect->query($sql);
};

//('comment_id', 'c_author', 'content', 'rate', 'c_date', 'prod_id')
//echo $sql;
printf("Error: %s\n", $kv_connect->error);
//$comment_id = $_GET['comment_id'];
//$c_author = $_GET['c_author'];
//$content = $_GET['content'];
//$rate = $_GET['rate'];
//$submit = $_GET['submit'];
//$sql = "INSERT INTO comments ($comment_id, $c_author, $content, $rate, $c_date, $prod_id)";
//$result = $kv_connect->query($sql);
//while (list($comment_id, $c_author, $content, $rate, $c_date, $prod_id) = $result->fetch_row()) {
//  echo "<h2>".$rate."</h2>";
//  $count = 0;
//  while ($count < $rate) {
//    echo "<img src='images/star.png' alt='star' />";
//    $count += 1;
//  }
//  echo stars_string($rate);
//  echo "<br />";
//  echo "$c_date<br />";
//  echo "$c_author<br />";
//  echo "$content<br />";
//  echo "<hr />";
//}
//if ($submit) {
//  $sql = "INSERT INTO comments ($comment_id, $c_author, $content, $rate, $c_date, $prod_id) VALUES (NULL, '$c_author', '$content', '$rate', NULL, '$prod_id')";
//  $result = $kv_connect->query($sql);
//}
//if ($rate > 5) {
//  $rate = 5;
//}
//if ($rate < 1) {
//  $rate = 1;
//}
//echo $sql;
//list($comment_id, $c_author, $content, $rate, $c_date, $prod_id) = $result->fetch_row();
ob_clean();
header("Location: product_view.php?prod_id=$prod_id");