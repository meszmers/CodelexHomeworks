<?php

//Create a array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.

$person = [
    [
        "name" => "Marks",
        "surname" => "Mileika",
        "age" => 23,
    ],
    [
        "name" => "Donald",
        "surname" => "Trump",
        "age" => 17,
    ],
    [
        "name" => "Warren",
        "surname" => "Buffett",
        "age" => 76,
    ]
];

function oldenough(array $data) : bool
{
    return $data["age"] >= 18;
}

foreach ($person as $data) {
    if (oldenough($data) == true) {
        echo $data["name"] . " " .$data["surname"] . " is older than 18!\n";
    } else echo $data["name"] . " " .$data["surname"] . " is not older than 18!\n";
}


