<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conectar a la base de datos SQLite
$db = new SQLite3('examen.db', SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);

if (!$db) {
    die("Error de conexión: " . $db->lastErrorMsg());
}

// Eliminar tablas si existen
$db->exec("DROP TABLE IF EXISTS users;");
$db->exec("DROP TABLE IF EXISTS productos;");

// Crear tabla 'users'
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usernames TEXT NOT NULL,
    passwords TEXT NOT NULL
);");

// Insertar usuario con SHA1 generado en PHP
$username = 'admin';
$password = sha1('1234'); // También podrías usar password_hash()
$db->exec("INSERT INTO users (usernames, passwords) VALUES ('$username', '$password');");

// Crear tabla 'productos'
$db->exec("CREATE TABLE IF NOT EXISTS productos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT,
    precio REAL
);");

// Insertar datos en 'productos'
$db->exec("INSERT INTO productos (nombre, precio) VALUES
    ('Producto 1', 100.50),
    ('Producto 2', 200.75),
    ('Producto 3', 150.25),
    ('Producto 4', 300.00),
    ('Producto 5', 50.99),
    ('Producto 6', 250.00),
    ('Producto 7', 120.40),
    ('Producto 8', 180.10),
    ('Producto 9', 220.30),
    ('Producto 10', 90.55);
");

// Mostrar errores si los hay
if ($db->lastErrorMsg() !== "not an error") {
    echo "Error: " . $db->lastErrorMsg();
}

// Cerrar conexión
$db->close();
?>
