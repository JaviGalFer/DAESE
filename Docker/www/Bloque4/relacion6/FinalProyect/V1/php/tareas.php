<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Archivo: tareas.php
* Muestra todas las tareas del usuario en una tabla.
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

// Consulta de las tareas del usuario actual
$query = "SELECT tarea.id, tarea.titulo, tarea.descripcion FROM tarea
            JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
            JOIN usuarios ON usuarios_tarea.usuario = usuarios.id
            WHERE usuarios.usuario = :username";
//Ejecutamos la consulta
$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_OBJ);
$result = $stmt->fetchAll(PDO::FETCH_CLASS, "Task");
// $_SESSION['tareas'] = $result[0];
// $tareas = $_SESSION['tareas'];

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
        <h1><?php echo strtoupper($username); ?></h1>
        <h1><?php echo strtoupper($userId); ?></h1>
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
                        <td><?php echo $row->getId(); ?></td>
                        <td><?php echo $row->getTitulo(); ?></td>
                        <td>
                            <!-- <?php echo $row->getDescripcion(); ?> -->
                            <?php
                                $descripcion = $row->getDescripcion();
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
                            <a href="verDetalle.php?id=<?=urlencode($row->getId());?>" class="action-link"> Ver detalles</a>
                            <a href='borrarTarea.php?id=<?php echo urlencode($row->getId());?>' class="action-link">Borrar</a>
                            <a href='formularioModificar.php?id=<?php echo urlencode($row->getId());?>' class="action-link">Modificar</a>

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