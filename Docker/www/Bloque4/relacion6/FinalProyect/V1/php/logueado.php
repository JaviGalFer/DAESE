<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Archivo: logueado.php
* Bienvenida a la página de inicio de sesión.
*/

include_once("./clases/User.php");
//Iniciamos la sesión para poder acceder a los datos de la sesión
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylesLog.css">
    <title>Login Bienvenido</title>
</head>
<body>
    <div class="container">

        <?php $usuario =  $_SESSION['user'];?>
        <h1>Bienvenido <?=$usuario->getUsuario();?></h1>
        <h1>Tu ID es:  <?=$usuario->getIdUser();?></h1>
        <p>¡Has iniciado sesión con éxito!</p>
        <a href="./Tareas.php" class="logout-link">Ver tareas</a>
        <a href="./cerrarSesion.php" class="logout-link">Cerrar sesión</a>
    </div>
</body>
</html>