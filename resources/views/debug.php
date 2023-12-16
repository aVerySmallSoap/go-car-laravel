<?php
date_default_timezone_set('Asia/Manila');

//test formula

$some_value = 10;
$now = date_create();
echo 'Now: '.$now->format('Y-m-d h:i:s A').'<br>';
$final = date_create('2023-12-11 22:00:00');
echo 'End: '.$final->format('Y-m-d h:i:s A').'<br>';
$calc = round(
    ((strtotime($final->format('Y-m-d H:i:s')) - strtotime($now->format('Y-m-d H:i:s')))
        /3600));
echo 'Hours: '.$calc.'<br>';
echo 'Debt: '.((($calc < 0) ? abs($calc):0) * 25);


// Extension hours
/*
 * Standard calculation for overextended rental payment:
 * lease_endDateTime - DateTimeNow * charge per hour
 *
 * Extension rental calculation: 200 car : 80 motor
 * abs(lease_endDateTime - ExtensionDateTime) + Car/Motor:Price
 * */
