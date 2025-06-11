<?php
include("db.php");

// Verifica que venga el ID por GET
if (!isset($_GET['id'])) {
    echo "ID no especificado.";
    exit;
}

$id = intval($_GET['id']);

// Si se envió el formulario (POST), actualiza
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    if (!empty($nombre) && is_numeric($precio)) {
        $stmt = $db->prepare("UPDATE productos SET nombre = :nombre, precio = :precio WHERE id = :id");
        $stmt->bindValue(':nombre', $nombre, SQLITE3_TEXT);
        $stmt->bindValue(':precio', $precio, SQLITE3_FLOAT);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();

        header("Location: index.php");
        exit;
    } else {
        echo "Por favor, completa los campos correctamente.";
    }
}

// Obtener el producto actual
$stmt = $db->prepare("SELECT * FROM productos WHERE id = :id");
$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
$resultado = $stmt->execute();
$producto = $resultado->fetchArray(SQLITE3_ASSOC);

if (!$producto) {
    echo "Producto no encontrado.";
    exit;
}
?>

<h2>Editar producto</h2>
<form method="POST">
  Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required><br><br>
  Precio: <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required><br><br>
  <input type="submit" value="Actualizar">
</form>

<a href="index.php">Volver al listado</a>
