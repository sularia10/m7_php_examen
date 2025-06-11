<?php
echo "<h2>Funciones de arrays en PHP</h2>";

$frutas = ["manzana", "banana", "pera", "naranja"];

echo "<h3>1. count()</h3>";
echo "Cantidad de frutas: " . count($frutas) . "<br>";

echo "<h3>2. array_push()</h3>";
array_push($frutas, "uva");
echo "Frutas después de agregar 'uva':<br>";
print_r($frutas);
echo "<br>";

echo "<h3>3. array_pop()</h3>";
$ultima = array_pop($frutas);
echo "Elemento eliminado: $ultima<br>";
echo "Frutas actuales:<br>";
print_r($frutas);
echo "<br>";

echo "<h3>4. array_keys()</h3>";
$persona = ["nombre" => "Lucía", "edad" => 28, "ciudad" => "Lima"];
$claves = array_keys($persona);
print_r($claves);
echo "<br>";

echo "<h3>5. array_values()</h3>";
$valores = array_values($persona);
print_r($valores);
echo "<br>";

echo "<h3>6. in_array()</h3>";
if (in_array("pera", $frutas)) {
    echo "La fruta 'pera' está en el array.<br>";
} else {
    echo "La fruta 'pera' no está en el array.<br>";
}

echo "<h3>7. sort()</h3>";
sort($frutas); // Ordena valores sin conservar claves
echo "Frutas ordenadas:<br>";
print_r($frutas);
echo "<br>";

echo "<h3>8. asort()</h3>";
$precios = ["pan" => 1.0, "leche" => 0.8, "queso" => 3.5];
asort($precios); // Ordena por valor y mantiene claves
echo "Precios ordenados por valor:<br>";
print_r($precios);
echo "<br>";

echo "<h3>9. ksort()</h3>";
ksort($precios); // Ordena por clave
echo "Precios ordenados por clave:<br>";
print_r($precios);
echo "<br>";
?>
