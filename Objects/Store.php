<?php

class ProductInfo {
    public $name;
    public $price;
    public $count;

    public function __construct($name, $price, $count)
    {
        $this->name = $name;
        $this->price = $price;
        $this ->count = $count;
    }
}

$apple = new ProductInfo("Apple", 5, 34);
$banana = new ProductInfo("Banana", 10, 13);

class StoreList {

    public array $list;


    public  function addProduct(ProductInfo $productInfo) {
        return $this->list[] = $productInfo;
    }
    public function  show(StoreList $x) {
        foreach ($x as $see) {
            echo $see["name"];
        }
    }
    public function total(): int {
        $summ = 0;
        foreach ($this->list as $products) {
            $summ += $products->price * $products->count;
        }
        return $summ;
    }
    public function printout() {
        foreach ($this->list as $print) {
           echo "$print->name | $print->price | $print->count \n";
        }
        echo "=============================\n";
    }



}

$storeList = new StoreList();

$storeList->addProduct($apple);
$storeList->addProduct($banana);

$storeList->printout();

echo "Total sum = {$storeList->total()} \n";









