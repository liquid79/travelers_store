<?php
session_start();
$_SESSION['user_email'] = $user_email;
//$name = $_SESSION['name'];
//echo $name;
session_destroy();
header("Location: index.php");