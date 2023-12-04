<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Arhivo: añadirTarea.php
* Añadir tarea a la DB
*/

//Incluimos el connect a la DB
include 'db_connect.php';

//Iniciamos la sesión para poder acceder a los datos de la sesión
session_start();

//Declaramos la variable para almacenar los datos de la sesión
$username = $_SESSION['username'];
$userId = $_SESSION['userId'];

if(isset($_POST['titulo']) && isset($_POST['descripcion'])){
	$titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    //Insertamos la tarea en la DB y ejecutamos con stmt
    $query = "INSERT INTO tarea (titulo, descripcion) VALUES (:titulo, :descripcion)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->execute();

    //obtenemos el id de la tarea insertada para insertar a posterior en la relacional
    $tareaId = $conn->lastInsertId();

    //Insertamos la relación entre usuario y tarea en la DB y ejecutamos con stmt
    $queryRelacion = "INSERT INTO usuarios_tarea (usuario, tarea) VALUES (:usuario, :tarea)";
    
    $stmtRelacion = $conn->prepare($queryRelacion);
    $stmtRelacion->bindParam(':usuario', $userId);
    $stmtRelacion->bindParam(':tarea', $tareaId);
    $stmtRelacion->execute();

    $conn = null;   //Cerramos la conexión a la DB
}else {
    header("Location: formularioTarea.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylesLog.css">
    <title>Tarea Añadida</title>
</head>
<body>
    <div class="container">
        <h2>Tarea añadida con exito</h2>
        <a href="tareas.php" class="logout-link">Ver Tareas</a>
        <a href="php/cerrarSesion.php" class="logout-link">Cerrar sesión</a>
    </div>
</body>
</html>