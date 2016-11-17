<?php
ob_start();
require "includes/phpconnect.php";
$user_id = $_GET['user_id'];
$sql = "DELETE FROM users WHERE user_id=$user_id";
$result = $kv_connect->query($sql);
mysqli_close($kv_connect);
ob_clean();
$now = time();
header("Location: user_admin.php?t=$now&confirm=deleted");