<?php


class SavingsAccount{
    private float $balance;
    private float $endBalance;

    private float $interestRate;
    private float $months;

    private float $deposited = 0;
    private float $withdraw = 0;

    public function __construct($amount, $interestRate, $months)
    {
        $this->balance = $amount;
        $this->interestRate = $interestRate;
        $this->months = $months;
        $this->endBalance = $amount;
    }

    public function addInterestToSum() {
        $this->endBalance += $this->endBalance * ($this->interestRate / 12);

    }

    public function sumOfTransactions($deposit, $withdraw) {
        $this->deposited += $deposit;
        $this->withdraw += $withdraw;
    }

    public function addBalance($amount) {
        $this->endBalance += $amount;
    }
    public function removeBalance($amount) {
        $this->endBalance -= $amount;
    }



    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getEndBalance(): float
    {
        return $this->endBalance;
    }

    public function getDeposited(): float
    {
        return $this->deposited;
    }

    public function getWithdraw(): float
    {
        return $this->withdraw;
    }

    public function getMonths(): float
    {
        return $this->months;
    }

}

$person = new SavingsAccount(readline("How much money is in the account?\n"),
                             readline("Enter the annual interest rate\n"),
                             readline("How long has the account been opened?\n"));


for($i = 1; $i <= $person->getMonths(); $i++) {
    $y = readline("Enter amount deposited for $i month: ");
    $x = readline("Enter amount withdrawn for $i month: ");

    $person->addBalance($y);
    $person->removeBalance($x);

    $person->sumOfTransactions($y, $x);

    $person->addInterestToSum();


}
echo "Total deposited: $" . number_format($person->getDeposited(), 2) . "\n";
echo "Total withdrawn: $" . number_format($person->getWithdraw(), 2) . "\n";
echo "Interest earned: $" . number_format($person->getEndBalance() - ($person->getBalance() + $person->getDeposited() - $person->getWithdraw()), 2, ) . "\n";
echo "Ending balance: $" . number_format($person->getEndBalance(), 2);


