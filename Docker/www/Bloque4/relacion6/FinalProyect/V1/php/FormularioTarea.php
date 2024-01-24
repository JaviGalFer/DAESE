<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Archivo: FormularioTarea.php
* Formulario para agregar una tarea del usuario a la DB
*/

/////////////////IMPORTANTE//////////////
//Incluimos clases antes de las sesiones
include_once ('./clases/User.php');

//Iniciamos la sesión para poder acceder a los datos de la sesión
session_start();
$usuario = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylesMod.css">
    <title>Formulario de Tarea</title>
</head>
<body>
    <div class="container">
        <form action="añadirTarea.php" method="post">
            <h1><?php echo strtoupper($usuario->getUsuario()); ?></h1>
            <h2>Añadir Tarea</h2>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" maxlength="20" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" maxlength="200" required></textarea><br>

            <input type="submit" value="Añadir Tarea">
            <a href="tareas.php" class="action-link">Volver</a>
        </form>
    </div>
</body>
</html>
