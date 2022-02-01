<?php

class Car
{
    private int $fuelTank;
    private int $odometer;

    public function __construct($fuelTank, $odometer)
    {
        $this->fuelTank = $fuelTank;
        $this->odometer = $odometer;
    }
    public function getFuel(): int {
        return $this->fuelTank;
    }
    public function getMileage(): int  {
        return $this->odometer;
    }

}
class FuelGauge {

    private int $fuel;

    public function getCarsFuel($fuel) {
        $this->fuel = $fuel;
    }
    public function getTankRead(): int{
        return $this->fuel;
    }
    public function fillUp() {
        $this->fuel += 1;
    }
    public function burn() {
        $this->fuel -= 1;
    }
}
class Odometer {
    private int $odometer;

    public function getCarsMileage($mileage) {
        $this->odometer = $mileage;
    }
    public function getOdometerRead(): int{
        return $this->odometer;
    }
    public function drive($distanceKms) {
        $this->odometer += $distanceKms;
    }
}

class Wheels {

    private float $wheelOne;
    private float $wheelTwo;
    private float $wheelThree;
    private float $wheelFour;

    public function setWheels(): void
    {
        $this->wheelOne = 3;
        $this->wheelTwo = 3;
        $this->wheelThree = 3;
        $this->wheelFour = 3;

    }

    public function WheelsDecay(): void
    {
        $this->wheelOne -= rand(0, 3) / 100;
        $this->wheelTwo -= rand(0, 3) / 100;
        $this->wheelThree -= rand(0, 3) / 100;
        $this->wheelFour -= rand(0, 3) / 100;
    }

    public function getAllWheelProtector() : string
    {
        return $this->wheelOne ."  ". $this->wheelTwo ."  ". $this->wheelThree ."  ". $this->wheelFour;
    }


    public function getWheelOne(): float
    {
        return $this->wheelOne;
    }

    public function getWheelTwo(): float
    {
        return $this->wheelTwo;
    }

    public function getWheelThree(): float
    {
        return $this->wheelThree;
    }

    public function getWheelFour(): float
    {
        return $this->wheelFour;
    }


}

class Headlights {
    private float $rightDayTimeLights;
    private float $rightNightTimeLights;
    private float $leftDayTimeLights;
    private float $leftNightTimeLights;

    public function addLights():void {
        $this->rightDayTimeLights = 100;
        $this->rightNightTimeLights = 100;
        $this->leftDayTimeLights = 100;
        $this->leftNightTimeLights = 100;
    }
    public function HeadlightDecay(): void
    {
        $this->rightDayTimeLights -= rand(0, 6);
        $this->rightNightTimeLights -= rand(0, 3);
        $this->leftDayTimeLights -= rand(0, 6);
        $this->leftNightTimeLights -= rand(0, 3);
    }


    public function getRightDayTimeLights(): float
    {
        return $this->rightDayTimeLights;
    }

    public function getRightNightTimeLights(): float
    {
        return $this->rightNightTimeLights;
    }

    public function getLeftDayTimeLights(): float
    {
        return $this->leftDayTimeLights;
    }

    public function getLeftNightTimeLights(): float
    {
        return $this->leftNightTimeLights;
    }


}
$x = new Car(2, 142);

$tank = new FuelGauge();
$display = new Odometer();
$wheels = new Wheels();
$headlights = new Headlights();

$headlights->addLights();
$wheels->setWheels();
$tank->getCarsFuel($x->getFuel());
$display->getCarsMileage($x->getMileage());
echo "\n";
echo "\n";
echo "\n";
echo "            90    100                                        2000    3000\n";
echo "       80  \           110                             1500        │       4000\n";
echo "            \                                                      │\n";
echo "   70        \             120                     1000            │         5000\n";
echo "              \                                                    │\n";
echo " 60            \             130 ================ 750              │           6000\n";
echo "                O                │    Welcome   │                  O\n";
echo " 50                          140 ================ 500                          7000\n";
echo "               mph                                              \n";
echo "  40         Mileage        150       Liters       250            rpm\n";
echo str_repeat(" ", 18 - strlen($display->getOdometerRead())) . $display->getOdometerRead() .
    str_repeat(" ", 24 - strlen($tank->getTankRead())) . $tank->getTankRead() .
    str_repeat(" ", 18) . $wheels->getAllWheelProtector()."\n";
echo "     30                  160                          0         " . $headlights->getRightDayTimeLights() .
    " " . $headlights->getLeftDayTimeLights() . " " . $headlights->getRightNightTimeLights() .
    " " . $headlights->getLeftNightTimeLights() . "\n";


$mileageToFuelCount = 0;
while(true) {
    echo "[1] Drive\n";
    echo "[2] Fill Up\n";
    echo "[3] Change Tires\n";
    echo "[4] Exit\n";

    $input = readline(": ");

    if($tank->getTankRead() == 0) {
        echo "\n";
        echo "\n";
        echo "\n";

        echo "            90    100                                        2000    3000\n";
        echo "       80  \           110                             1500        │       4000\n";
        echo "            \                                                      │\n";
        echo "   70        \             120                     1000            │         5000\n";
        echo "              \                                                    │\n";
        echo " 60            \             130 ================ 750              │           6000\n";
        echo "                O                │    No Fuel   │                  O\n";
        echo " 50                          140 ================ 500                          7000\n";
        echo "               mph                                              \n";
        echo "  40         Mileage        150       Liters       250            rpm\n";
        echo str_repeat(" ", 18 - strlen($display->getOdometerRead())) . $display->getOdometerRead() . str_repeat(" ", 24 - strlen($tank->getTankRead())) . $tank->getTankRead() . str_repeat(" ", 18) . $wheels->getAllWheelProtector(). "\n";
        echo "     30                  160                          0          " . $headlights->getRightDayTimeLights() . " " . $headlights->getLeftDayTimeLights() . " " . $headlights->getRightNightTimeLights() . " " . $headlights->getLeftNightTimeLights() . "\n";

    }
    if($input == 1) {
        while ($tank->getTankRead() !== 0) {
            $amount = 1;

            if($wheels->getWheelOne() < 1 || $wheels->getWheelTwo() < 1 || $wheels->getWheelThree() < 1 || $wheels->getWheelFour() < 1) {
                echo "\n";
                echo "\n";
                echo "\n";

                echo "            90    100                                        2000    3000\n";
                echo "       80  \           110                             1500        │       4000\n";
                echo "            \                                                      │\n";
                echo "   70        \             120                     1000            │         5000\n";
                echo "              \                                                    │\n";
                echo " 60            \             130 ================ 750              │           6000\n";
                echo "                O                │ Broken Tires │                  O\n";
                echo " 50                          140 ================ 500                          7000\n";
                echo "               mph                                              \n";
                echo "  40         Mileage        150       Liters       250            rpm\n";
                echo str_repeat(" ", 18 - strlen($display->getOdometerRead())) . $display->getOdometerRead() . str_repeat(" ", 24 - strlen($tank->getTankRead())) . $tank->getTankRead() . str_repeat(" ", 18) . $wheels->getAllWheelProtector(). "\n";
                echo "     30                  160                          0         " . $headlights->getRightDayTimeLights() . " " . $headlights->getLeftDayTimeLights() . " " . $headlights->getRightNightTimeLights() . " " . $headlights->getLeftNightTimeLights() . "\n";
                break;

            }
            if($headlights->getLeftDayTimeLights() < 1 || $headlights->getLeftNightTimeLights() < 1 || $headlights->getRightDayTimeLights() < 1 || $headlights->getRightNightTimeLights() < 1) {
                echo "\n";
                echo "\n";
                echo "\n";

                echo "            90    100                                        2000    3000\n";
                echo "       80  \           110                             1500        │       4000\n";
                echo "            \                                                      │\n";
                echo "   70        \             120                     1000            │         5000\n";
                echo "              \                                                    │\n";
                echo " 60            \             130 ================ 750              │           6000\n";
                echo "                O              │ Faulty Headlight │                  O\n";
                echo " 50                          140 ================ 500                          7000\n";
                echo "               mph                                              \n";
                echo "  40         Mileage        150       Liters       250            rpm\n";
                echo str_repeat(" ", 18 - strlen($display->getOdometerRead())) . $display->getOdometerRead() . str_repeat(" ", 24 - strlen($tank->getTankRead())) . $tank->getTankRead() . str_repeat(" ", 18) . $wheels->getAllWheelProtector(). "\n";
                echo "     30                  160                          0     " . $headlights->getRightDayTimeLights() . " " . $headlights->getLeftDayTimeLights() . " " . $headlights->getRightNightTimeLights() . " " . $headlights->getLeftNightTimeLights() . "\n";
                break;

            }


            $wheels->WheelsDecay();
            $headlights->HeadlightDecay();

            $mileageToFuelCount += $amount;
            if ($mileageToFuelCount >= 10) {
                $mileageToFuelCount -= 10;

                $tank->burn();




            }

            $display->drive($amount);
            echo "\n";
            echo "\n";
            echo "\n";

            echo "            90    100                                        2000    3000\n";
            echo "       80  \           110                             1500        │       4000\n";
            echo "            \                                                      │\n";
            echo "   70        \             120                     1000            │         5000\n";
            echo "              \                                                    │\n";
            echo " 60            \             130 ================ 750              │           6000\n";
            echo "                O                │    Driving   │                  O\n";
            echo " 50                          140 ================ 500                          7000\n";
            echo "               mph                                              \n";
            echo "  40         Mileage        150       Liters       250            rpm\n";
            echo str_repeat(" ", 18 - strlen($display->getOdometerRead())) . $display->getOdometerRead() . str_repeat(" ", 24 - strlen($tank->getTankRead())) . $tank->getTankRead() . str_repeat(" ", 18) . $wheels->getAllWheelProtector(). "\n";
            echo "     30                  160                          0          " . $headlights->getRightDayTimeLights() . " " . $headlights->getLeftDayTimeLights() . " " . $headlights->getRightNightTimeLights() . " " . $headlights->getLeftNightTimeLights() . "\n";
            sleep(1);
        }

    } elseif ($input == 2) {
        $literFill = readline("How many liters you want to fill?\n");
        $count = 0;

        if($tank->getTankRead() == 70) {
            echo "\n";
            echo "\n";
            echo "\n";

            echo "            90    100                                        2000    3000\n";
            echo "       80  \           110                             1500        │       4000\n";
            echo "            \                                                      │\n";
            echo "   70        \             120                     1000            │         5000\n";
            echo "              \                                                    │\n";
            echo " 60            \             130 ================ 750              │           6000\n";
            echo "                O                │ Tank is Full │                  O\n";
            echo " 50                          140 ================ 500                          7000\n";
            echo "               mph                                                rpm\n";
            echo "  40         Mileage        150       Liters       250                \n";
            echo str_repeat(" ", 18 - strlen($display->getOdometerRead())) . $display->getOdometerRead() . str_repeat(" ", 24 - strlen($tank->getTankRead())) . $tank->getTankRead() . str_repeat(" ", 18) . $wheels->getAllWheelProtector(). "\n";
            echo "     30                  160                          0        " . $headlights->getRightDayTimeLights() . " " . $headlights->getLeftDayTimeLights() . " " . $headlights->getRightNightTimeLights() . " " . $headlights->getLeftNightTimeLights() . "\n";
        }
        while($tank->getTankRead() !== 70) {

            if($count < $literFill) {
                $count += 1;
            } else break;

                $tank->fillUp();

                echo "\n";
                echo "\n";
                echo "\n";
                echo "            90    100                                        2000    3000\n";
                echo "       80  \           110                             1500        │       4000\n";
                echo "            \                                                      │\n";
                echo "   70        \             120                     1000            │         5000\n";
                echo "              \                                                    │\n";
                echo " 60            \             130 ================ 750              │           6000\n";
                echo "                O                │  Filling UP  │                  O\n";
                echo " 50                          140 ================ 500                          7000\n";
                echo "               mph                                                rpm \n";
                echo "  40         Mileage        150       Liters       250                \n";
                echo str_repeat(" ", 18 - strlen($display->getOdometerRead())) . $display->getOdometerRead() . str_repeat(" ", 24 - strlen($tank->getTankRead())) . $tank->getTankRead() . str_repeat(" ", 18) . $wheels->getAllWheelProtector()."\n";
                echo "     30                  160                          0        " . $headlights->getRightDayTimeLights() . " " . $headlights->getLeftDayTimeLights() . " " . $headlights->getRightNightTimeLights() . " " . $headlights->getLeftNightTimeLights() . "\n";


                sleep(1);

        }

    } elseif ($input == "3") {
        $wheels->setWheels();
        echo "\n";
        echo "\n";
        echo "\n";
        echo "            90    100                                        2000    3000\n";
        echo "       80  \           110                             1500        │       4000\n";
        echo "            \                                                      │\n";
        echo "   70        \             120                     1000            │         5000\n";
        echo "              \                                                    │\n";
        echo " 60            \             130 ================ 750              │           6000\n";
        echo "                O                │Wheels Changed│                  O\n";
        echo " 50                          140 ================ 500                          7000\n";
        echo "               mph                                                rpm \n";
        echo "  40         Mileage        150       Liters       250                \n";
        echo str_repeat(" ", 18 - strlen($display->getOdometerRead())) . $display->getOdometerRead() . str_repeat(" ", 24 - strlen($tank->getTankRead())) . $tank->getTankRead() . str_repeat(" ", 18) . $wheels->getAllWheelProtector()."\n";
        echo "     30                  160                          0         " . $headlights->getRightDayTimeLights() . " " . $headlights->getLeftDayTimeLights() . " " . $headlights->getRightNightTimeLights() . " " . $headlights->getLeftNightTimeLights() . "\n";


    } else return false;




}