<?php
// Car class
class Car {
    private $model;
    private $color;

    // Constructor to initialize model and color
    public function __construct($model, $color) {
        $this->model = $model;
        $this->color = $color;
    }

    // Getter for model
    public function getModel() {
        return $this->model;
    }

    // Setter for color
    public function setColor($color) {
        $this->color = $color;
    }

    // Getter for color
    public function getColor() {
        return $this->color;
    }
}

// Create a Car object
$car = new Car("Toyota", "Blue");

// Display initial values
echo "Model: " . $car->getModel() . "<br>";
echo "Color: " . $car->getColor() . "<br>";

// Update and display new color
$car->setColor("Red");
echo "Updated Color: " . $car->getColor() . "<br>";
?>
