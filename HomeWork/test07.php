<?php

//Modify the example program to compute the position of an object after falling for 10 seconds, outputting the position in meters.
//Note: The correct value is -490.5m.

//Acceleration (m/s2)
$a = -9.81;
//Time of free fall
$t = 10;

$value = 0.5 * $a * ($t * $t);

echo $value;