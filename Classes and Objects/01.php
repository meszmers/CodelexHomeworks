<?php

 class Product {
     private string $name;
     private float $price;
     private int $amount;
     public function __construct(string $name, float $price, int $amount)
     {
         $this->name = $name;
         $this->price = $price;
         $this->amount = $amount;
     }
     public function readName(): string {
         return $this->name;
     }
     public function readPrice(): string {
         return number_format($this->price, 2);
     }
     public function readAmount(): string {
         return $this->amount;
     }
     public  function changeName($newName): void {
         $this->name = $newName;
     }
     public  function changePrice($newPrice): void {
         $this->price = $newPrice;
     }
     public  function changeByAmount($amount): void {
         $this->amount += $amount;
     }
 }
 $mouse = new Product("Logitech mouse", 70.00, 14);
 $phone = new Product("iPhone 5s", 999.99, 3);
 $printer = new Product("Epson EB-U05", 440.46, 1);

 $shelf = new ShopShelf();
 $shelf->addToShelf($mouse);
 $shelf->addToShelf($phone);
 $shelf->addToShelf($printer);

 class ShopShelf {
     public array $shelf;

     function addToShelf(Product $item) {
         $this->shelf[] = $item;
     }

 }
while(true) {
    echo "   Name" . str_repeat(" ", 14) . "Price" . str_repeat(" ", 8) . "Amount\n";
    echo str_repeat("=", 40) . "\n";
    foreach ($shelf->shelf as $i => $see) {
        echo "[$i]" . $see->readName() . str_repeat(" ", 17 - strlen($see->readName())) . "│ " .
            $see->readPrice() . str_repeat(" ", 11 - strlen($see->readPrice())) . "│ " .
            $see->readAmount() . "\n";
    }
    echo str_repeat("=", 40) . "\n";

    echo "[1]Edit [2]Add [3]Exit\n";
    $x = readline(": ");

    if($x == 1) {

        $indOF = readline("Product Index: \n");

        echo "[1]Name [2]Price [3]Amount\n";
        $xInput = readline(": ");

        if($xInput == 1) {
            echo "Current name : " . $shelf->shelf[$indOF]->readName() . "\n";
            $shelf->shelf[$indOF]->changeName(readline("Enter new name: \n"));
        } elseif ($xInput == 2) {
            echo "Current Price : " . $shelf->shelf[$indOF]->readPrice() . "\n";
            $shelf->shelf[$indOF]->changePrice(readline("Enter new price: \n"));
        } elseif ($xInput == 3) {
            echo "Current Amount : " . $shelf->shelf[$indOF]->readAmount() . "\n";
            $shelf->shelf[$indOF]->changeByAmount(readline("To add enter positive/To remove enter negative: \n"));
        }

    }
    if($x == 2) {
        $new = new Product(readline("Name "), readline("Price "), readline("Amount "));
        $shelf->addToShelf($new);
    }

    if($x == 3) {
        return false;
    }
}

