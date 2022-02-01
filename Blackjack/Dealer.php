<?php

class Player {

    private array $cards;
    private int $sumOfCards;

    function getCards(): array {
        return $this->cards;
    }

    function sumOfCards() {
        $x = 0;
        foreach ($this->cards as $value) {
            if($value == "J" || $value == "Q" || $value == "K") {
                $value = 10;
                $x += $value;
            } else if($value == "A") {
                $value = 11;
                $x += $value;
            } else $x += $value;
        }
        $this->sumOfCards = $x;
    }

    public function declareCards($card) {
        $this->cards[] = $card;
    }
    public function getSum(): int {
        return $this->sumOfCards;
    }
}

