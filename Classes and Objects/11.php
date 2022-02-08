<?php


class Account
{

    private string $name;
    private float $balance;

    public function __construct($name, $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }


    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function deposit($sum):void
    {
        $this->balance += $sum;
    }

    public function withdrawal($sum):void
    {
        $this->balance -= $sum;
    }


}
echo "[1] My and Matt Account\n";
echo "[2] A, B, C Accounts\n";

$x = readline("");
switch ($x) {

    case 1:
        $myAccount = new Account("My Account", 0);
        $mattAccount= new Account("Matt Account", 1000);

        echo "Initial state\n";
        echo $myAccount->getName() . " " . $myAccount->getBalance() . "\n";
        echo $mattAccount->getName() . " " . $mattAccount->getBalance(). "\n";;
        echo "===============================================\n";

        $myAccount->deposit(100);
        $mattAccount->withdrawal(100);

        echo "===============================================\n";
        echo "Final state\n";
        echo $myAccount->getName() . " " . $myAccount->getBalance() . "\n";
        echo $mattAccount->getName() . " " . $mattAccount->getBalance(). "\n";;
        echo "===============================================\n";

    case 2:

        function transfer(Account $from, Account $to, int $howMuch) {
            $from->withdrawal($howMuch);
            $to->deposit($howMuch);
        }
        $A = new Account("A", 100);
        $B = new Account("B", 0.0);
        $C = new Account("C", 0);
        $accounts = [$A, $B, $C];

        while(true) {
            foreach ($accounts as$i=>$see) {
                echo "[$i]Account: ".$see->getName() . " ". $see->getBalance() . "\n";
            }
            $x = readline("Index of account: From");
            $y = readline("Index of account: To");
            $amount = (float)readline();

            if($accounts[$x]->getBalance() < $amount) {
                echo "Not Enough Money for Transaction\n";
            } else {
                transfer($accounts[$x], $accounts[$y], $amount);
                echo "Transaction Completed\n";
            }
            sleep(1);




        }

}

