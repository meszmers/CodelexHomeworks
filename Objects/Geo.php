<?php

class Info {
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
    function getName(): string {
        return $this->name;
    }

}

class Square extends Info{
    protected float $sideOne;
    protected float $sideTwo;

    public function __construct(string $name, float $sideOne, float $sideTwo)
    {
        parent::__construct($name);
        $this->sideOne = $sideOne;
        $this->sideTwo = $sideTwo;
    }

    function Area(): float {
        return $this->sideOne * $this->sideTwo;
    }

}
class Triangle extends Info {
    protected float $base;
    protected float $height;

    public function __construct(string $name, float $base, float $height)
    {
        parent::__construct($name);
        $this->base = $base;
        $this->height = $height;
    }

    function Area(): float {
        return 1/2 * $this->base * $this->height;
    }
}
class Circle extends Info {

    protected float $radius;

    public function __construct(string $name, float $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;

    }
    function Area() {
        return pi() * pow($this->radius, 2);
    }
}

class listOfInput {
    public array $list;

    function addToList($obj) {
        $this->list[] = $obj;
    }
    function sumUp():float {
        $x = 0;
        foreach($this->list as $value) {

             $x += $value->Area();
        }
        return $x;
    }
}

$list = new listOfInput();

while(true) {

    echo "[1] = Square\n";
    echo "[2] = Triangle\n";
    echo "[3] = Circle\n";
    echo "[4] = Print Sum of Added values\n";
    echo "[5] = Exit\n";

    $option = readline(":\n");
    if($option == 1) {
        $add = 0;
        $x = new Square("Square", readline("1st Side\n"), readline("2nd Side\n"));
        echo $x->getName() ."Area: ". $x->Area() . "\n";

        echo "[1]Add to List: \n";
        echo "[2]Dont add to list\n";
        $add = readline(":\n");
        if($add == 1) {
            $list->addToList($x);
        }

    }
    if($option == 2) {
        $y = new Triangle("Triangle", readline("Base\n"),  readline("Height\n"));
        echo $y->getName() ."Area: ". $y->Area() . "\n";

        echo "[1]Add to List: \n";
        echo "[2]Dont add to list\n";
        $add = readline(":\n");
        if($add == 1) {
            $list->addToList($y);
        }
    }
    if($option == 3) {
        $z = new Circle("Circle", readline("Radius\n"));
        echo $z->getName() ."Area: ". $z->Area() . "\n";

        echo "[1]Add to List: \n";
        echo "[2]Dont add to list\n";
        $add = readline(":\n");
        if($add == 1) {
            $list->addToList($z);
        }
    }

    if($option == 4) {
        echo "==============================\n";
        echo "Sum: " . $list->sumUp() . "\n";
        echo "==============================\n";
    }


    if($option == 5) {
        return false;
    }


}
