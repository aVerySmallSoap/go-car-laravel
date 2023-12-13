<?php

//test formula

$some_value = 10;
$now = date_create();
echo $now->format('Y-m-d H:i:s').'<br>';
$final = date_create('2023-12-14 12:0:0');
echo $final->format('Y-m-d H:i:s').'<br>';
$diff = date_diff($now, $final);
echo $diff->format('%r%d%H').'<br>';
echo round(
    ((strtotime($final->format('Y-m-d H:i:s')) - strtotime($now->format('Y-m-d H:i:s')))
    /3600) * $some_value);


// Extension hours
/*
 * Standard calculation for overextended rental payment:
 * lease_endDateTime - DateTimeNow * charge per hour
 *
 * Extension rental calculation: 200 car : 80 motor
 * abs(lease_endDateTime - ExtensionDateTime) + Car/Motor:Price
 * */
