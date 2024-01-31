<?php
// VISTA PARA INSERTAR/EDITAR DE TAREAS

extract($data);   // Extrae el contenido de $data y lo convierte en variables individuales ($tarea, $todosLosUsuarios y $autoresTarea)



// Sacamos los datos del libro (si existe) a variables individuales para mostrarlo en los inputs del formulario.
// (Si no hay libro, dejamos los campos en blanco y el formulario servirá para inserción).
$idTarea = $tarea->id ?? ""; 
$titulo = $tarea->titulo ?? "";
$descripcion = $tarea->descripcion ?? "";

// Creamos el formulario con los campos de la tarea
echo "<form action = 'index.php' method = 'get'>";
        // Vamos a usar la misma vista para insertar y modificar. Para saber si hacemos una cosa u otra,
        // usaremos la variable $tarea: si existe, es porque estamos modificando una tarea. Si no, estamos insertando uno nuevo.
        if (isset($tarea)) {   
            echo "<h1>Modificación de libros</h1>";
        } else {
            echo "<h1>Inserción de libros</h1>";
        }
echo "
        <input type='hidden' name='idTarea' value='".$idTarea."'>
        <input type='text' name='titulo' placeholder='Título' maxlength='20' value='".$titulo."' required><br>
        <input type='text' name='descripcion' placeholder='Descripción' maxlength='20' value='".$descripcion."' required><br><br>";

// Finalizamos el formulario
if (isset($tarea)) {
    echo "  <input type='hidden' name='action' value='modificarTarea'>";
} else {
    echo "  <input type='hidden' name='action' value='insertarTarea'>";
}
echo "	<p><a href='index.php' class='logout-link'>Volver</a></p>
        <input type='submit'></form>";
        