<?php

$height = 91;

if($height === 90) {
  echo '90';
} else {
  echo 'none';
}

$signal = 'blue';

if ($signal === 'red') {
  echo 'stop';
} elseif ($signal === 'yellow') {
  echo 'yellow';
} else {
  echo 'go';
}

$speed = 100;

if ($signal === 'blue') {
  if ($speed >= 90) {
    echo 'out';
  }
}

$test = '1';

if (empty($test)) {
  echo 'empty';
} else {
  echo 'no empty';
}

$math = 85;

$comment = $math > 80 ? 'good' : 'not good';

echo $comment;