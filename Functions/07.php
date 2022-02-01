<?php

//Imagine you own a gun store. Only certain guns can be purchased with license types.
//Create an object (person) that will be the requester to purchase a gun (object) Person object has a name, valid licenses (multiple) & cash.
//Guns are objects stored within an array. Each gun has license letter, price & name.
//Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

$person = new stdClass();
$person->name = "Ivar";
$person->surname = "Putin";
$person->license = ["M", "D", "C"];
$person->cash = 5000;

$guns = [
    [
        "name" => 'Glock',
        "license letter" => 'M',
        "price" => 230
    ],
    [
        "name" => 'AWP',
        "license letter" => 'H',
        "price" => 1400
    ],
    [
        "name" => 'AK-47',
        "license letter" => 'M',
        "price" => 770
    ]
];

$checkout = [];
$total = [];
$totalCost = [];

echo "Welcome to The Gunshop!\n";


    do {

        foreach ($guns as $index => $x) {
            echo "$index: {$x["name"]} : cost {$x["price"]} Euros\n";
        }

        $input = readline("What Gun Are you willing to buy?(0-2)\n");

        echo "\n";

        $selectedGun = $guns[$input];


        if ($input >= count($guns) || $input < 0) {
            echo "Error: Wrong input!\n";
        } else {$checkout[] = $selectedGun; $totalCost[] = $selectedGun["price"];}



echo "Your basket: \n";

foreach ($checkout as $x => $items) {
    echo "$x: {$items["name"]}  {$items["price"]}\n";

}
echo "---------------\n";



        echo "Total cost: " . array_sum($totalCost) . "\n";
        echo "Do you want to buy anything else?\n";
        echo PHP_EOL;
        echo " y: Yes\n c: Checkout\n e: Exit\n";

        $exitOrNot = readline("(y/c/e)");

        if ($exitOrNot == "e") {
            exit;
        } elseif ($exitOrNot == "c") {
            if (array_sum($totalCost) > $person->cash) {
                echo "You dont have enough money to buy all of this!\n";
                exit;
            } else echo "Thank you for your purchase! You have " . ($person->cash - array_sum($totalCost)) . " money left!\n";
            exit;
       }
    } while ($exitOrNot == "y");
