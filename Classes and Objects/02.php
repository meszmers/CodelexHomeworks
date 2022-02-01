<?php

class Point {
    private int $numX;
    private int $numY;
    public function __construct($numX, $numY)
    {
        $this->numX = $numX;
        $this->numY = $numY;
    }
    function swapPoints(Point $x, Point $y): void {
        $currentX = $x->numX;
        $currentY = $x->numY;

        $x->numY = $y->numY;
        $x->numX = $y->numX;
        $y->numX = $currentX;
        $y->numY = $currentY;
    }


    public function getNumX(): int
    {
        return $this->numX;
    }
    function getNumY(): int
    {
        return $this->numY;
    }
}


$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

echo $p1->getNumX() ." ". $p1->getNumY() . "\n";
echo $p2->getNumX() ." ". $p2->getNumY() . "\n";

$p1->swapPoints($p1, $p2);


echo $p1->getNumX() ." ". $p1->getNumY() . "\n";
echo $p2->getNumX() ." ". $p2->getNumY() . "\n";

