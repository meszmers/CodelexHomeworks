<?php

function menu(float $balance, string $name, string $surname, float $spin) {
    echo "\n";
    echo "=======================================\n";
    echo "==     WELCOME   $name $surname". str_repeat(" ", 20 - (strlen($name) + strlen($surname) + 1))  ."==\n";
    echo "=======================================\n";
    echo "===             MENU                ===\n";
    echo "=======================================\n";
    echo "1:Spin\n";
    echo "2:Change Spin Value\n";
    echo "3:Add Money\n";
    echo "4:Exit\n";
    echo "=======================================\n";
    echo "Your Balance = $balance | Value per spin = $spin\n";

}

function gameBoard($board) {
    echo "        ==============\n";
    echo "       == Lucky  777 ==\n";
    echo "       ================\n";

    foreach ($board as $first) {
        echo "       =│";
        foreach ($first as $second) {
            echo " $second ";
        }
        echo "│=", PHP_EOL;
    }
    echo "       ================\n";
}


class PlayerProfile {
    private string $name;
    private string $surname;
    private float $balance;

    public function __construct(string $name, string $surname) {

        $this->name = $name;
        $this->surname = $surname;
        $this->balance = 0;

    }
    public function getName(): string {
        return $this->name;
    }
    public function  getSurname(): string {
        return $this->surname;
    }
    public function getBalance(): float {
        return $this->balance;
    }
    public function addBalance($amount) {
        $this->balance += $amount;
    }
    public function removeBalance($amount) {
        $this->balance -= $amount;
    }
}

class Casino {
    private array $spinValues;
    private float $spinSize;

    public function __construct() {
        $this->spinSize = 1;
    }

    function createSpinOptions($array):void {
        foreach ($array as $add) {
            $this->spinValues[] = $add;
        }
    }
        function showSpinValue() {
            return $this->spinSize;
        }

        function showSpinOptions(): array {
            return $this->spinValues;
    }
    function changeSpin($spinValue) {
        $this->spinSize = $spinValue;
    }

}

class CasinoBoard {

    private array $board;
    private array $symbols;
    private array $combinations;


    public function __construct(array $board) {
        $this->board = $board;
    }
    public function makeSymbols(array $symbols) {
        foreach($symbols as $addSymbols) {
            $this->symbols[] = $addSymbols;
        }

    }
    public function showSymbols(): array {
        return $this->symbols;
    }
    public function createSpinDisplay() {
        foreach ($this->board as $ind=>$add) {
            foreach ($add as $index=>$push) {
                $this->board[$ind][$index] = $this->symbols[rand(1, count($this->symbols) - 1)];
            }
        }
    }
    public function addCombinations() {
        $this->combinations = [
            [[$this->board[0][0]], [$this->board[0][1]], [$this->board[0][2]], [$this->board[0][3]]],
            [[$this->board[1][0]], [$this->board[1][1]], [$this->board[1][2]], [$this->board[1][3]]],
            [[$this->board[2][0]], [$this->board[2][1]], [$this->board[2][2]], [$this->board[0][2]]],
            [[$this->board[0][0]], [$this->board[1][1]], [$this->board[1][2]], [$this->board[2][3]]],
            [[$this->board[2][0]], [$this->board[1][1]], [$this->board[1][2]], [$this->board[0][3]]],
            [[$this->board[2][0]], [$this->board[1][1]], [$this->board[1][2]], [$this->board[2][3]]],
            [[$this->board[0][0]], [$this->board[1][1]], [$this->board[1][2]], [$this->board[0][3]]],
        ];
    }
    public function showCombinations(): array {
        return $this->combinations;
    }


    function showBoard(): array {
        return $this->board;
    }
}
$playerProfile = new PlayerProfile(readline("Enter your name:\n"), readline("Enter your Surname:\n"));
$casino = new Casino();
$casinoBoard = new CasinoBoard(array_fill(0, 4, array_fill(0, 4, "")));


$casino->createSpinOptions([0.2, 0.4, 0.6, 0.8, 1, 10, 12, 14, 16, 18, 20, 50, 100]);
$casinoBoard->makeSymbols(["J", "Q", "K", "A", "7"]);



$menuInput = "";


while (true) {

    menu($playerProfile->getBalance(), $playerProfile->getName(), $playerProfile->getSurname(), $casino->showSpinValue());


    $menuInput = readline(": \n");

    if ($menuInput == 2) {
        echo "Balance  in Euros\n";

        for ($x = 0; $x < (count($casino->showSpinOptions())); $x++) {

            echo " $x: " . $casino->showSpinOptions()[$x] ."\n";
        }

        $casino->changeSpin($casino->showSpinOptions()[readline("\n")]);

        continue;
    }

    if ($menuInput == 3) {
        $playerProfile->addBalance(readline("Amount"));
        continue;
    }

    if ($menuInput == 4) {
        exit;
    }
    if ($playerProfile->getBalance() < $casino->showSpinValue()) {
        echo "\nNot enough balance!\n";
        continue;
    }

    while(true) {

        $playerProfile->removeBalance($casino->showSpinValue());

        $casinoBoard->createSpinDisplay();

        gameBoard($casinoBoard->showBoard());

        $casinoBoard->addCombinations();

        $allWinningsTimes = [];

        foreach ($casinoBoard->showCombinations() as $win) {
            if ($win[0] == $win[1] && $win[1] == $win[2] && $win[2] == $win[3]) {
                $allWinningsTimes[] = $win[0];
            }
            if ($win[0] == $win[1] && $win[1] == $win[2]) {
                $allWinningsTimes[] = $win[0];
            }
        }

        foreach ($allWinningsTimes as $int => $findSymbols) {
            foreach ($findSymbols as $thatSymbol) {
                if ($thatSymbol == $casinoBoard->showSymbols()[0]) {
                    $allWinningsTimes[$int] = 1.3;
                } elseif ($thatSymbol == $casinoBoard->showSymbols()[1]) {
                    $allWinningsTimes[$int] = 1.8;
                } elseif ($thatSymbol == $casinoBoard->showSymbols()[2]) {
                    $allWinningsTimes[$int] = 2.5;
                } elseif ($thatSymbol == $casinoBoard->showSymbols()[3]) {
                    $allWinningsTimes[$int] = 5;
                } elseif ($thatSymbol == $casinoBoard->showSymbols()[4]) {
                    $allWinningsTimes[$int] = 10;
                }
            }
        }

        $totalWin = 0;

        foreach ($allWinningsTimes as $timeItUp) {
            $totalWin += $casino->showSpinValue() * $timeItUp;
        }

        $playerProfile->addBalance($totalWin);

        echo "    Win = $totalWin | Total : ". $playerProfile->getBalance(). "\n";
        echo "=====================================\n";
        echo "Re spin = (any) | Menu = 2 | Exit = 3 \n";

        $gameInput = readline();

        if($gameInput == 2) {
            break;
        }
        if($gameInput == 3) {
            return false;
        }




    }








}