<?php

//1. 🔢 Array indexado

$colores = ["rojo", "verde", "azul"];
echo $colores[0]; // Muestra: rojo


//2. 🏷️ Array asociativo
$persona = [
    "nombre" => "Juan",
    "edad" => 30,
    "ciudad" => "Madrid"
];
echo $persona["nombre"]; // Muestra: Juan


//3. 🧩 Array multidimensional
$usuarios = [
    ["nombre" => "Ana", "edad" => 25],
    ["nombre" => "Luis", "edad" => 32],
];

echo $usuarios[0]["nombre"]; // Muestra: Ana

//4🔄 RECORRER ARRAYS
$frutas = ["manzana", "banana", "pera"];

foreach ($frutas as $fruta) {
    echo $fruta . "<br>";
}

//5 foreach con índice
$precios = ["pan" => 1.2, "leche" => 0.9];

foreach ($precios as $producto => $precio) {
    echo "$producto: $precio €<br>";
}
?>
