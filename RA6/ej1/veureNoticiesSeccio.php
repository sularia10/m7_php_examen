<?php
if (!isset($_GET['seccio'])) {
    echo "Cap secció seleccionada.";
    exit;
}

$seccio = $_GET['seccio'];
$db = new SQLite3('diariLocal.db');

$query = "SELECT * FROM noticies WHERE not_seccio = :seccio";
$stmt = $db->prepare($query);
$stmt->bindValue(':seccio', $seccio, SQLITE3_TEXT);
$result = $stmt->execute();

echo "<h2>Notícies de la secció: $seccio</h2>";

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<p><strong>" . $row['not_titular'] . "</strong><br>";
    echo "<em>" . $row['not_data'] . "</em><br>";
    echo $row['not_cos'] . "</p><hr>";

    //
}

$db->close();
?>
