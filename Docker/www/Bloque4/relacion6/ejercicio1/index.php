<?php

// Incluir la clase Persona
require ('Persona.php');

// Crear una instancia de Persona
$persona1 = new Persona("Juan", "Pérez", 25);

// Imprimir la información utilizando la función __toString
echo "Información de la persona 1 con toString: <br>";
echo $persona1;

echo "<br>";

// Llamar a la función saludar
echo "Saludar a la persona 1: <br>";
$persona1->saludar();

echo "<br>";

//Llamamos a la función esMayorEdad
echo "Es mayor de edad? <br>";
if ($persona1->esMayorEdad()) {
    echo "Sí";
} else {
    echo "No";
}
echo "<br><br>";

//Llamamos a la función mostrar nombre completo

echo "Nombre completo: <br>";
echo $persona1->getNombreCompleto();

echo "<br><br>";

?>
