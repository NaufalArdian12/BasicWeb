<?php
// Abstract Shape class
abstract class Shape {
    // Abstract method to calculate area
    abstract public function calculateArea();
}

// Circle class extending Shape
class Circle extends Shape {
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

// Rectangle class extending Shape
class Rectangle extends Shape {
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

// Create Circle and Rectangle objects
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

// Display the calculated areas
echo "Area of Circle: " . $circle->calculateArea() . "<br>";
echo "Area of Rectangle: " . $rectangle->calculateArea() . "<br>";
?>
