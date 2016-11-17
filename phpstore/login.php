<?php
ob_start();
session_start();
$page_title = "Log In - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";

$user_email = $_POST['user_email'];
$password = $_POST['password'];
$submit = $_POST['submit'];
//  $password = hash("", $password);
//  echo $password;
if ($submit) {
  $sql = "SELECT * FROM users WHERE user_email='$user_email'";
  $result = $kv_connect->query($sql);
  list($user_id, $user_firstname, $user_lastname, $user_email, $user_phash, $user_admin) = $result->fetch_row();
  if ($user_email) {
    $logIn_message = "";
    if (password_verify($password, $user_phash)) {
      $logIn_message = "You're logged in.";
      //header("Location: admin.php");
    } else {
      $logIn_message = "Invalid login.";
    }
  }
}
$_SESSION['user_email'] = $user_email;

$login_form = <<< LIF
<form method="POST" action="login.php">
<fieldset>
<legend>Sign In</legend>
  <table>
    <tr>
      <td>
        <label>Username:</label><br />
        <input type="text" name="user_email" tabindex="1" value="$user_email" placeholder="Username *" />
      </td>
    </tr>
    <tr>
      <td>
        <label>Password:</label><br />
        <input type="password" name="password" tabindex="1" value="$password" placeholder="Password *" />
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="submit" value="Sign In" />
      </td>
    </tr>
  </table>
</fieldset>
</form>
<p>Username is your email.</p>
LIF;
echo $login_form;
echo $logIn_message;
//ob_clean();
require "includes/footer.php";