<?php
$page_title = "Product Details - Traveler's Store";
require "includes/head.php";
$name = $_GET[nameText];
$comments = $_GET[commentText];
?>
<main>
  <?php
  $prod_id = $_GET['prod_id'];
  $sql = "SELECT * FROM products WHERE prod_id=$prod_id";
  $result = $kv_connect->query($sql);
  if ($kv_connect->error) {
    $message = $kv_connect->error;
  }
  list($prod_id, $prod_name, $prod_description, $prod_price, $prod_th, $prod_image) = $result->fetch_row();

  $prod_details = <<< PRD
  <div>
  <h3>$prod_name</h3>
  <p>$prod_description</p>
  <h4>Price: $prod_price</h4>
  <h4>Images:</h4>
  <p>Thumbnail:<br /><img src="$prod_th" alt="prod_th" /></p>
  <p>Image:<br /><img src="$prod_image" alt="prod_image" /></p>
  </div>
PRD;
  echo $prod_details;
  ?>
  <!--<table id="product_table">
    <tr>
      <td><img src="images/Jacket.jpg" alt="Item" class="store_item" /></td>
      <td>(Product)<br />Lacinia tempor mi in mi, dictum nunc tincidunt eget a eveniet, nulla placerat dolor donec ut.</td>
    </tr>
    <tr>
      <td>Comments<br />(Date) - (User) - (Rating in Stars)<br />Mi tellus in eros odio nunc ipsum.</td>
      <td>
        <form>
          <fieldset>
            <label>Rating:</label>
            <select>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <p><label>Name:</label><input type="text" name="nameText" value="<?php echo $name; ?>" /></p>
            <p><input type="text" name="commentText" class="comments" value="<?php echo $comments; ?>" /></p>
            <p><input type="submit" value="Submit" /></p>
          </fieldset>
        </form>
      </td>
    </tr>
  </table>-->
</main>
<?php
require "includes/footer.php";
?>