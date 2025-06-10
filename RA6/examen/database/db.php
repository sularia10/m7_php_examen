<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try{
    $db = new SQLite3("database.db");
}catch(Exception $e){
    die("Error al connectar con la base de datos");
}

?>