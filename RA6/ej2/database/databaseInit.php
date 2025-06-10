<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connectar-se a la base de dades (crear si no existeix)
$db = new SQLite3('diariLocal.db', SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);

if (!$db) {
    die("Error de conexión: " . $db->lastErrorMsg());
}
$db->exec("DROP TABLE IF EXISTS categories;");
$db->exec("DROP TABLE IF EXISTS seccions;");
$db->exec("DROP TABLE IF EXISTS productes;");
$db->exec("DROP TABLE IF EXISTS noticies;");

// Crear la tabla 'categories' si no existe
$db->exec("CREATE TABLE IF NOT EXISTS categories (
    cat_id INTEGER PRIMARY KEY AUTOINCREMENT,
    cat_nom TEXT NOT NULL,
    cat_descripcio TEXT NOT NULL,
    cat_imatge TEXT NOT NULL,
    cat_data TEXT NOT NULL
);");

// Insertar datos en la tabla 'categories'
$db->exec("INSERT OR IGNORE INTO categories (cat_nom, cat_descripcio, cat_imatge, cat_data) VALUES
    ('Baño', 'Categoría relacionada con artículos de baño', 'bano.jpg', '2025-03-25'),
    ('Cocina', 'Categoría relacionada con artículos de cocina', 'cocina.jpg', '2025-03-25'),
    ('Dormitori', 'Categoría relacionada con artículos de dormitorio', 'dormitorio.jpg', '2025-03-25'),
    ('Estudio', 'Categoría relacionada con artículos de estudio', 'estudio.jpg', '2025-03-25'),
    ('Menjador', 'Categoría relacionada con artículos de comedor', 'menjador.jpg', '2025-03-25');
");

// Verificar si hubo errores en la inserción de categorías
if ($db->lastErrorMsg() !== "not an error") {
    echo "Error en la inserción de categorías: " . $db->lastErrorMsg();
}

// Crear la tabla 'productes' si no existe
$db->exec("CREATE TABLE IF NOT EXISTS productes (
    prod_id INTEGER PRIMARY KEY AUTOINCREMENT,
    prod_nom TEXT NOT NULL,
    prod_preu FLOAT NOT NULL,
    prod_descripcio TEXT NOT NULL,
    prod_imatge TEXT NOT NULL,
    cat_id INTEGER,
    FOREIGN KEY (cat_id) REFERENCES categories(cat_id) ON DELETE SET NULL ON UPDATE CASCADE
);");

// Insertar datos en la tabla 'productes'
$db->exec("INSERT OR IGNORE INTO productes (prod_nom, prod_preu, prod_descripcio, prod_imatge, cat_id) VALUES
    ('Producto 1', 100.50, 'Descripción del producto 1', 'producto1.jpg', 1),
    ('Producto 2', 200.75, 'Descripción del producto 2', 'producto2.jpg', 2),
    ('Producto 3', 150.25, 'Descripción del producto 3', 'producto3.jpg', 3),
    ('Producto 4', 300.00, 'Descripción del producto 4', 'producto4.jpg', 4),
    ('Producto 5', 50.99, 'Descripción del producto 5', 'producto5.jpg', 5),
    ('Producto 6', 250.00, 'Descripción del producto 6', 'producto6.jpg', 1),
    ('Producto 7', 120.40, 'Descripción del producto 7', 'producto7.jpg', 2),
    ('Producto 8', 180.10, 'Descripción del producto 8', 'producto8.jpg', 3),
    ('Producto 9', 220.30, 'Descripción del producto 9', 'producto9.jpg', 4),
    ('Producto 10', 90.55, 'Descripción del producto 10', 'producto10.jpg', 5);
");

// Verificar si hubo errores en la inserción de productos
if ($db->lastErrorMsg() !== "not an error") {
    echo "Error en la inserción de productos: " . $db->lastErrorMsg();
}

// Cerrar la conexión
$db->close();

?>