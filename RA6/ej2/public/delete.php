<?php
include '../database/db.php';

if (!$db) {
    echo "<p style='color: red;'>Error de conexión a la base de datos.</p>";
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $sql = "DELETE FROM categories WHERE cat_id = $id";
    if ($db->exec($sql)) {
        echo "<p style='color: green;'>Categoría eliminada correctamente.</p>";
        header("Location: index.php");
        exit; 
    } else {
        echo "<p style='color: red;'>Error al eliminar la categoría.</p>";
    }
} else {
    echo "<p style='color: red;'>ID de categoría no válido.</p>";
}
?>