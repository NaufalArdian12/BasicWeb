<?php
// Define a Car class
class Car
{
    // Property to hold the brand of the car
    public $brand;

    // Method to start the engine
    public function startEngine()
    {
        echo "Engine started!";
    }
}

// Create the first car object
// $car1 = new Car();
$car1->brand = "Toyota"; // Set the brand of the first car

// Create the second car object
// $car2 = new Car();
$car2->brand = "Honda"; // Set the brand of the second car

// Call the startEngine method for the first car
$car1->startEngine();

echo "<br>"; // Add a line break for better readability

// Display the brand of the second car
echo $car2->brand;
