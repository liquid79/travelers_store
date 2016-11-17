<?php
$page_title = "Product Admin - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";

$confirm = $_GET['confirm'];
$confirm = $confirm == "deleted" ? "Product entry successfully deleted" : "";
?>
<main>
  <h3>Administration -- Products</h3>
  <h5><a href="product_new.php">Add Product</a></h5>
  <table>
    <tr>
      <th>Product Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>Prod_th</th>
      <th>Image</th>
      <th>View</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
    $sql = "SELECT * FROM products";
    $result = $kv_connect->query($sql);
    while (list($prod_id, $prod_name, $prod_description, $prod_price, $prod_th, $prod_image) = $result->fetch_row()) {
      echo "<tr>";
      echo "<td>$prod_id</td>";
      echo "<td>$prod_name</td>";
      echo "<td>$prod_description</td>";
      echo "<td>$prod_price</td>";
      echo "<td><img src='images/$prod_th' /></td>";
      echo "<td>$prod_image</td>";
      echo "<td><a href='product_view.php?prod_id=$prod_id'>View</a></td>";
      echo "<td><a href='product_edit.php?prod_id=$prod_id'>Edit</a></td>";
      echo "<td><a href='product_delete.php?prod_id=$prod_id'>Delete</a></td>";
      echo "</tr>";
    };
    ?>
  </table>
  <h6><?php echo $confirm; ?></h6>
</main>
<?php
require "includes/footer.php";