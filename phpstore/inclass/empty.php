<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="UTF-8">
    <title>Null and Empty</title>
  </head>
  <body>

  null = nothing, lack of any value --not an empty string; not 0 <br>
  empty= in php it is an empty string, null, 0, 0.0,  "0", false, array()<br><br>

  <?php
  $var1= null;
  $var2 = "";
  $var3 = "0";
  ?>

  var1 null? <?php echo is_null($var1); ?> <br>
  var2 null? <?php echo is_null($var2); ?> <br>
  var3 null? <?php echo is_null($var3); ?> <br> <br>  <!--should result in notice -->

  var1 set? <?php echo isset($var1); ?> <br>
  var2 set? <?php echo isset($var2); ?> <br>
  var3 set? <?php echo isset($var3); ?> <br> <br>

  var1 empty? <?php echo empty($var1); ?> <br>
  var2 empty? <?php echo empty($var2); ?> <br>
  var3 empty? <?php echo empty($var3); ?> <br> <br>




  </body>
</html>