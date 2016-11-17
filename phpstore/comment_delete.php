<?php
ob_start();
require "includes/phpconnect.php";
$comment_id = $_GET['comment_id'];
$sql = "DELETE FROM comments WHERE prod_id=$prod_id";
$result = $kv_connect->query($sql);
mysqli_close($kv_connect);
ob_clean();
$now = time();
header("Location: product_admin.php");
ob_end_flush();