<?php
ob_start();
require "includes/phpconnect.php";
$prod_id = $_GET['prod_id'];
$sql = "DELETE FROM products WHERE prod_id=$prod_id";
$result = $kv_connect->query($sql);
mysqli_close($kv_connect);
ob_clean();
$now = time();
ob_end_flush();