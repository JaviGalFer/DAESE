<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* 
*/
session_start();

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
            <h1><?php echo strtoupper($_SESSION['username']); ?></h1>
            <h2>Añadir Tarea</h2>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea><br>

            <input type="submit" value="Añadir Tarea">
            <a href="tareas.php" class="action-link">Volver</a>
        </form>
    </div>
</body>
</html>
