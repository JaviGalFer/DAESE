<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Archivo: tareas.php
* Muestra todas las tareas del usuario en una tabla.
*/

//Incluimos el connect a la DB
include 'db_connect.php';

//Iniciamos la sesión para poder acceder a los datos de la sesión
session_start();

//Variables de la sesión para almacenar los datos
$username = $_SESSION['username'];
$userId = $_SESSION['userId'];

// Consulta de las tareas del usuario actual
$query = "SELECT tarea.id, tarea.titulo, tarea.descripcion FROM tarea
            JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
            JOIN usuarios ON usuarios_tarea.usuario = usuarios.id
            WHERE usuarios.usuario = :username";
//Ejecutamos la consulta
$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$conn = null; // Cerramos la conexión

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylesTarea.css">
    <title>Tareas</title>
</head>
<body>
    <div class="container">
        <h1><?php echo strtoupper($_SESSION['username']); ?></h1>
        <hr>
        <h2>Tus tareas</h2>
        <?php if (!empty($result)): ?>
            <!-- La consulta ha devuelto registros: vamos a mostrarlos -->
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>

                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->titulo; ?></td>
                        <td>
                            <!-- <?php echo $row->descripcion; ?> -->
                            <?php
                                $descripcion = $row->descripcion;
                                if (strlen($descripcion) > 15) {
                                    $descripcion = substr($descripcion, 0, 15) . '...';
                                    echo $descripcion;
                                    // echo '<a href="verDetalle.php?id=' . $row["id"] . '" class="action-link"> Ver detalles</a>';
                                } else {
                                    echo $descripcion;
                                }
                            ?>
                        
                        </td>
                        <td >
                            <a href="verDetalle.php?id=<?=urlencode($row->id);?>" class="action-link"> Ver detalles</a>
                            <a href='borrarTarea.php?id=<?php echo urlencode($row->id);?>' class="action-link">Borrar</a>
                            <a href='formularioModificar.php?id=<?php echo urlencode($row->id);?>' class="action-link">Modificar</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <!-- La consulta no contiene registros -->
            <p>No tienes ná que hacer</p>
        <?php endif; ?>
        <div class="button-container">
            <a href="formularioTarea.php" class="logout-link">Añadir Tarea</a>
            <a href="cerrarSesion.php" class="logout-link">Cerrar sesión</a>
        </div>
    </div>
</body>
</html>