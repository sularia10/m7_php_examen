<?php
include("db.php");

// Verificar si se pasó un ID por la URL
if (!isset($_GET['id'])) {
    echo "ID no especificado.";
    exit;
}

$id = intval($_GET['id']);

// Preparar y ejecutar la eliminación
$stmt = $db->prepare("DELETE FROM productos WHERE id = :id");
$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
$stmt->execute();

// Redirigir al listado
header("Location: index.php");
exit;
?>
