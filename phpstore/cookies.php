<?php
$name = 'Cookies';
$value = '000';
$expire = time() + (60 * 60 * 24 * 7);
setcookie($name, $value, $expire);

/*echo "<pre>";
print_r($_COOKIE);
echo "</pre>";*/

$demo = $_COOKIE['demo'];
echo $demo;