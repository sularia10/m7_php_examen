<?php
session_start();

// Inicialització de la partida
if (!isset($_SESSION["numero_magic"])) {
  do {
    $_SESSION["numero_magic"] = rand(0, 10);
  } while (in_array($_SESSION["numero_magic"], $_SESSION["anteriors"] ?? []));

  $_SESSION["intents"] = 0;
  $_SESSION["jugades"] = [];
  $_SESSION["anteriors"][] = $_SESSION["numero_magic"];
  $_SESSION["fi"] = false;
}

$missatge = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["number"])) {
  $usuari = (int) $_POST["number"];

  if ($_SESSION["fi"]) {
    $missatge = "El joc ha acabat. Refresca per començar una nova partida.";
  } elseif (in_array($usuari, $_SESSION["jugades"])) {
    $missatge = "Ja has provat el número $usuari. Intenta'n un altre.";
  } else {
    $_SESSION["jugades"][] = $usuari;
    $_SESSION["intents"]++;

    if ($usuari == $_SESSION["numero_magic"]) {
      $missatge = "🎉 Felicitats! Has encertat el número màgic ({$usuari}) en {$_SESSION["intents"]} intents.";
      $_SESSION["fi"] = true;
    } elseif ($_SESSION["intents"] >= 3) {
      $missatge = "❌ Has exhaurit els intents. El número era {$_SESSION["numero_magic"]}.";
      $_SESSION["fi"] = true;
    } elseif ($usuari < $_SESSION["numero_magic"]) {
      $missatge = "🔼 El número màgic és més gran que $usuari.";
    } else {
      $missatge = "🔽 El número màgic és més petit que $usuari.";
    }
  }
}

// Reiniciar partida si l’usuari ho vol
if (isset($_POST["reiniciar"])) {
  unset($_SESSION["numero_magic"], $_SESSION["intents"], $_SESSION["jugades"], $_SESSION["fi"]);
  $missatge = "🎲 Nova partida iniciada!";
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8">
  <title>Joc del Número Màgic</title>
</head>
<body>
  <h2>Endevina el número màgic (entre 0 i 10)</h2>

  <form method="POST">
    <label>Introdueix un número:</label>
    <input type="number" name="number" min="0" max="10" required <?= $_SESSION["fi"] ? "disabled" : "" ?>>
    <button type="submit" <?= $_SESSION["fi"] ? "disabled" : "" ?>>Comprova</button>
  </form>

  <form method="POST" style="margin-top:1em;">
    <button type="submit" name="reiniciar">Nova partida</button>
  </form>

  <p><?= $missatge ?></p>

  <p>Jugades anteriors: <?= implode(", ", $_SESSION["jugades"]) ?></p>
  <p>Partides anteriors amb els números màgics: <?= implode(", ", $_SESSION["anteriors"]) ?></p>
</body>
</html>
