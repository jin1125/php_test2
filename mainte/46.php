<?php
 $contact = ".contact.dat";

 $contents =fopen($contact, 'a+');

 $text = 'add' . "\n";

 fwrite($contents, $text);

 fclose($contents);