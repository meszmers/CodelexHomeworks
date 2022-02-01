<?php

class Cars {
    public $name;
    public $type;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

}

$audi = new Cars("Audi", "RS7");
$fiat = new Cars("Fiat", "500");
$mitsubishi = new Cars("Mitsubishi", "Lancer");

class CarsList {

    public array $list;


    public  function addProduct(Cars $productInfo) {
        return $this->list[] = $productInfo;
    }
    public function printoutAvail() {

        foreach ($this->list as $index => $print) {
            echo "[$index] $print->name $print->type \n";
        }
        echo "=============================\n";
    }
    public function reserve($x) {
        return $this->list[$x];
    }
    public function delete($y) {
        unset($this->list[$y]);
    }

}



$carList = new CarsList();

$carList->addProduct($audi);
$carList->addProduct($fiat);
$carList->addProduct($mitsubishi);

echo "Available: \n";
$carList->printoutAvail();
$readline = readline("Enter number");
$x = $carList->reserve($readline);
$carList->delete($readline);




class Reserved
{

    public array $reservedList;

    public function addProduct($Car)
    {
        return $this->reservedList[] = $Car;
    }

        function printoutReserved()
        {
            foreach ($this->reservedList as $index => $print) {
                echo "[$index] $print->name $print->type \n";
            }
            echo "=============================\n";
        }

}

$reserved = new Reserved();
$reserved->addProduct($x);

echo "Available: \n";
$carList->printoutAvail();
echo "Reserved: \n";
$reserved->printoutReserved();

