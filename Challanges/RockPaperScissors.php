<?php

//Rock, Paper, Scissors ... ??? ... ???
//Spēlētāju skaits: 1
//Spēle notiek pret datoru
//Spēles notikumu "logs", kurā tiek saglabāts spēlētāja izvēle + pret ko cīnījās un kāds bija rezultāts.

$options = ["Rock", "Paper", "Scissors", "Lizard", "Spock"];
$win = "I win";
$aiWin = "Ai win";
$tie = "Tie!";

foreach ($options as $index => $show) {
    echo "$index: $show\n";
}

$input = readline("Enter: ");

$aiInput = rand(0, (count($options) - 1));

$combination = [$input, $aiInput];

echo "You choose $options[$input] and Ai choose $options[$aiInput].\n";

function checkWin(string $input, string $aiInput): bool {
    if ($input == $aiInput) {
        return false;
    } elseif ($input == 0 && ($aiInput == 2 || $aiInput == 3)) {
        return true;
    } elseif ($input == 1 && ($aiInput == 0 || $aiInput == 4)) {
        return true;
    } elseif ($input == 2 && ($aiInput == 1 || $aiInput == 3)) {
        return true;
    } elseif ($input == 3 && ($aiInput == 4 || $aiInput == 1)){
        return true;
    } elseif ($input == 4 && ($aiInput == 2 || $aiInput == 0)) {
        return true;
    }
    else return false;

}

$result = "";

if (!checkWin($input,$aiInput)) {
    if ($input == $aiInput) {
       $result = $tie;
    } else $result = $aiWin;
}

if(checkWin($input,$aiInput)) {
    $result = $win;
}

echo "$result\n";

file_put_contents("data.txt", $options[$input] . "," . $options[$aiInput] . "," . $result . "\n", FILE_APPEND);
