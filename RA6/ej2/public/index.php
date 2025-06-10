<?php
include '../database/db.php';

$result = $db->query("SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Llista de Categories</title>
</head>
<body>
    <h1>Llista de Categories</h1>
    <a href="create.php">Afegir Categoria</a>
    <a href="view.php">Ver Todos los Productos</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Descripció</th>
            <th>Accions</th>
        </tr>
        <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
            <tr>
                <td><?= $row['cat_id'] ?></td>
                <td><?= $row['cat_nom'] ?></td>
                <td><?= $row['cat_descripcio'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['cat_id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= $row['cat_id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>