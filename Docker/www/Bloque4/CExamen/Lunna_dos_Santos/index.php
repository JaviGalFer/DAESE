<?php
require('Estudiante.php');

$estudiante_A = new Estudiante("Diego", 40, "1º", "Doctorado");
$estudiante_B = new Estudiante("Julia", 27, "4º", "Posgrado");

$estudiante_A->agregarNota(7);
$estudiante_A->agregarNota(4);
$estudiante_A->agregarNota(10);

$estudiante_B->agregarNota(8);
$estudiante_B->agregarNota(9);
$estudiante_B->agregarNota(6);



echo "Nombre: " . $estudiante_A->getNombre() . "<br>";
echo "Edad: " . $estudiante_A->getEdad() . " años<br>";
echo "Curso: " . $estudiante_A->getCurso(). "<br>";
//echo "Graduado: " . $estudiante_A->getNivel() . "<br>";
echo "Media de notas: " . $estudiante_A->obtenerMedia() . "<br><br>";

echo "Nombre: " . $estudiante_B->getNombre() . "<br>";
echo "Edad: " . $estudiante_B->getEdad() . " años<br>";
echo "Curso: " . $estudiante_B->getCurso(). "<br>";
//echo "Graduado: " . $estudiante_A->getNivel() . "<br>";
echo "Media de notas: " . $estudiante_B->obtenerMedia();