<?php
// Agrupem totes les dades rebudes en una sola variable
$dades = [
  "nom" => $_POST["nom"] ?? '',
  "cognoms" => $_POST["cognoms"] ?? '',
  "genere" => $_POST["genere"] ?? '',
  "email" => $_POST["email"] ?? '',
  "edat" => $_POST["edat"] ?? '',
  "ciutat" => $_POST["ciutat"] ?? '',
  "aficions" => $_POST["aficions"] ?? [],
  "motivacions" => $_POST["motivacions"] ?? ''
];

// Mostrem els valors de forma clara
echo "<h2>Dades rebudes:</h2>";
echo "Nom complet: " . htmlspecialchars($dades["nom"]) . " " . htmlspecialchars($dades["cognoms"]) . "<br>";
echo "Gènere: " . htmlspecialchars($dades["genere"]) . "<br>";
echo "Email: " . htmlspecialchars($dades["email"]) . "<br>";
echo "Edat: " . htmlspecialchars($dades["edat"]) . "<br>";
echo "Ciutat: " . htmlspecialchars($dades["ciutat"]) . "<br>";

echo "Aficions: ";
if (!empty($dades["aficions"])) {
  echo implode(", ", array_map('htmlspecialchars', $dades["aficions"])) . "<br>";
} else {
  echo "Cap seleccionada<br>";
}

echo "Motivacions personals:<br>" . nl2br(htmlspecialchars($dades["motivacions"])) . "<br>";
?>
