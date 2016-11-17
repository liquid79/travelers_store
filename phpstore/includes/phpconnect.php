<?php
$message = "";
$kv_connect = new mysqli('phpprodkainv.black-sundown.com','kvincent','sundownblackout','phpprodkainv');
if ($kv_connect->connect_error) {
  $message = $kv_connect->connect_error;
  die( $message );
} else {
  $message = 'kv_connect connected';
}
echo $message;
/*
  $tableNam = stories
  story_id PQ
  author
*/