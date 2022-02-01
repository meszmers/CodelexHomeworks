<?php

//Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.

$num1 = readline("Number 1: ");
$num2 = readline("Number 2: ");

if ($num1 == 15 || $num2 == 15) {
    echo "true";
} elseif ($num1 + $num2 == 15) {
    echo "true";
} elseif ($num1 - $num2 == 15 || $num2 - $num1 == 15) {
    echo "true";
} else echo "false";


