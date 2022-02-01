<?php

//Create a person object with name, surname and age.
//Create a function that will determine if the person has reached 18 years of age.
//Print out if the person has reached age of 18 or not.

$person = new stdClass();
$person->name = "Vladimir";
$person->surname = "White";
$person->age = 18;



function oldenough(stdClass $person) : bool {
 return $person->age >= 18;
}

if (oldenough($person) == true) {
    echo $person->name . " " . $person->surname . " is old enough!\n";
} else echo $person->name . " " . $person->surname . " is too young!\n";