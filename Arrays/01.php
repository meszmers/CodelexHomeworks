<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];
$originalNumberic = [];



//todo
echo "Original numeric array: ";

foreach ($numbers as $original) {
    echo "$original, ";
}
echo "\n";

//todo
echo "Sorted numeric array: ";

sort($numbers);
foreach ($numbers as $val) {
    echo "$val, ";
}
echo  "\n";

$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo "Original string array: ";

foreach ($words as $originalString) {
    echo "$originalString, ";
}
echo "\n";

//todo
echo "Sorted string array: ";

sort($words, SORT_STRING);
foreach ($words as $sorted) {
    echo "$sorted, ";
}
echo  "\n";