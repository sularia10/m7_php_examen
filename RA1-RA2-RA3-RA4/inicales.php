<?php
//1. Números del 1 al 100
for ($i = 1; $i <= 100; $i++) {
    echo $i . "<br>";
}



//2. Tabla de multiplicar del 5
$numero = 5;
for ($i = 1; $i <= 10; $i++) {
    echo "$numero x $i = " . ($numero * $i) . "<br>";
}

//➕ 3. Suma de los primeros N números (N = 10)
$n = 10;
$suma = 0;
$i = 1;
while ($i <= $n) {
    $suma += $i;
    $i++;
}
echo "La suma de los primeros $n números es: $suma";


// 4. Números pares del 1 al 50
for ($i = 1; $i <= 50; $i++) {
    if ($i % 2 == 0) {
        echo $i . "<br>";
    }
}

// Contador regresivo con do...while
$i = 10;
do {
    echo $i . "<br>";
    $i--;
} while ($i >= 1);

//6. Mayor de dos números
$a = 15;
$b = 22;

if ($a > $b) {
    echo "$a es mayor que $b";
} elseif ($b > $a) {
    echo "$b es mayor que $a";
} else {
    echo "Los dos números son iguales";
}

//➕➖ 7. Positivo, negativo o cero
$numero = -3;

if ($numero > 0) {
    echo "Es positivo";
} elseif ($numero < 0) {
    echo "Es negativo";
} else {
    echo "Es cero";
}


//🗳️ 8. ¿Puede votar?
$edad = 17;

if ($edad >= 18) {
    echo "Puede votar";
} else {
    echo "No puede votar";
}


//📝 9. Calificación en texto

$nota = 8;
if ($nota < 5) {
    echo "Insuficiente";
} elseif ($nota < 7) {
    echo "Suficiente";
} elseif ($nota < 9) {
    echo "Notable";
} elseif ($nota <= 10) {
    echo "Sobresaliente";
} else {
    echo "Nota inválida";
}


//10. Sumar un array de números
$numeros = [4, 8, 15, 16, 23, 42];
$suma = 0;

foreach ($numeros as $n) {
    $suma += $n;
}

echo "La suma del array es: $suma";
?>
