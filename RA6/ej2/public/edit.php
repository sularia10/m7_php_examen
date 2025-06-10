<?php
include '../database/db.php';

// Comprobar si el ID de la categoría está en la URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Obtener la categoría de la base de datos
    $sql = "SELECT * FROM categories WHERE cat_id = $id";
    $result = $db->query($sql);
    $categoria = $result->fetchArray(SQLITE3_ASSOC);

    // Comprobar si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = $_POST['nom'];
        $desc = $_POST['descripcio'];

        // Actualizar la categoría
        $sql_update = "UPDATE categories SET cat_nom = '$nom', cat_descripcio = '$desc' WHERE cat_id = $id";
        $db->exec($sql_update);

        echo "Categoria modificada amb èxit!";
        header("Location: index.php");
        exit;
    }
} else {
    echo "Error: No se proporcionó un ID de categoría.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Categoria</title>
</head>
<body>
    <h1>Modificar Categoria</h1>
    <form method="post">
        <label>Nom:</label>
        <input type="text" name="nom" value="<?= $categoria['cat_nom'] ?>" required><br>

        <label>Descripció:</label>
        <input type="text" name="descripcio" value="<?= $categoria['cat_descripcio'] ?>"><br>

        <button type="submit">Modificar</button>
    </form>
</body>
</html>