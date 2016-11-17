<?php
ob_start();
require "includes/phpconnect.php";
$story_id=$_GET['story_id'];
$sql = "DELETE FROM stories WHERE story_id=$story_id";
$result = $kv_connect->query($sql);
mysqli_close($kv_connect);
ob_clean();
$now = time();
header("Location: admin.php?t=$now&confirm=deleted");
ob_end_flush();