<?php

//Write a program that calculates and displays a person's body mass index (BMI).
//A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
// Where weight is measured in pounds and height is measured in inches.
// Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
// A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
// If the BMI is less than 18.5, the person is considered underweight.
// If the BMI value is greater than 25, the person is considered overweight.
//
//Your program must accept metric units.

$kg = readline("Weight in Kg:");
$cm = readline("Height in Cm:");

$pounds = ceil($kg / 0.45359237);
$inches = ceil($cm * 0.39370);

$bmi = ($pounds * 703) / pow($inches, 2);

if ($bmi > 18.5 && $bmi < 25) {
    echo "You have optimal weight\n";
}else if ($bmi < 18.5) {
    echo "You are underweight\n";
} else if ($bmi > 25) {
    echo "You are overweight\n";
}
