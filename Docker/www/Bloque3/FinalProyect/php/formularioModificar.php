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
    <title>Formulario Modificar Tarea</title>
</head>
<body>
    <div class="container">
        
        <?php
        // Verificamos si se ha pasado un ID de tarea válido
        if(isset($_GET['id']) && is_numeric($_GET['id'])) {
            $tareaId = $_GET['id'];
            $titulo = urldecode($_GET['titulo']);
            $descripcion = urldecode($_GET['descripcion']);
        ?>
        <form action="modificarTarea.php" method="post">
            <h1><?php echo strtoupper($_SESSION['username']); ?></h1>
            <h2>Modificar Tarea '<?php echo $titulo; ?>'</h2>
            <input type="hidden" name="tareaId" value="<?php echo $tareaId; ?>">

            <label for="titulo">Nuevo Título</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" required><br>

            <label for="descripcion">Nueva Descripción</label>
            <textarea id="descripcion" name="descripcion" required><?php echo $descripcion; ?></textarea><br>

            <input type="submit" value="Actualizar">
            <a href="tareas.php" class="action-link">Volver</a>
        </form>
        
        <?php
        } else {
            echo "ID de tarea no válido";
        }
        ?>
    </div>
</body>
</html>
