<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* 
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

    $query = "INSERT INTO tarea (titulo, descripcion) VALUES (:titulo, :descripcion)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->execute();

    //obtenemos el id de la tarea insertada
    $tareaId = $conn->lastInsertId();

    $queryRelacion = "INSERT INTO usuarios_tarea (usuario, tarea) VALUES (:usuario, :tarea)";
    
    $stmtRelacion = $conn->prepare($queryRelacion);
    $stmtRelacion->bindParam(':usuario', $userId);
    $stmtRelacion->bindParam(':tarea', $tareaId);
    $stmtRelacion->execute();

    $conn = null;
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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Tarea Añadida</title>
</head>
<body>
    <div class="container">
        <h2>Tarea añadida con exito</h2>
        <a href="tareas.php" class="view-tasks-button">Ver Tareas</a>
        <a href="php/cerrarSesion.php" class="logout-link">Cerrar sesión</a>
    </div>
</body>
</html>