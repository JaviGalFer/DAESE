<?php
// VISTA PARA LA LISTA DE LIBROS

// Recuperamos la lista de libros
$listaTareas = $data["listaTareas"];

echo "<form action='index.php'>
        <input type='hidden' name='action' value='buscarLibros'>
        <input type='text' name='textoBusqueda'>
        <input type='submit' value='Buscar'>
      </form><br>";

// Ahora, la tabla con los datos de los libros
if (count($listaTareas) == 0) {
  echo "No hay datos";
} else {
  echo "<table border ='1'>";
  foreach ($listaTareas as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->titulo . "</td>";
    echo "<td>" . $fila->descripcion . "</td>";
    echo "<td><a href='index.php?action=formularioModificarLibro&idTarea=" . $fila->id . "'>Modificar</a></td>";
    echo "<td><a href='index.php?action=borrarLibro&idTarea=" . $fila->id . "'>Borrar</a></td>";
    echo "</tr>";
  }
  echo "</table>";
}
echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";