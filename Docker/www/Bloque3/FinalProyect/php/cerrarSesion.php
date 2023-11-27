<?php
/**
 * En esta página se encuentra el código necesario para cerrar la sesión y eliminar la información que haya almacenada en la sesión.
 * 
 * Autor: Francisco Javier Gallego Fernández
 * 
 */

session_start();

session_destroy();

$_SESSION = array(); //nos aseguramos de que $_SESSION está vacio

header("Location: ../index.html");

?>