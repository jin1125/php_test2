<?php

// $members = [
//   'name' => 'honda',
//   'height' => 180,
//   'hobby' => 'soccer',
// ];

// foreach($members as $key => $member) {
//   echo $key;
//   echo $member;
//   echo '<br>';
// }

$members = [
  'honda' => [
    'height' => 180,
    'hobby' => 'soccer',
  ],
  'kagawa' => [
    'height' => 170,
    'hobby' => 'soccer',
  ],
];

foreach ($members as $member) {
  foreach ($member as $key => $m) {
    echo $key;
    echo $m;
    echo '<br>';
  }
}