<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* 
*/
//Datos de la DB
$host = "db";
$dbUsername = "root";
$dbPassword = "test";
$dbName = "tareas";

try {
    //Conexión a DB
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

    // Comprobación de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>