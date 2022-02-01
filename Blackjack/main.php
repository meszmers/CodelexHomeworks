<?php

require_once('Blackjack.php');
require_once('Dealer.php');


while(true) {

    $player = new Player();
    $dealer = new Player();
    $board = new BlackJack();

    $playerInput = 0;

    $dealer->declareCards($board->drawCard());

    $player->declareCards($board->drawCard());
    $player->declareCards($board->drawCard());


    while ($playerInput !== 2) {

        $player->sumOfCards();
        $dealer->sumOfCards();

        echo "Player Cards: " . implode(" ", $player->getCards()) .
            str_repeat(" ", 16 - count($player->getCards()) * 2) . "Dealer Cards: " .
            implode(" ", $dealer->getCards()) . "\n";
        echo " Total " . $player->getSum() . str_repeat(" ", 21) . " Total " . $dealer->getSum() . "\n";
        echo "\n";

        if ($player->getSum() > 21) {
            echo "Bust\n";
            break;
        }
        if ($player->getSum() == 21 && count($player->getCards()) == 2 && in_array("10", $player->getCards()) == false) {
            echo "BLACKJACK!\n";
            break;
        }

        echo "[1] = Draw\n";
        echo "[2] = Stay\n";



        $playerInput = readline("");

        if ($playerInput == 1) {
            $player->declareCards($board->drawCard());
            continue;
        }
        if ($playerInput == 2) {
            break;
        }

    }

if($player->getSum() <= 21) {

    while ($dealer->getSum() < 17) {

        $dealer->declareCards($board->drawCard());

        $player->sumOfCards();
        $dealer->sumOfCards();

        echo "\n";
        echo "Player Cards: " . implode(" ", $player->getCards()) .
            str_repeat(" ", 16 - count($player->getCards()) * 2) ."Dealer Cards: " .
            implode(" ", $dealer->getCards()) . "\n";
        echo " Total " . $player->getSum() . str_repeat(" ", 21) . " Total " . $dealer->getSum() . "\n";
        echo "\n";

        sleep(1);
    }

        if ($dealer->getSum() <= 21 && $dealer->getSum() > $player->getSum()) {
            echo "Dealer Wins\n";
        } else if ($dealer->getSum() == $player->getSum()) {
            echo "TIE\n";
        } else echo "Player Wins\n";
    }

    echo "=====================\n";
    echo "[Any] Play again\n";
    echo "[2] Exit\n";

    $menu = readline("");

    if($menu == 2) {
        return false;
    }
}


