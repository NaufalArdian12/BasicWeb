<?php
// Interface for Shape
interface Shape {
    public function calculateArea();
}

// Interface for Color
interface Color {
    public function getColor();
}

// Circle class implementing Shape and Color interfaces
class Circle implements Shape, Color {
    private $radius;
    private $color;

    // Constructor to initialize radius and color
    public function __construct($radius, $color) {
        $this->radius = $radius;
        $this->color = $color;
    }

    // Calculate area of the circle
    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }

    // Get the color of the circle
    public function getColor() {
        return $this->color;
    }
}

// Create a Circle object
$circle = new Circle(5, "Blue");

// Display the area and color of the circle
echo "Area of Circle: " . $circle->calculateArea() . "<br>";
echo "Color of Circle: " . $circle->getColor() . "<br>";
?>
