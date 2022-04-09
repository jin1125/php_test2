<?php

function test() {
  echo 'test';
}

test();

$comme = 'comment2';

function get($s) {
  echo $s;
}

get($comme);

function getNum() {
  return 5;
}

$num = getNum();

echo($num);

function sumPrice ($int1, $int2) {
  $int3 = $int1 + $int2;
  return $int3;
}

$total = sumPrice(3, 5);
echo $total;