<?php
$page_title = "Contact - Traveler's Store";
require "includes/head.php";

$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$eMail = $_POST['emailText'];
$phoneNum = $_POST['phoneText'];
$contact = $_POST['contactRadio'];
$newsletter = $_POST['newsletter'];
$comments = $_POST['commentText'];
$items = $_POST['items'];
$submit = $_POST['submit'];

//create select list
$items = array('Gloves','Jackets','Boots','Skates','Helmets','Shoes','Hats','Coats');
$selection = $_POST['items'];
$select = selectList('items',$items,$selection);

//check fields in error array
$errors = [];
if (!isset($fName) || $fName === "") {
  $errors['firstName'] = "First name required!";
}
if (!isset($lName) || $lName === "") {
  $errors['lastName'] = "Last name required!";
}
if (!isset($eMail) || $eMail === "") {
  $errors['emailText'] = "Email required!";
}
if (!isset($phoneNum) || $phoneNum === "") {
  $errors['phoneText'] = "Phone number required!";
}

//make checkboxes and buttons sticky
$emailRadio = $contact == "email" ? 'checked="checked"' : "";
$phoneRadio = $contact == "phone" ? 'checked="checked"' : "";
$news_check = $newsletter == "news" ? 'checked="checked"' : "";

//select list
function selectList ($item, array $i, $selection) {
  $select = '<select name="' . $item . '">';
  foreach ($i as $key => $value) {
    $select .= "<option ";
    if ($selection == $value) {
      $select .= ' selected="selected"';
    }
    $select .= ">" . $value . "</option>";
  }
  $select .= "</select>";
  return $select;
}

//form errors
function formError($errors=array()) {
  $output = "";
  if (!empty($errors)) {
    $output .= "<div class=\"error\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach ($errors as $key => $error) {
      $output .= "<li>{$error}</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}
?>
<main>
<?php
$form = <<<FRM
  <form name="4" method="POST" action="contact.php">
    <fieldset>
      <legend>Contact Info</legend>
      <table>
        <tr>
          <td>
            <label>First Name</label><br />
            <input type="text" name="firstName" class="nameText" placeholder="First Name *" value="$fName" />
          </td>
          <td>
            <label>Last Name</label><br />
            <input type="text" name="lastName" class="nameText" placeholder="Last Name *" value="$lName" />
          </td>
        </tr>
        <tr>
          <td>
            <label>Email</label><br />
            <input type="email" name="emailText" class="nameText" placeholder="Email *" value="$eMail" />
          </td>
          <td>
            <label>Phone</label><br />
            <input type="tel" name="phoneText" class="nameText" placeholder="Phone Number *" value="$phoneNum" />
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <label for="contactRadio">I prefer to be contacted by:</label><br />
            <input type="radio" name="contactRadio" value="email" $emailRadio /><label>Email</label><br />
            <input type="radio" name="contactRadio" value="phone" $phoneRadio /><label>Phone</label>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="checkbox" name="newsletter" value="news" $news_check /><label>Receive Newsletter</label>
          </td>
        </tr>
        <tr>
          <td colspan="2"><label for="items">I would like information about:</label><br />
            $select
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <label>Comments:</label><br />
            <textarea class="comments" name="commentText" rows="6">$comments</textarea>
          </td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="submit" value="Submit" $submit /></td>
        </tr>
      </table>
    </fieldset>
  </form>
FRM;
echo $form;
echo "<br />";
  if (isset($_POST['submit']) )
    echo 'Form was submitted';
  echo "<br /><br />";
  if (isset($submit)) {
    echo formError($errors);
  }
  print_r($_POST);

$form_input = <<< FIP
<div>
  <h3>Form Results:</h3>
  First Name: $fName<br />
  Last Name: $lName<br />
  Email: $eMail<br />
  Phone: $phoneNum<br />
  Contact Method: $contact<br />
  Receive Newsletter: $news_check<br />
  Item: $selection<br />
  Comment: $comments</p>
</div>
FIP;
echo $form_input;

if (isset($submit) && ($errors)) {
  echo formError($errors);
} else {
  $to = $eMail;
  $subject = "Thank you for you message. " . strftime("%T", time());
  $message = "Here is your form input:\n\r";
  $message .= "Name: $fName $lName\n\r";
  $message .= "Email: $eMail\n\r";
  $message .= "Phone: $phoneNum\n\r";
  $message .= "Comment:\n\r";
  $message .= '"' . wordwrap($comments, 70) . '"';
  $result = mail($to,$subject,$message);
  echo $result ? 'Email Sent' : "Email Failed";
}
?>
</main>
<?php
require "includes/footer.php";