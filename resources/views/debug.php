<?php
date_default_timezone_set('Asia/Manila');

$now = date_create()->format('Y-m-d H:i:s');
$setDate = date_create('2023-12-25 23:44:00')->format('Y-m-d H:i:s');
echo $now.'<br>';
echo $setDate.'<br>';
var_dump($setDate < $now);
