<?php

class Weapon {

 public $name;
 public $power;

    public function __construct(string $name, int $power)
    {
        $this->name = $name;
        $this->power = $power;
    }

}

$glock = new Weapon("Glock", 10);
$ak47 = new Weapon("AK-47", 100);
$famass = new Weapon("Famass", 67);

class Inventory {
    public array $inventory;


    public  function addWeapon(Weapon $weapon) {
        return $this->inventory[] = $weapon;
    }
}


$inventoryArray = new Inventory();

$inventoryArray->addWeapon($ak47);
$inventoryArray->addWeapon($glock);
$inventoryArray->addWeapon($famass);
var_dump($inventoryArray);