<?php
$page_title = "Edit Product - Traveler's Store";
ob_start();
require "includes/head.php";
require "includes/phpconnect.php";

$prod_id = $_POST['prod_id'];
$prod_name = $_POST['prod_name'];
$prod_description = $_POST['prod_description'];
$prod_price = $_POST['prod_price'];
$prod_th = $_POST['prod_th'];
$prod_image = $_POST['prod_image'];
$submit = $_POST['submit'];

if ($submit) {
  $sql = "UPDATE products SET prod_name='$prod_name', prod_description='$prod_description', prod_price='$prod_price', prod_th='$prod_th', prod_image='$prod_image' WHERE prod_id=$prod_id";
  $result = $kv_connect->query($sql);
  mysqli_close($kv_connect);
  ob_clean();
  header("Location: product_view.php?prod_id=$prod_id");
}
ob_end_flush();
//header("Location: ");

$product_create = <<< PRO
<form action='product_new.php' method="POST">
  <input type="hidden" name='prod_id' />
  <label>Product name:</label><br />
  <input type="text" name='prod_name' value='$prod_name' /><br />
  <label>Description:</label><br />
  <textarea name='prod_description' row="25" cols="40" value='$prod_description'></textarea><br />
  <label>Price:</label><br />
  <input type="text" name='prod_price' value='$prod_price' /><br />
  <label>Image (thumbnail):</label><br />
  <input type='text' name="prod_th" value='$prod_th' /><br />
  <label>Image (normal)</label><br />
  <input type='text' name='prod_image' value='$prod_image' /><br />
  <input type="submit" name="submit" value="Submit" />
</form>
PRO;
echo $product_create;
require "includes/footer.php";