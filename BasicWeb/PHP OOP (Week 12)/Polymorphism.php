<?php
// Shape interface
// Circle class implementing Shape
class Circle implements Shape {
    private $radius;

    // Constructor to initialize radius
    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Calculate area of the circle
    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}

// Rectangle class implementing Shape
class Rectangle implements Shape {
    private $width;
    private $height;

    // Constructor to initialize width and height
    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    // Calculate area of the rectangle
    public function calculateArea() {
        return $this->width * $this->height;
    }
}

// Function to display area
function printArea(Shape $shape) {
    echo "Area: " . $shape->calculateArea() . "<br>";
}

// Create Circle and Rectangle objects
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

// Display areas
printArea($circle);
printArea($rectangle);
?>
