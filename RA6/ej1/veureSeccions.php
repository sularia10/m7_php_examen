<?php

$db = new SQLite3('diariLocal.db');
$query = "SELECT DISTINCT not_seccio FROM noticies";
$result = $db->query($query);

while($row = $result->fetchArray(SQLITE3_ASSOC)){
    echo $row['not_seccio'] ."<br>";
}

$db->close();
?>
