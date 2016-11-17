<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/store.css" />
  <title><?php echo $page_title; ?></title>
</head>
<body>
<div id="content">
  <header>
    <nav>
      <table id="nav_table">
        <tr>
          <th><a href="index.php">Home</a></th>
          <th><a href="news.php">News</a></th>
          <th><a href="shop.php">Shop</a></th>
          <th><a href="contact.php">Contact</a></th>
          <?php
          if ($_SESSION['user_email']) {
            echo "<th><a href='admin.php'>Admin</a></th>";
          } else {
            echo "<th><a href='#'></a></th>";
          }
          if ($_SESSION['user_email']) {
            echo '<th><a href="logout.php">Log Out</a></th>';
          } else {
            echo '<th><a href="login.php">Login</a></th>';
          }
          ?>
        </tr>
      </table>
    </nav>
  </header>