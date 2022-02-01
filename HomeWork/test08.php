<?php

//Foo Corporation needs a program to calculate how much to pay their hourly employees.
//The US Department of Labor requires that employees get paid time and a half for any hours over 40 that they work in a single week.
//For example, if an employee works 45 hours, they get 5 hours of overtime, at 1.5 times their base pay.
//The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
//Foo Corp requires that an employee not work more than 60 hours in a week.

// An employee gets paid (hours worked) × (base pay), for each hour up to 40 hours.
//For every hour over 40, they get overtime = (base pay) × 1.5.
//The base pay must not be less than the minimum wage ($8.00 an hour). If it is, print an error.
//If the number of hours is greater than 60, print an error message.
//Write a method that takes the base pay and hours worked as parameters, and prints the total pay or an error.
// Write a main method that calls this method for each of these employees:

// Employee	Base Pay	Hours Worked
//Employee 1	$7.50	35
//Employee 2	$8.20	47
//Employee 3	$10.00	73

$employee = [
    [
      "name" => "Employee 1",
      "pay" => 7.50,
      "worked" => 35,
    ],
    [
        "name" => "Employee 2",
        "pay" => 8.20,
        "worked" => 47,
    ],
    [
        "name" => "Employee 3",
        "pay" => 10.00,
        "worked" => 73,
    ]
];

// My first code what changed pay if it was too low to minimal wage.

//foreach ($employee as $data) {
//    if($data["pay"] < 8) {
//      $data["pay"] =  8;
//    }
//if ($data["worked"] > 40) {
//    echo (($data["worked"] - 40) * ($data["pay"] * 1.5)) + (40 * $data["pay"]) . "\n";
//} else echo $data["worked"] * $data["pay"] . "\n";
//}

foreach ($employee as $data) {
    if($data["pay"] < 8) {
        $data["pay"] = "Error";
    } else if ($data["worked"] > 60) {
        $data["worked"] = "Error";
    }

    if ($data["worked"] === "Error" || $data["pay"] === "Error") {
        echo "Error" . "\n";
    } else if ( $data["worked"] > 40) {
        echo (($data["worked"] - 40) * ($data["pay"] * 1.5)) + (40 * $data["pay"]) . "\n";
    } else echo $data["worked"] * $data["pay"] . "\n";
}




