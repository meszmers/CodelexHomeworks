<?php

class PlayerNewGame {

    private array $cards;

    function showCards(): array {
        return $this->cards;
    }

    public function declareCards($card) {
        $this->cards[] = $card;
    }
    public function removeCardAndAdd($card, $nextPlayer) {
        $nextPlayer->declareCards($this->cards[$card]);
        unset($this->cards[$card]);
    }

}
