<?php
$myname = "Kain";
$myName = "Kain";
$myBook = 'Kain\'s World';
$myAge = 22;
$price = 1050.05;

$fullName = $myname . ' ' . $myName;
echo $fullName;

//comment
#comment
/*comment*/

/*echo $myname;
echo "<br />";
echo 2 + 4 . " " . $myName;
print $myName;*/


/*echo '$myname';

echo $myBook;

echo 'this is my book title "$myBook"';

echo 'Kain\'s World';*/

$message = 'Name: ' . $fullName;
$message .= "<br />";
$message .= 'My favorite book: ' . $myBook;
echo $message;

?>

<p>The name of our book: "<?php echo $myBook; ?>".</p>