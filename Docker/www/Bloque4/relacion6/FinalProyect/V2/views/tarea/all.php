<?php
// VISTA PARA LA LISTA DE LIBROS

// Recuperamos la lista de libros
$listaTareas = $data["listaTareas"];
$usuario = $_SESSION["usuario"];

echo "
      <div class='buscador'>
        <br><form action='index.php'>
          <input type='hidden' name='action' value='buscarTareas'>
          <input type='text' name='textoBusqueda'>
          <input type='submit' value='Buscar'>
        </form><br>
      </div>";

echo "
    <div class='container'> 
      <h1>Bienvenido ".strtoupper($usuario)."</h1>
      <h2>Tus tareas</h2>";

    // Ahora, la tabla con los datos de los libros
    if (count($listaTareas) == 0) {
      echo "No tienes ná que hacer o tarea no encontrada";
    } else {
      echo "<table border ='1'>
              <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
              </tr>";
      foreach ($listaTareas as $fila) {
        echo "
              <tr>
                <td>" . $fila->titulo . "</td>
                <td>"; 
                        $descripcion = $fila->descripcion;
                        if (strlen($descripcion) > 15) {
                            $descripcion = substr($descripcion, 0, 15) . '...';
                            echo $descripcion;
                        } else {
                            echo $descripcion;
                        }
                
                
        echo  "</td>
                <td>
                      <a href='index.php?action=verDetallesTarea&idTarea=" . $fila->id . "' class='logout-link'>Ver Detalles</a>
                      <a href='index.php?action=formularioModificarTarea&idTarea=" . $fila->id . "' class='logout-link'>Modificar</a>
                      <a href='index.php?action=borrarTarea&idTarea=" . $fila->id . "' class='logout-link'>Borrar</a>
                </td>
              </tr>";
      }
      echo "</table>";
    }
echo "  
      <div class='button-container'>
        <p><a href='index.php?action=formularioInsertarTareas' class='logout-link'>Añadir Tarea</a></p>
      </div>
      
      </div>";