<?php
// Base Animal class
class Animal
{
  protected $name;

  // Constructor to initialize name
  public function __construct($name)
  {
    $this->name = $name;
  }

  // Method to simulate eating
  public function eat()
  {
    echo $this->name . " is eating.<br>";
  }

  // Method to simulate sleeping
  public function sleep()
  {
    echo $this->name . " is sleeping.<br>";
  }
}

// Cat class inheriting from Animal
class Cat extends Animal
{
  // Method for cat-specific behavior
  public function meow()
  {
    echo $this->name . " says meow!<br>";
  }
}

// Dog class inheriting from Animal
class Dog extends Animal
{
  // Method for dog-specific behavior
  public function bark()
  {
    echo $this->name . " says woof!<br>";
  }
}

// Create Cat and Dog objects
$cat = new Cat("Whiskers");
$dog = new Dog("Buddy");

// Demonstrate behavior
$cat->eat();
$cat->sleep();
$cat->meow();

$dog->eat();
$dog->sleep();
$dog->bark();
