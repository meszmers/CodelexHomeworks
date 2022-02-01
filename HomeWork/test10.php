<?php

//Design a Geometry class with the following methods:

//A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
//Area = π * r * 2
//Use Math.PI for π and r for the radius of the circle
//A static method that accepts the length and width of a rectangle and returns the area of the rectangle. Use the following formula:
//Area = Length x Width
//A static method that accepts the length of a triangle’s base and the triangle’s height. The method should return the area of the triangle. Use the following formula:
//Area = Base x Height x 0.5
//The methods should display an error message if negative values are used for the circle’s radius, the rectangle’s length or width, or the triangle’s base or height.

//Next write a program to test the class, which displays the following menu and responds to the user’s selection:

//Geometry calculator:

//Calculate the Area of a Circle
//Calculate the Area of a Rectangle
//Calculate the Area of a Triangle
//Quit
//Enter your choice (1-4):
//Display an error message if the user enters a number outside the range of 1 through 4 when selecting an item from the menu.
$menu = ["1:Calculate the Area of a Circle","2:Calculate the Area of a Rectangle","3:Calculate the area of Triangle","4:Quit\n"];

foreach ($menu as $showmenu) {
    echo "$showmenu\n";
}
$userfirstinput = readline("Enter your choice (1-4): ");


if ($userfirstinput == 1) {
    $cradius = 0;
    $cradius = readline("Enter Circle radius: ");
    echo "Calculating please hold on\n";
    sleep(1);
    echo "Area: " . $cArea = M_PI * pow($cradius, 2) . "\n";
} elseif ($userfirstinput == 2) {
    $rlength = 0;
    $rWidth = 0;
    $rlength = readline("Please enter Rectangles length: ");
    $rWidth = readline("Please enter Rectangles Width: ");
    echo "Calculating please hold on\n";
    sleep(1);
    echo "Area:" . $rArea = $rlength * $rWidth . "\n";
} elseif ($userfirstinput == 3) {
    $aBase = 0;
    $aHeight = 0;
    $aBase = readline("Please enter Triangles Base: ");
    $aHeight = readline("Please enter Rectangles Height: ");
    echo "Calculating please hold on\n";
    sleep(1);
    echo "Area: " . $aArea = $aBase * $aHeight * 0.5 . "\n";
} elseif ($userfirstinput == 4) {
    echo "See you later! :)\n";

} else echo "Error 404!";














