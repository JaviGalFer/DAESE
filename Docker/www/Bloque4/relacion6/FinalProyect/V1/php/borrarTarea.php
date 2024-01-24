<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Arhivo: borrarTarea.php
* Borrar una tarea de la DB
*/
//Incluimos el connect a la DB
include 'db_connect.php';

/////////////////IMPORTANTE//////////////
//Incluimos clases antes de las sesiones
include_once ('./clases/User.php');
include_once ('./clases/Task.php');

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
    $queryInfo = "SELECT titulo FROM tarea WHERE id = :tareaId";
    
    $stmtInfo = $conn->prepare($queryInfo);
    $stmtInfo->bindParam(':tareaId', $tareaId);
    $stmtInfo->execute();
    $tarea_info = $stmtInfo->fetch();

    //Hacemos el borrado de la relación de la tarea con el usuario
    $queryRelacional = "DELETE FROM usuarios_tarea WHERE tarea = :tareaId";
    $stmtRelacional = $conn->prepare($queryRelacional);
    $stmtRelacional->bindParam(':tareaId', $tareaId);
    $stmtRelacional->execute();

    //Hacemos el borrado de la tarea
    $queryDelete = "DELETE FROM tarea WHERE id = :tareaId";
    $stmtDelete = $conn->prepare($queryDelete);
    $stmtDelete->bindParam(':tareaId', $tareaId);
    $stmtDelete->execute();

    $conn = null; //Cerramos la conexión a la DB
}else {
    // header("Location: tareas.php");
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
    <link rel="stylesheet" type="text/css" href="../css/stylesLog.css">
    <title>Tarea borrada</title>
</head>
<body>
    <div class="container">
        <h2>Tarea <?php echo $tarea_info['titulo']?> borrada correctamente</h2>
        <a href="tareas.php" class="logout-link">Ver Tareas</a>
        <a href="php/cerrarSesion.php" class="logout-link">Cerrar sesión</a>
    </div>
</body>
</html>