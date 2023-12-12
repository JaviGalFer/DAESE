<?php
require_once 'Sesion.php';

$sesion = new Sesion();

// Prueba de setUsuario
$sesion->setUsuario('JohnDoe');

// Prueba de getUsuario
echo "Usuario: " . $sesion->getUsuario() . "<br>";

// Prueba de eliminarUsuario
$sesion->eliminarUsuario();
echo "Usuario después de eliminar: " . $sesion->getUsuario() . "<br>";

// Prueba de destruirSesion
$sesion->destruirSesion();
echo "Usuario después de destruir la sesión: " . $sesion->getUsuario() . "<br>";
?>
