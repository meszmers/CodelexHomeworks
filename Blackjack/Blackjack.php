<?php

class BlackJack
{

    private array $cards = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"];

    public function drawCard() {
        return $this->cards[rand(0, count($this ->cards) - 1)];
    }

}


