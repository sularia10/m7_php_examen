<?php

$db= new SQLite3('diariLocal.db');
$query = "SELECT * FROM noticies WHERE not_seccio ='Cultura' ";
$result = $db->query($query);

while($row = $result->fetchArray(SQLITE3_ASSOC)){
    echo $row['not_id'] . " ---- " . $row['not_titular'] ."------" . $row['not_cos']  ."------" . $row['not_data'] . "-----" . $row['not_seccio'] ."<br>";
}
$db->close();


?>