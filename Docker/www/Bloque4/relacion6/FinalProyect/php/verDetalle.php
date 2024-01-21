<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Arhivo: verDetalle.php
* Muestra en detalle la información de una tarea.
*/

//Incluimos el connect a la DB
include 'db_connect.php';

/////////////////IMPORTANTE//////////////
//Incluimos clases antes de las sesiones
include_once ('./clases/User.php');

//Iniciamos la sesión para poder acceder a los datos de la sesión
session_start();

//Variables de la sesión para almacenar los datos
$usuario = $_SESSION['user'];
$userId = $usuario->getIdUser();
$username = $usuario->getUsuario(); 

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    // $tareaId = $_GET['id'];
    $tareaId = urldecode($_GET['id']);

    //Hacemos la consulta para obtener los datos de la tarea y así usarla a posterior
    $queryInfo = "SELECT * FROM tarea WHERE id = :tareaId";
    
    $queryInfo = "SELECT tarea.*, usuarios.usuario AS owner_username FROM tarea
                    JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
                    JOIN usuarios ON usuarios_tarea.usuario = usuarios.id
                    WHERE tarea.id = :tareaId AND usuarios.usuario = :username";

    $stmtInfo = $conn->prepare($queryInfo);
    $stmtInfo->bindParam(':tareaId', $tareaId);
    $stmtInfo->bindParam(':username', $username);
    $stmtInfo->execute();
    $tareaInfo = $stmtInfo->fetch();


    if (!$tareaInfo) {
        // La tarea no pertenece al usuario actual
        echo "<script>alert('Error: Tarea no encontrada o no pertenece al usuario.');</script>";
        echo "<script>window.location = './tareas.php';</script>";
        exit();
    }

    $conn = null; //Cerramos la conexión a la DB
}else {
    echo "<script>alert('Error.');</script>";
    echo "<script>window.location = './tareas.php';</script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylesDet.css">
    <title>Formulario ver Tarea</title>
</head>
<body>
    <div class="container">
        <h1><?php echo strtoupper($username); ?></h1>
        <hr>
        <br>
        <h2>Título de la tarea</h2>
        <div class="details-box">
            <h2><?php echo $tareaInfo['titulo']; ?></h2>
        </div>
        <h2>Descripción</h2>
        <div class="details-box">
            <p><strong></strong> <?php echo $tareaInfo['descripcion']; ?></p>
        </div>
        <a href="tareas.php" class="logout-link">Volver</a>
    </div>
</body>
</html>
