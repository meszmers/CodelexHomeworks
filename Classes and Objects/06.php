<?php



$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

class SoftDringCompany {
    private int $surveyed;
    private float $energyDrinkPurchases;
    private float $citrusDrinks;

    public function __construct($amount, $energyDrinkPurchases, $citrusDrinks) {
        $this->surveyed = $amount;
        $this->energyDrinkPurchases = $energyDrinkPurchases;
        $this->citrusDrinks = $citrusDrinks;
    }
    public function getSurveys(): int {
        return $this->surveyed;
    }
    public function getAmountOfEnergyDrinkPurchases() {
        return $this->surveyed * $this->energyDrinkPurchases;
    }
    public function getAmountOfEnergyDrinkCitrusPurchases() {
        return $this->surveyed * $this->energyDrinkPurchases * $this->citrusDrinks;
    }
}

$x = new SoftDringCompany(12467, 0.14, 0.64);

echo $x->getSurveys() . ": Surveys\n";
echo floor($x->getAmountOfEnergyDrinkPurchases()) . ": Energy Drink Purchases\n";
echo floor($x->getAmountOfEnergyDrinkCitrusPurchases()) . ": Citrus Energy Drink Purchases\n";