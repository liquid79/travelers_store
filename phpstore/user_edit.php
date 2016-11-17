<?php
ob_start();
$page_title = "Edit User - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";

$user_id = $_GET['user_id'];
$sql = "SELECT * FROM users WHERE user_id=$user_id";
$result = $kv_connect->query($sql);
list($user_id, $user_firstname, $user_lastname, $user_email, $user_phash, $user_admin) = $result->fetch_row();

$submit = $_POST['submit'];
if ($submit) {
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_email = $_POST['user_email'];
  $password = $_POST['password'];
  $user_phash = password_hash($password, PASSWORD_DEFAULT);
  $user_admin = $_POST['user_admin'];

  $sql = "UPDATE users SET user_firstname='$user_firstname', user_lastname='$user_lastname', user_email='$user_email', user_phash='$user_phash', user_admin='$user_admin' WHERE user_id=$user_id";
  $result = $kv_connect->query($sql);

  ob_clean();
  header("Location: user_admin.php");
}
$edit_user = <<< EUS
<form method="POST" action="user_edit.php?user_id=$user_id">
<input type="text" name='user_firstname' value='$user_firstname' placeholder='First Name *' /><br />
<input type="text" name='user_lastname' value='$user_lastname' placeholder='Last Name *' /><br />
<input type="email" name='user_email' value='$user_email' placeholder='Email *' /><br />
<input type="password" name='password' value='$password' placeholder='Password *' /><br />
<input type="text" name='user_admin' value='$user_admin' placeholder='Admin?' /><br />
<input type="submit" name="submit" value="Update User" />
</form>
EUS;
echo $edit_user;
require "includes/footer.php";