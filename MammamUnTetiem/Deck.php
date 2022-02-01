<?php


class Card
{
    private array $cards = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"];
    private array $suit = ["♠", "♥", "♦", "♣"];
    public array $deck;

    public function Construct() {
        foreach ($this->cards as $index=> $make) {
            foreach ($this->suit as $ind=> $construct) {
                if($index == 9 && $ind == 1 || $index == 9 && $ind == 2 || $index == 9 && $ind == 3) {
                    continue;
                } else $this->deck[] =  "[$make $construct]";
            }
        }
    }
    public function shuffle() {
        shuffle($this->deck);
    }

    public function getCards(): array {
        return $this->cards;
    }

}
