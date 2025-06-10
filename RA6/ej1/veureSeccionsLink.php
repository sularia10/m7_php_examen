<?php
$db = new SQLite3('diariLocal.db');

$query = "SELECT DISTINCT not_seccio FROM noticies ORDER BY not_seccio ASC";
$result = $db->query($query);

echo "<h2>Seccions disponibles:</h2>";
echo "<ul>";
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $seccio = urlencode($row['not_seccio']); 
    echo "<li><a href='veureNoticiesSeccio.php?seccio=$seccio'>" . $row['not_seccio'] . "</a></li>";
}
echo "</ul>";

$db->close();
?>
