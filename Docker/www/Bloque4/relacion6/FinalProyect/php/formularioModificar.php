<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Arhivo: formularioModificar.php
* Formulario para modificar una tarea de la DB
*/

//Incluimos el connect a la DB
include 'db_connect.php';

//Iniciamos la sesión para poder acceder a los datos de la sesión
session_start();

//Declaramos la variable para almacenar los datos de la sesión
$username = $_SESSION['username'];
$userId = $_SESSION['userId'];

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
    <link rel="stylesheet" type="text/css" href="../css/stylesMod.css">
    <title>Formulario Modificar Tarea</title>
</head>
<body>
    <div class="container">
        <form action="modificarTarea.php" method="post">
            <h1><?php echo strtoupper($_SESSION['username']); ?></h1>
            <h2>Modificar Tarea '<?php echo $tareaInfo['titulo']; ?>'</h2>
            <input type="hidden" name="tareaId" value="<?php echo $tareaId; ?>">

            <label for="titulo">Nuevo Título</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $tareaInfo['titulo']; ?>" maxlength="20" required><br>

            <label for="descripcion">Nueva Descripción</label>
            <textarea id="descripcion" name="descripcion" maxlength="200" required><?php echo $tareaInfo['descripcion']; ?></textarea><br>

            <input type="submit" value="Actualizar">
            <a href="tareas.php" class="action-link">Volver</a>
        </form>
    </div>
</body>
</html>
