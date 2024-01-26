<?php
// VISTA PARA INSERCIÓNDE USUARIOS

// extract($data);   // Extrae el contenido de $data y lo convierte en variables individuales ($tarea, $todosLosUsuarios y $autoresTarea)

echo "<h1>LOGIN</h1>";


// Sacamos los datos del libro (si existe) a variables individuales para mostrarlo en los inputs del formulario.
// (Si no hay libro, dejamos los campos en blanco y el formulario servirá para inserción).
// $idUsuario = $Usuario->id ?? "";
$usuario = $Usuario->usuario ?? "";
$password = $Usuario->password ?? "";

// Creamos el formulario con los campos de la tarea
echo "<form action = 'index.php' method = 'get'>
        Usuario:<input type='text' name='usuario' value='".$usuario."'><br>
        Password:<input type='text' name='password' value='".$password."'><br>";

// Finalizamos el formulario
echo "  <input type='hidden' name='action' value='hacerLogin'>";

echo "	<input type='submit'></form>";
echo "<p><a href='index.php'>Volver</a></p>";