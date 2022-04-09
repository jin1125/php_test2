<?php
$global = 'global';

function checkScope ($str) {
  $local = 'local';
  // global $glocal;
  echo $str;
}

echo $global;
checkScope($global);