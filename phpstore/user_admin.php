<?php
$page_title = "User Admin - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";
//list($user_id, $user_firstName, $user_lastName, $user_email, $user_phash, $user_admin) = $result->fetch_row();
//$result = $kv_connect->query($sql);

$confirm = $_GET['confirm'];
if ($confirm == "deleted") {
  $confirm = "User deleted";
} else {
  $confirm = "";
}
?>
  <main>
    <h6><?php echo $confirm; ?></h6>
    <h5>Admin Users</h5>
    <h5><a href="user_new.php">Add user</a></h5>
    <table>
      <tr>
        <th>User ID</th>
        <th>User First name</th>
        <th>User Last name</th>
        <th>User email</th>
        <th>User phash</th>
        <th>User Admin</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
        <?php
        $sql = "SELECT * FROM users ORDER BY user_lastname ASC";
        $result = $kv_connect->query($sql);
        while (list($user_id, $user_firstname, $user_lastname, $user_email, $user_phash, $user_admin) = $result->fetch_row()) {
          echo "<tr>";
          echo "<td>$user_id</td>";
          echo "<td>$user_firstname</td>";
          echo "<td>$user_lastname</td>";
          echo "<td>$user_email</td>";
          echo "<td>$user_phash</td>";
          echo "<td>$user_admin</td>";
          echo "<td><a href='user_edit.php?user_id=$user_id'>Edit</a></td>";
          echo "<td><a href='user_delete.php?user_id=$user_id'>Delete</a></td>";
          echo "</tr>";
        }
        //if (isset($_POST['submit'])) {
        //  $user_id = $_POST['user_id'];
        //  $user_firstName = $_POST['user_firstName'];
        //  $user_lastName = $_POST['user_lastName'];
        //  $user_email = $_POST['user_email'];
        //  //$user_phash = password_hash();
        //  $user_admin = $_POST['user_admin'];
        //  $submit = $_POST['submit'];
        //}
        ?>
    </table>
    <?php
//    if (isset($_POST['submit'])) {
//      $user_id = $_POST['user_id'];
//      $user_firstName = $_POST['user_firstName'];
//      $user_lastName = $_POST['user_lastName'];
//      $user_email = $_POST['user_email'];
//      $user_password = $_POST['user_password'];
//      //$user_phash = password_hash();
//      $user_admin = $_POST['user_admin'];
//      $submit = $_POST['submit'];
//
//      $sql = "INSERT INTO users ($user_id, $user_firstName, $user_lastName, $user_email, $user_phash, $user_admin) VALUES (NULL, '$user_firstName', '$user_lastName', '$user_email', '$user_phash', '$user_admin')";
//      $result = $kv_connect->query($sql);
//    }
//    echo $sql;
//
//    $user_table = <<< NU
//    <form>
//      <fieldset>
//        <legend>Add new user</legend>
//        <input type="text" name='user_firstName' value='$user_firstName' placeholder="First Name" required />
//        <input type="text" name='user_lastName' value='$user_lastName' placeholder="Last Name" required />
//        <input type="email" name='user_email' value='$user_email' placeholder="Email" required />
//        <input type="password" name='user_password' value='$user_password' placeholder="Password" required />
//        <input type="text" name='user_admin' value='$user_admin' placeholder="Admin?" />
//        <input type="submit" name="submit" value="Add user" />
//      </fieldset>
//    </form>
//NU;
//    echo $user_table;
    ?>
  </main>
<?php
require "includes/footer.php";
?>