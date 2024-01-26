<?php
// VISTA PARA LA LISTA DE LIBROS

// Recuperamos la lista de libros
$listaTareas = $data["listaTareas"];
$usuario = $_SESSION["usuario"];

echo "<form action='index.php'>
        <input type='hidden' name='action' value='buscarLibros'>
        <input type='text' name='textoBusqueda'>
        <input type='submit' value='Buscar'>
      </form><br>";

      echo "<p>Bienvenido $usuario</p>";

// Ahora, la tabla con los datos de los libros
if (count($listaTareas) == 0) {
  echo "No hay datos";
} else {
  echo "<table border ='1'>";
  foreach ($listaTareas as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->titulo . "</td>";
    echo "<td>" . $fila->descripcion . "</td>";
    echo "<td><a href='index.php?action=formularioModificarTarea&idTarea=" . $fila->id . "'>Modificar</a></td>";
    echo "<td><a href='index.php?action=borrarTarea&idTarea=" . $fila->id . "'>Borrar</a></td>";
    echo "</tr>";
  }
  echo "</table>";
}
echo "<p><a href='index.php?action=formularioInsertarTareas'>Nuevo</a></p>";