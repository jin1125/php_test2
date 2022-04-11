<?php

  function validation ($req) {
    $errors = [];

    if(empty($req['your_name']) || 20 < mb_strlen($req['your_name']) ) {
      $errors[] = 'name';
    }

    if(empty($req['email']) || !filter_var($req['email'], FILTER_VALIDATE_EMAIL) ) {
      $errors[] = 'email';
    }

    if(!empty($req['url'])) {
      if(!filter_var($req['url'], FILTER_VALIDATE_URL) ) {
        $errors[] = 'url';
      }
    }

    if(empty($req['contact']) || 200 < mb_strlen($req['contact']) ) {
      $errors[] = 'contact';
    }

    if(empty($req['caution'])) {
      $errors[] = 'caution';
    }

    if(!isset($req['gender'])) {
      $errors[] = 'gender';
    }

    if(empty($req['age']) || 6 < $req['age']) {
      $errors[] = 'age';
    }

    return $errors;
  }