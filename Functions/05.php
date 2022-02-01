<?php
//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
//Create a secondary array with shipping costs per weight.
//Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
//Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$fruits = [
    [
        "name" => "bannanas",
        "weight" => 8,
    ],
    [
        "name" => "apples",
        "weight" => 20,
    ],
    [
        "name" => "peaches",
        "weight" => 12,
    ],
];

$cost = ["highPrice" => 2, "lowPrice" => 1];

function ifOverTen(array $x): bool{
    return $x["weight"] >= 10;
}

foreach ($fruits as $info) {
    if (ifOverTen($info) == true) {
        echo "{$info["name"]} : Shipping costs {$cost["highPrice"]} Euros\n";
    } else echo "{$info["name"]} : Shipping costs {$cost["lowPrice"]} Euro\n";
}





