<?php

class Dogs {
    private string $name;
    private string $sex;
    private string $mother;
    private string $father;

    public function __construct($name, $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
        if ($name === "Max") {
            $this->mother = "Lady";
            $this->father = "Rocky";
        } else if ($name === "Coco") {
            $this->mother = "Molly";
            $this->father = "Buster";
        } else if ($name === "Rocky") {
            $this->mother = "Molly";
            $this->father = "Sam";
        } else if ($name === "Buster") {
            $this->mother = "Lady";
            $this->father = "Sparky";
        } else {$this->father = "Unknown"; $this->mother = "Unknown";}
    }
    public function getMothersName(): string {
        return $this->mother;
    }


}

class DogTest {
    private array $dogs = [["Max", "male"],["Rocky", "male"],["Sparky", "male"],["Buster", "male"],
        ["Sam", "male"],["Lady", "female"],["Molly", "female"],["Coco", "female"]];
    private array $dogList;

    function listDogs() {
        foreach ($this->dogs as $dog) {
            $this->dogList[] = new Dogs($dog[0], $dog[1]);
        }
    }

    public function getDogList(): array
    {
        return $this->dogList;
    }
    public function HasSameMotherAs(Dogs $dog): bool {
        $counter = 0;
    foreach ($this->dogList as $list) {
        if($list->getMothersName() == $dog->getMothersName() && $dog->getMothersName() !== "Unknown") {
            $counter++;
        }
    }
        if($counter > 1) {
            return true;
        }  else return false;
    }
}

$dogTest = new DogTest();

$dogTest->listDogs();


var_dump($dogTest->HasSameMotherAs($dogTest->getDogList()[4]));

