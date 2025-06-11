<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include("db.php");

// Ejecutar consulta
$resultado = $db->query("SELECT * FROM productos");
?>

<h2>Productos</h2>
<p>Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
<a href="add.php">Agregar nuevo</a> | <a href="logout.php">Cerrar sesión</a><br><br>

<table border="1">
<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Acciones</th></tr>
<?php while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) { ?>
<tr>
    <td><?= $fila['id'] ?></td>
    <td><?= htmlspecialchars($fila['nombre']) ?></td>
    <td><?= $fila['precio'] ?></td>
    <td>
        <a href="edit.php?id=<?= $fila['id'] ?>">Editar</a>
        <a href="delete.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
    </td>
</tr>
<?php } ?>
</table>
