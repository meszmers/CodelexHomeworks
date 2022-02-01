<?php

//Write a program that picks a random number from 1-100. Give the user a chance to guess it. If they get it right, tell them so.
//If their guess is higher than the number, say "Too high." If their guess is lower than the number, say "Too low." Then quit.
//(They don't get any more guesses for now.)

$min = 1;
$max = 100;
$userinput = readline( 'Guess: ');
$ranodmnumber = rand($min, $max);

if ($userinput == $ranodmnumber) {
    echo "You guessed it!  What are the odds?!?\n";
} elseif ($userinput > $ranodmnumber) {
    echo "Sorry, you are too high. I was thinking  " . $ranodmnumber . ".\n";
} elseif ($userinput < $ranodmnumber) {
    echo "Sorry, you are too low. I was thinking of " . $ranodmnumber . ".\n";
} else return;
