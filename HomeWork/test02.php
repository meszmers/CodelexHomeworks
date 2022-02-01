<?php

//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd, or “Even Number” otherwise.
//The program shall always print “bye!” before exiting.
echo "Check any number if it's Even or Odd!\n";
$number = readline("Enter the number here:");

if ($number % 2 == 0) {
    echo "Your number is Even!\n";
} else echo "Your number is Odd!\n";
sleep(5);
echo "bye!\n";
