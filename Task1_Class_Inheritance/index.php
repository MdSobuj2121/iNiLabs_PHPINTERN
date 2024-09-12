<?php

// Base class
class Shape {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

// Derived class for Circle
class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        parent::__construct("Circle");
        $this->radius = $radius;
    }

    public function getArea() {
        return pi() * pow($this->radius, 2);
    }
}

// Derived class for Rectangle
class Rectangle extends Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        parent::__construct("Rectangle");
        $this->length = $length;
        $this->width = $width;
    }

    public function getArea() {
        return $this->length * $this->width;
    }
}

// Example usage
$circle = new Circle(5);
echo "The area of the " . $circle->getName() . " is " . $circle->getArea() . "\n";

$rectangle = new Rectangle(4, 6);
echo "The area of the " . $rectangle->getName() . " is " . $rectangle->getArea() . "\n";
?>
