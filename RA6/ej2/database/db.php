<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $db = new SQLite3(__DIR__ . '/diariLocal.db');
} catch (Exception $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>