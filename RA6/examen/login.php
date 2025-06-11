<?php
session_start();
include("db.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = sha1($_POST['password']); // mismo método que usaste al guardar

    // Buscar usuario
    $stmt = $db->prepare("SELECT * FROM users WHERE usernames = :username AND passwords = :password");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':password', $password, SQLITE3_TEXT);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user) {
        $_SESSION['username'] = $user['usernames'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<h2>Iniciar Sesión</h2>

<?php if ($error): ?>
<p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
  Usuario: <input type="text" name="username" required><br><br>
  Contraseña: <input type="password" name="password" required><br><br>
  <input type="submit" value="Entrar">
</form>
