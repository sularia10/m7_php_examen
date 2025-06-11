<?php
include("db.php");

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    // Validar campos (opcional pero recomendado)
    if (!empty($nombre) && is_numeric($precio)) {
        $stmt = $db->prepare("INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)");
        $stmt->bindValue(':nombre', $nombre, SQLITE3_TEXT);
        $stmt->bindValue(':precio', $precio, SQLITE3_FLOAT);
        $stmt->execute();

        header("Location: index.php");
        exit;
    } else {
        echo "Por favor, completa los campos correctamente.";
    }
}
?>

<h2>Agregar nuevo producto</h2>
<form method="POST">
  Nombre: <input type="text" name="nombre" required><br><br>
  Precio: <input type="number" step="0.01" name="precio" required><br><br>
  <input type="submit" value="Guardar">
</form>

<a href="index.php">Volver al listado</a>
