<?php

// Incluir la clase Persona
require ('Persona.php');

// Crear una instancia de Persona
$persona1 = new Persona("Juan", "Pérez", 25);

// Imprimir la información utilizando la función __toString
echo $persona1;

// Llamar a la función saludar
$persona1->saludar();

?>
