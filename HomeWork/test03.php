<?php

//Write a program to produce the sum of 1, 2, 3, ..., to 100.
//Store 1 and 100 in variables lower bound and upper bound, so that we can change their values easily.
//Also compute and display the average. The output shall look like:

//The sum of 1 to 100 is 5050
//The average is 50.5

$num1 = 1;
$num2 = 100;
$sum = 0;
$howmanynumbers = 0;

for ($x = $num1; $x <= $num2; $x++) {
    $sum += $x;
    $howmanynumbers = $x;
}

echo "This is sum $sum\n";
echo "This is avarage" . " " . $sum / $howmanynumbers . "!\n";

