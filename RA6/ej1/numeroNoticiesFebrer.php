<?php

$db = new SQLite3('diariLocal.db');
$query = "SELECT COUNT(*) AS total FROM noticies WHERE strftime('%m', not_data) = '02'";
$result = $db->query($query);

while($row = $result->fetchArray(SQLITE3_ASSOC)){
        echo "Total articles in February: " . $row['total'] . "<br>";
}

$db->close();
?>
