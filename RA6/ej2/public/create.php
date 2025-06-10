<?php 
include '../database/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nom = $_POST["cat_nom"];
    $descripcio = $_POST["cat_descripcio"];
    $imatge = $_POST["cat_imatge"];
    $data =  date('Y-m-d H:i:s');

    $stmt = $db->prepare("SELECT COUNT(*) FROM categories WHERE cat_nom = ?");
    $stmt->bindValue(1, $nom, SQLITE3_TEXT);
    $result = $stmt->execute();
    $check = $result->fetchArray(SQLITE3_NUM)[0];

 if ($check > 0) {
        echo "<p style='color: red;'>Ja existeix aquesta categoria!</p>";
    } else {
        $sql = "INSERT INTO categories (cat_nom, cat_descripcio, cat_imatge, cat_data) 
                VALUES ('$nom', '$descripcio', '$imatge', '$date')";

        if ($db->exec($sql)) {
            header("Location: index.php");
            exit; 
            echo "<p style='color: red;'>Error en afegir la categoria.</p>";
        }
    }

}
?>


<form method="POST">
    <h2>Crear categoria</h2>
    <label>Nom: <input type="text" name="cat_nom" required></label><br>
    <label>Descripció: <input type="text" name="cat_descripcio"></label><br>
    <label>Imatge (URL): <input type="text" name="cat_imatge"></label><br>

    <button type="submit">Guardar</button>
</from>