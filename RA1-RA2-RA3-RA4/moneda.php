<?php

$cares = 0;
$creus = 0;

for ($i = 0; $i < 1000; $i++) {
    if (rand(0, 1) == 0) {
        $cares++;
    } else {
        $creus++;
    }
}

$total = $cares + $creus;
$pcCares = number_format(($cares / $total) * 100, 2);
$pcCreus = number_format(($creus / $total) * 100, 2);

echo "Han sortit $cares cares i $creus creus.<br>";
echo "Percentatge: $pcCares% cares i $pcCreus% creus.<br><br>";



$un = 0;
$dos = 0;
$tres = 0;
$quatre = 0;
$cinc = 0;
$sis = 0;

for ($i = 0; $i < 1000; $i++) {
  $tirada = rand(1, 6);
  switch ($tirada) {
    case 1:
      $un++;
      break;
    case 2:
      $dos++;
      break;
    case 3:
      $tres++;
      break;
    case 4:
      $quatre++;
      break;
    case 5:
      $cinc++;
      break;
    case 6:
      $sis++;
      break;
  }
}

echo "1: $un<br>";
echo "2: $dos<br>";
echo "3: $tres<br>";
echo "4: $quatre<br>";
echo "5: $cinc<br>";
echo "6: $sis<br>";





?>