<?php

echo PHP_EOL;

$boardRow = 4;
$boardColumn = 3;

$boardSymbols = ["J","Q","Κ","A","7"];

$board = [];

$yourMoney = 5.0;

$perSpin = 1;
$perSpinOptions = [0.2, 0.4, 0.6, 0.8, 1.0, 2.0, 4.0, 6.0, 8.0, 10.0, 12.0, 14.0, 16.0, 18.0, 20.0, 25.0];

$gameInput = "";
$menuInput = "";

$board = array_fill(0, $boardColumn, array_fill(0, $boardRow, ""));

while ($menuInput !== "4") {
    echo "\n";
    echo "=======================================\n";
    echo "===             MENU                ===\n";
    echo "=======================================\n";
    echo "1:Spin\n";
    echo "2:Change Spin Value\n";
    echo "3:Add Money\n";
    echo "4:Exit\n";
    echo "=======================================\n";
    echo "Your Balance = $yourMoney | Value per spin = $perSpin\n";

    $menuInput = readline("\n");

    if($menuInput == 2) {
        echo "Balance  in Euros\n";
        for ($x = 0; $x < (count($perSpinOptions)); $x++) {
            echo " $x: $perSpinOptions[$x]\n";

        }

            $select = readline("\n");

            $perSpin = $perSpinOptions[$select];
            continue;
        }

    if ($menuInput == 3) {
        $yourMoney += readline("Enter Money: \n");
        continue;
    }

    if($menuInput == 4) {
        exit;
}
    if ($yourMoney < $perSpin) {
       echo "\nNot enough balance!\n";
        continue;
    }

    while ($gameInput !== 3){


        if ($yourMoney < $perSpin) {
            echo "Out of Balance!\n";
            break;
        }

        $yourMoney -= $perSpin;

        foreach ($board as $index => $move) {
            foreach ($move as $ind => $push) {
                $board[$index][$ind] = $boardSymbols[rand(0, count($boardSymbols) - 1)];
            }
        }

        $winCombinations = [
            [[$board[0][0]], [$board[0][1]], [$board[0][2]], [$board[0][3]]],
            [[$board[1][0]], [$board[1][1]], [$board[1][2]], [$board[1][3]]],
            [[$board[2][0]], [$board[2][1]], [$board[2][2]], [$board[0][2]]],
            [[$board[0][0]], [$board[1][1]], [$board[1][2]], [$board[2][3]]],
            [[$board[2][0]], [$board[1][1]], [$board[1][2]], [$board[0][3]]],
            [[$board[2][0]], [$board[1][1]], [$board[1][2]], [$board[2][3]]],
            [[$board[0][0]], [$board[1][1]], [$board[1][2]], [$board[0][3]]],
        ];

        echo "        ==============\n";
        echo "       == Lucky  777 ==\n";
        echo "       ================\n";

        foreach ($board as $first) {
            echo "       =│";
            foreach ($first as $s => $second) {
                echo " $second ";
            }
            echo "│=", PHP_EOL;
        }
        echo "       ================\n";

        $allWinningsTimes = [];

        foreach ($winCombinations as $win) {
            if ($win[0] == $win[1] && $win[1] == $win[2] && $win[2] == $win[3]) {
                $allWinningsTimes[] = $win[0];
            }
            if ($win[0] == $win[1] && $win[1] == $win[2]) {
                $allWinningsTimes[] = $win[0];
            }
        }

        foreach ($allWinningsTimes as $int => $getSomething) {
            foreach ($getSomething as $what) {
                if ($what == $boardSymbols[0]) {
                    $allWinningsTimes[$int] = 1.3;
                } elseif ($what == $boardSymbols[1]) {
                    $allWinningsTimes[$int] = 1.8;
                } elseif ($what == $boardSymbols[2]) {
                    $allWinningsTimes[$int] = 2.5;
                } elseif ($what == $boardSymbols[3]) {
                    $allWinningsTimes[$int] = 5;
                } elseif ($what == $boardSymbols[4]) {
                    $allWinningsTimes[$int] = 10;
                }
            }
        }

        $totalWin = 0;

        foreach ($allWinningsTimes as $timeItUp) {
            $totalWin += $perSpin * $timeItUp;
        }

        if (empty($allWinningsTimes) == true) {
            $yourMoney = $yourMoney + $totalWin ;
        } else {
            $yourMoney += $totalWin;
        }

        echo "    Win = $totalWin | Total : $yourMoney\n";
        echo "=====================================\n";
        echo "Re spin = (any) | Menu = 2 | Exit = 3 \n";

        $gameInput = readline();

        if($gameInput == 2) {
            break;
        }
        if($gameInput == 3) {
            exit;
        }
    }
}