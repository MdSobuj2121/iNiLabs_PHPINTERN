<?php

// Base Animal class
class Animal {
    // Method to make sound (will be overridden in derived classes)
    public function makeSound() {
        echo "Some generic animal sound\n";
    }
}

// Dog class that extends Animal
class Dog extends Animal {
    // Overriding makeSound method
    public function makeSound() {
        echo "Bark! Bark!\n";
    }
}

// Cat class that extends Animal
class Cat extends Animal {
    // Overriding makeSound method
    public function makeSound() {
        echo "Meow! Meow!\n";
    }
}

// Cow class that extends Animal
class Cow extends Animal {
    // Overriding makeSound method
    public function makeSound() {
        echo "Hamba! Hamba!\n";
    }
}

// Example usage of polymorphism
function describeAnimalSound(Animal $animal) {
    $animal->makeSound();
}

$dog = new Dog();
$cat = new Cat();
$cow = new Cow();

describeAnimalSound($dog);  // Output: Bark! Bark!
describeAnimalSound($cat);  // Output: Meow! Meow!
describeAnimalSound($cow);  // Output: Hamba! Hamba!

?>
