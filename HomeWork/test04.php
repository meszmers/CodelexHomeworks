<?php

//Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10), as an int.
// Take note that it is the same as factorial of N.
$sum = 1;

for ($x = 1; $x <= 10; $x++) {
    $sum *= $x;
}
echo $sum . "\n";