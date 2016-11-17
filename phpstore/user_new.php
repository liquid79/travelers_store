<?php
ob_start();
$page_title = "Add New User - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";

$submit = $_POST['submit'];
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_email = $_POST['user_email'];
$password = $_POST['password'];
$user_phash = password_hash($password, PASSWORD_DEFAULT);
$user_admin = $_POST['user_admin'];

//$user_id = $_POST['user_id'];

if ($submit) {
  $sql = "INSERT INTO users (user_id, user_firstname, user_lastname, user_email, user_phash, user_admin) VALUES (NULL, '$user_firstname', '$user_lastname', '$user_email', '$user_phash', '$user_admin' )";
  $result = $kv_connect->query($sql);
  echo $sql;
  $new_user = $kv_connect->insert_id;
  print_r($_POST);
  mysqli_close($kv_connect);
  ob_clean();
  header("Location: user_admin.php");
}

$new_user_form = <<< NUF
<form method="POST" action="user_new.php">
<fieldset>
<legend>Add user</legend>
<input type="text" name='user_firstname' value='$user_firstname' placeholder="First Name *" />
<input type="text" name='user_lastname' value='$user_lastname' placeholder="Last Name *" />
<input type="email" name='user_email' value='$user_email' placeholder="Email *" />
<input type="password" name='password' value='$password' placeholder="Password *" />
<input type="text" name='user_admin' value='$user_admin' placeholder="Admin?" /><br />
<input type="submit" name="submit" value="Add user" />
</fieldset>
</form>
NUF;
echo $new_user_form;
?>
<a href="user_admin.php">Go to User admin</a>
<?php
require "includes/footer.php";