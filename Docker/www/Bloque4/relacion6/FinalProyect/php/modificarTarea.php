<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Archivo: modificarTarea.php
* Modifica la tarea accediendo a la DB
*/

//Incluimos el connect a la DB
include 'db_connect.php';

//Iniciamos la sesión para poder acceder a los datos de la sesión
session_start();

//Declaramos la variable para almacenar los datos de la sesión
$username = $_SESSION['username'];
$userId = $_SESSION['userId'];

if(isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['tareaId'])){
	$titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tareaId = $_POST['tareaId'];

    //Hacemos el update
    $query = "UPDATE tarea SET titulo = :titulo, descripcion = :descripcion WHERE id = :tareaId";
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':tareaId', $tareaId);
    $stmt->execute();

    //Hacemos la consulta para obtener los datos de la tarea y así usarla a posterior en el html
    $queryInfo = "SELECT titulo FROM tarea WHERE id = :tareaId";
    
    $stmtInfo = $conn->prepare($queryInfo);
    $stmtInfo->bindParam(':tareaId', $tareaId);
    $stmtInfo->execute();
    $tareaInfo = $stmtInfo->fetch();

    $conn = null;
}else {
    header("Location: formularioModificar.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylesLog.css">
    <title>Tarea modificada</title>
</head>
<body>
    <div class="container">
        <h2>Tarea <?php echo $tareaInfo['titulo']?> modificada con exito</h2>
        <a href="tareas.php" class="logout-link">Ver Tareas</a>
        <a href="php/cerrarSesion.php" class="logout-link">Cerrar sesión</a>
    </div>
</body>
</html>