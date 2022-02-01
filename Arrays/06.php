<?php
do {
    $words = ["ammumu", "vex", "viego", "garen", "heimerdinger", "ahri", "zilen", "gragas", "akali", "vayne"];

    $wordsCount = count($words) - 1;
    $randomWord = rand(0, $wordsCount);

    $guessWord = $words[$randomWord];
    $wordExploded = str_split($guessWord);
    $howManyLetters = strlen($guessWord);
    $hiddenWord = array_fill(0, $howManyLetters, "_");
    $missedLetters = [];

    var_dump($hiddenWord);


    do {

        echo PHP_EOL;
        echo "-=-=-=-=-=-=-=-=-=\n";
        echo "GUESS THE WORD\n";
        echo "\n";
        echo "Word: ";

        foreach ($hiddenWord as $show) {
            echo "$show ";
        }

        echo PHP_EOL;
        echo "\n";
        echo "Misses:";
        foreach ($missedLetters as $letters) {
            echo $letters;
        }

        echo PHP_EOL;
        echo "\n";
        echo "Guess:";
            do {
            $input = readline("\n");
            $input = strtolower($input);
            echo  PHP_EOL;
            if(strlen($input) > 1) {
                echo "You are only allowed to chose one Letter\n";
            }


        } while (strlen($input) > 1);

        echo "-=-=-=-=-=-=-=-=-=\n";

        if (strstr($guessWord, $input) == false) {
            $missedLetters[] = $input;
        }

        foreach ($wordExploded as $key => $value) {
            if ($value == $input) {
                $hiddenWord[$key] = $value;
            }
        }

        $missedLettersCount = count($missedLetters);

        $loss = "n";

        if ($missedLettersCount >= 5) {
            $loss = "y";
        }

        if (implode("", $hiddenWord) == $guessWord) {
            break;
        }

    } while ($loss == "n");

    echo "-=-=-=-=-=-=-=-=-=\n";
    echo "GUESS THE WORD\n";
    echo "Word: ";

    foreach ($hiddenWord as $show) {
        echo "$show ";
    }

    echo PHP_EOL;
    echo "\n";
    echo "Misses:";
    foreach ($missedLetters as $letters) {
        echo $letters;
    }

    echo PHP_EOL;
    echo "\n";
    echo "Guess:$input\n";
    echo "-=-=-=-=-=-=-=-=-=\n";
    echo PHP_EOL;

    if (count($missedLetters) >= 5) {
        echo "You lost! It was $guessWord\n";
    } else echo "You got it! Good Job!\n";

$playAgain = readline("Play again? yes(y)/no(any)?");
} while ($playAgain == "y");

