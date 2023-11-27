<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* 
*/
//Incluimos el connect a la DB
include 'db_connect.php';

session_start();

$username = $_SESSION['username'];

// Consultar las tareas del usuario actual
$query = "SELECT tarea.id, tarea.titulo, tarea.descripcion FROM tarea
            JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
            JOIN usuarios ON usuarios_tarea.usuario = usuarios.id
            WHERE usuarios.usuario = :username";

$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conn = null; // Cerrar la conexión

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/stylesLog.css">
    <title>Tareas</title>
</head>
<body>
    <div class="container">
        <h1><?php echo strtoupper($_SESSION['username']); ?></h1>
        <h2>Tus tareas:</h2>
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
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["titulo"]; ?></td>
                        <td><?php echo $row["descripcion"]; ?></td>
                        <td>
                            <a href='borrar_tarea.php?id=<?php echo $row["id"];?>'>Borrar</a>
                            <a href='modificar_tarea.php?id=<?php echo $row["id"];?>'>Modificar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <!-- La consulta no contiene registros -->
            <p>No tienes na que hacer</p>
        <?php endif; ?>

        <a href="formularioTarea.php" class="add-task-button">Añadir Tarea</a>
        <a href="cerrarSesion.php" class="logout-link">Cerrar sesión</a>
    </div>
</body>
</html>