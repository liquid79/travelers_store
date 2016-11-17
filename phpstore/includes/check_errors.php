<?php
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