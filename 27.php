<?php
$postalCase = '123-4567';

function checkPostalCase($str) {
  var_dump($str);
  $replaced = str_replace('-', '', $str);
  var_dump($replaced);
  $length = strlen($replaced);
  var_dump($length);

  if($length === 7) {
    return true;
  };

  return false;
};

var_dump(checkPostalCase($postalCase));