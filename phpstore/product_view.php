<?php
$page_title = "View Product - Traveler's Store";
require "includes/head.php";
require "includes/phpconnect.php";

$prod_id = $_GET['prod_id'];
$sql = "SELECT AVG(rate) FROM comments WHERE prod_id = $prod_id";
$result = $kv_connect->query($sql);
$avg_rating = $result->fetch_row()[0];
$sql = "SELECT * FROM products WHERE prod_id=$prod_id";
list($prodId, $prod_name, $prod_description, $prod_price, $prod_th, $prod_image) = $result->fetch_row();

//display rating stars
function stars_rate($avg_rating) {
  $stars = "";
  $count = 0;
  while($count < $avg_rating){
    //$stars .= "<img src='images/star.png' alt='star' />";
    $stars .= '<img src="images/star.png" alt="star" />';
    $count += 1;
  };
  return($stars);
};
$stars = stars_rate($avg_rating);

//if ($rate > 5) {
//  $rate = 5;
//}
//if ($rate < 1) {
//  $rate = 1;
//}
$product = <<< PRO
<hr />
<img src='images/$prod_image' />
<h4>$prod_name</h4>
<p>Average Rating: $stars</p>
<p>$prod_description</p>
<h5>$prod_price</h5>
<h5>Buy Now</h5>
<a href="#">Add to cart</a>
<hr />
PRO;
echo $product;
$sql = "SELECT * FROM comments WHERE prod_id=$prod_id";
$result = $kv_connect->query($sql);
while(list($comment_id, $c_author, $content, $rate, $c_date, $prod_id) = $result->fetch_row()) {
  echo stars_rate($rate);
  echo "<br />";
  echo "$c_date<br />";
  echo "$c_author<br />";
  echo "$content<br />";
  echo "<table>";
  echo "<tr>";
  echo "<td><a href='comment_show.php'>View</a></td>";
  echo "<td><a href='comment_update.php'>Edit</a></td>";
  echo "<td><a href='comment_delete.php'>Delete</a></td>";
  echo "</tr>";
  echo "</table>";
  echo "<hr />";
};

$prod_id = $_GET['prod_id'];
$new_comment = <<< NCM
<form method='POST' action='comment_new.php'>
  <input type="hidden" name="prod_id" value="$prod_id" /><br />
  <label>Author:</label><br />
  <input type="text" name="c_author" value="$c_author" /><br />
  <label>Comment:</label><br />
  <textarea name='content' row='5' cols='30'>$content</textarea><br />
  <label>Rating:</label><br />
  <select name='rating'>
    <option value='1'>1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
    <option value='4'>4</option>
    <option value='5'>5</option>
  </select><br />
  <input type='submit' name='submit' value="Submit Comment" />
</form>
NCM;
echo $new_comment;
require "includes/footer.php";