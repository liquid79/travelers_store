<?php
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