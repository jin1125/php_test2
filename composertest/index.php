<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\TestController;
use Carbon\Carbon;

$app = new TestController;
$app->run();

echo Carbon::now()->format(‘今日はY年m月d日だよ！’);