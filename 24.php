<?php

$text = 'あいうえお';

echo mb_strlen($text);


$str = '文字列を置換します。';
echo str_replace('置換', 'ちかん', $str);

$str_2 = 'abcde,fghijk';

var_dump(explode(',', $str_2));

echo preg_match('/文字列/', $str);

echo mb_substr($text, 3);

$array = ['ringo', 'mikan'];

array_push($array, 'budo', 'nashi');

echo '<pre>';
var_dump($array);
echo '</pre>';