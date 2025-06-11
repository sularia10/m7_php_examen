<?php
session_start();

if (!isset($_SESSION["usuarioGana"])) $_SESSION["usuarioGana"] = 0;
if (!isset($_SESSION["maquinaGana"])) $_SESSION["maquinaGana"] = 0;
if (!isset($_SESSION["empate"])) $_SESSION["empate"] = 0;
if (!isset($_SESSION["total"])) $_SESSION["total"] = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numUser = $_POST['numUser'];

    if ($numUser < 1 || $numUser > 3) {
        echo "El número debe estar entre 1 y 3";
        exit();
    }

    $_SESSION["numUser"] = $numUser;
    $_SESSION["numMaq"] = rand(1, 3);
    $numMaq = $_SESSION["numMaq"];

    echo "Usuario eligió: $numUser<br>";
    echo "Máquina eligió: $numMaq<br>";

    if ($numUser == $numMaq) {
        $_SESSION["empate"]++;
    } elseif (($numUser == 1 && $numMaq == 2) ||
              ($numUser == 2 && $numMaq == 3) ||
              ($numUser == 3 && $numMaq == 1)) {
        $_SESSION["maquinaGana"]++;
    } else {
        $_SESSION["usuarioGana"]++;
    }

    $_SESSION["total"]++;

    $usuarioGana = $_SESSION["usuarioGana"];
    $maquinaGana = $_SESSION["maquinaGana"];
    $empate = $_SESSION["empate"];
    $total = $_SESSION["total"];

    $porcentajeUsuario = ($total > 0) ? ($usuarioGana / $total) * 100 : 0;
    $porcentajeMaquina = ($total > 0) ? ($maquinaGana / $total) * 100 : 0;
    $porcentajeEmpate = ($total > 0) ? ($empate / $total) * 100 : 0;

    echo "<br><strong>Estadísticas:</strong><br>";
    echo "Usuario gana: $usuarioGana (" . round($porcentajeUsuario, 2) . "%)<br>";
    echo "Máquina gana: $maquinaGana (" . round($porcentajeMaquina, 2) . "%)<br>";
    echo "Empates: $empate (" . round($porcentajeEmpate, 2) . "%)<br>";
    echo "Total de juegos: $total<br>";
}
?>

<h2>Elige: Piedra = 1, Papel = 2, Tijera = 3</h2>
<form method="POST">
  Número: <input type="number" name="numUser" min="1" max="3" required><br><br>
  <input type="submit" value="Jugar">
</form>
