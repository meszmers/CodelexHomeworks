<?php

$personData = explode(',', file_get_contents('marks.txt'));

$person = new stdClass();
$person->name = $personData[0];
$person->money = $personData[1];

echo "Welcome to the Tecos! $person->name \n";

$name = [];
$price = [];
$basket = [];
$arrayData = [];
$totalCost = [];

$file = fopen('data.csv', 'r');
while (($data = fgetcsv($file)) !== FALSE) {
        $name[] = $data[0];
        $price[] = $data[1];

}
fclose($file);


do {

for($x = 0; $x < count($name); $x++) {
    echo array_search($name[$x], $name) . ": $name[$x] $price[$x] \n";
}


    $input = readline("What Are you willing to buy?\n");

    $selectedProduct = [$name[$input], $price[$input]];

    if ($input >= count($name) || $input < 0) {
        echo "Error: Wrong input!\n";
    } else $basket[] = $selectedProduct;

    echo "Your basket: \n";

   $totalCost[] = $selectedProduct[1];

    foreach ($basket as $x => $items) {
        echo "$x: $items[0]  $items[1]\n";
    }

    $totalCostSum = array_sum($totalCost);

    echo "---------------\n";
    echo "Total cost: " . $totalCostSum . PHP_EOL;


    echo "1: Add more product to basket\n";
    echo "2: Checkout\n";
    echo "3: Exit\n";

do {
    $exitCheckoutAdd = (int)readline("Enter: ");
    $again = 0;

    if ($exitCheckoutAdd >= 4) {
        echo "Wrong Input\n";
    } else $again = 1;

} while ($again == 0);

$moneyDiff = $person->money - array_sum($totalCost);

if ($exitCheckoutAdd == 2) {
    if ($person->money < $totalCostSum) {
        echo "You cant afford that! You are $moneyDiff shot!";
    } else {echo "Thank you for your purchase! You have $moneyDiff left!\n";

        $fp = fopen('marks.txt', 'w');
        fwrite($fp, $person->name . "," . $moneyDiff);
        fclose($fp);


        exit;}
}


} while ($exitCheckoutAdd !== 3);


