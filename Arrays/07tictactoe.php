<?php

// TicTacToe

$gameMode = explode(";", file_get_contents("board.txt"));

$gameSizeSorted = substr($gameMode[0],strpos($gameMode[0],'=') +1);
$gameCombSorted = substr($gameMode[1],strpos($gameMode[1],'=') +1);

$gameSize = explode(",", $gameSizeSorted);
$gameComb = explode("|", $gameCombSorted);



$combinations = [];

foreach ($gameComb as $index => $split) {
    $x = explode(",", $split);
    $combinations[] = $x;
}

foreach ($combinations as $index1 => $test) {
    foreach ($test as $index2 => $testAgain) {
        $combinations[$index1][$index2] = str_split($testAgain);
    }
}


$board = [];

$board = array_fill(0, $gameSize[0], array_fill(0, $gameSize[1], "-"));

$player1 = 'X';
$player2 = 'O';

$player1 = readline("Enter Symbol P1:");
$player2 = readline("Enter Symbol P2:");


$activePlayer = $player1;


function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item)
        {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }

    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}


while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {

    foreach ($board as $first) {
        foreach ($first as $second) {
            echo " $second ";
        }
        echo PHP_EOL;
    }

    $position = readline('Enter position: ');
    [$row, $column] = explode(',', $position);

    if ($board[$row][$column] !== '-') {
        echo 'Invalid position. its taken!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;


    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer))
    {
        foreach ($board as $first) {
            foreach ($first as $second) {
                echo " $second ";
            }
            echo PHP_EOL;
        }
        echo str_repeat("=", ($gameSize[0] * 3)) . "\n";
        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;