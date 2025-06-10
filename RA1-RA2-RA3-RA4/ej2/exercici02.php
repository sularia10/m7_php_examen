<?php

$text = $_POST["text"];
$paraula = $_POST["paraula"];

$long = strlen($text);
$comptador = substr_count($text, $paraula);

echo "Longitud del text: $long<br>";
echo "Coincidències de '$paraula': $comptador<br>";

?>
