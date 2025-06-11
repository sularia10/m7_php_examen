<?php
class Animal {
    public function hacerSonido() {
        echo "Sonido genérico";
    }
}

class Perro extends Animal {
    public function hacerSonido() {
        echo "Guau Guau";
    }
}

$animal = new Animal();
$animal->hacerSonido();  // Sonido genérico

echo "\n";

$perro = new Perro();
$perro->hacerSonido();   // Guau Guau
?>
