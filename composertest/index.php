<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\TestController;
use Carbon\Carbon;

$app = new TestController;
$app->run();

echo Carbon::now();