<?php
 $contact = ".contact.dat";

 $file = file_get_contents($contact);

//  echo $file;

$text = 'テスト' . "\n";

// file_put_contents($contact, $text, FILE_APPEND);