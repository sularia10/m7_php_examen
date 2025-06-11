<?php

// Definición de clase
class Producto {
    // Propiedades
    public $nombre;
    public $precio;

    // Constructor
    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;   // $this referencia al objeto actual
        $this->precio = $precio;
    }

    // Método para mostrar info
    public function mostrarInfo() {
        return "Producto: $this->nombre - Precio: $this->precio";
    }
}

// Crear objeto (instancia)
$producto1 = new Producto("Camiseta", 19.99);

// Usar método
echo $producto1->mostrarInfo();

?>
