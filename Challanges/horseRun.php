<?php

$players = 6;


function finished(array $pos): bool
{
    foreach ($pos as $value) {
        if (end($value) !== "Q") {
            return false;
        }
    }
    return true;
}

$menu = 1;

while ($menu != 3) {

    $ignore = [];
    $winners = [];
    $run = array_fill(0, $players, array_fill(0, 30, "-"));

    for ($x = 0; $x < $players; $x++) {
        $run[$x][0] = "Q";
    }

    echo PHP_EOL;
    foreach ($run as $index => $see) {
        echo "Horse [" . $index . "]";
        foreach ($see as $seeMore) {
            echo " $seeMore";
        }
        echo PHP_EOL;
    }
    $horse = '';
    $bet = 0;
    $inputExit = 0;

    while ($inputExit == 0) {
        $horse = readline("Horse: Enter: ");
        $bet = readline("Enter amount: ");
        if ($horse > 5 || $horse < 0 ) {
            echo "Wrong Horse Input: \n";
            continue;
        }
            $inputExit = 1;
        }


    foreach ($run as $index => $see) {
        echo "Horse [" . $index . "]";
        foreach ($see as $seeMore) {
            echo " $seeMore";
        }
        echo PHP_EOL;
    }

    echo PHP_EOL;

    sleep(1);

    while (!finished($run)) {


        sleep(1);

// Each move placements
        foreach ($run as $ind => $action) {

            $x = array_search("Q", $action);

            if ($x == 29) {
                continue;
            }
            if ($x == 27) {
                $howFarNextMove = $x + rand(1, 2);
            } else if ($x == 28) {
                $howFarNextMove = $x + 1;
            } else {
                $howFarNextMove = $x + rand(1, 3);
            }
            $run[$ind][$howFarNextMove] = "Q";
            $run[$ind][$x] = "-";
        }

        $finishLine = [];

        foreach ($run as $index => $value) {

            if (in_array($index, $ignore) !== false) {
                continue;
            }
            if (end($value) == "Q") {
                $ignore[] = $index;
                $finishLine[] = $index;
            }
        }

        if (!empty($finishLine)) {
            $winners[] = $finishLine;
        }

        echo PHP_EOL;


        foreach ($run as $index => $see) {
            echo "Horse [" . $index . "]";
            foreach ($see as $seeMore) {
                echo " $seeMore";
            }
            echo PHP_EOL;
        }

    }
    echo "=======================================================================\n";
    echo "First Place";
    foreach ($winners[0] as $win) {
        echo " Horse [$win] ";
    }
    echo PHP_EOL;
    echo "Second Place";
    if (count($winners) - 1 >= 2) {
        foreach ($winners[1] as $winTwo) {
            echo " Horse [$winTwo] ";
        }
    }
    echo PHP_EOL;
    echo "Third Place";
    if (count($winners) - 1 >= 3) {
        foreach ($winners[2] as $winThree) {
            echo " Horse [$winThree] ";
        }
    }
    echo "\n=======================================================================\n";

    $winAmount = $bet * 3;
    if (in_array($horse, $winners[0])) {
        echo "You win $winAmount\n";
    } else echo "You lost $bet\n";
    $menu = readline("(any) Repeat | (3) Exit \n");
}
