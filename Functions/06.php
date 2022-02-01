<?php

//Create an non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
//Create a for loop that iterates non-associative array using php in-built function that determines count of elements in the array.
//Create a function that doubles the integer number.
//Within the loop using php in-built function print out the double of the number value (using your custom function).

$arrlist = [5, 50, 32, 40.5, "Beer"];

for ($x = 0; $x < count($arrlist); $x++) {
    echo timeItUp($arrlist[$x]) . "\n";
}

function timeItUP($a) {
   if (is_integer($a)) {
      $a = $a * 2;
   }
   return $a;
}



