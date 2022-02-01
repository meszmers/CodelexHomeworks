<?php



    class Person
    {
        private $name;
        private $surname;
        private $pcode;

        public function __construct($name, $surname, $pcode)
        {
            $this->name = $name;
            $this->surname = $surname;
            $this->pcode = $pcode;
        }

        public function getData()
        {
            return "$this->name | $this->surname | $this->pcode";
        }
    }

    class ListInfo
    {

        public array $list;


        public function addToArray($person)
        {
            $this->list[] = $person;
        }

    }
    $listOfPersons = new ListInfo();

    while(true) {

        echo "[1] Add Person to Registry\n";
        echo "[2] Print all Registry\n";
        echo "[3] Exit\n";
        $option = readline("[1-2-3]:\n");

        if($option == 1) {
            $x = new Person(readline("Name:"), readline("Surname"), readline("P-Code"));
            $listOfPersons->addToArray($x);
        }

        if($option == 2) {
            if(empty($listOfPersons->list)) {
                echo "Registry is empty\n";
                continue;
            }
            foreach ($listOfPersons->list as $index => $person) {
                echo "[$index] " . $person->getData() . "\n";
            }
            echo "=====================================================\n";
        }
        if($option == 3) {
            return false;
        }
    }

