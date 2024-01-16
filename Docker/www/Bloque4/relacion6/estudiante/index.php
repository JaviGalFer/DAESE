<?php
//Script principal para probar la clase Estudiante.php con las accciones de crear dos estudiantes con información
//usando su constructor que contiene nombre,edad curso y notas(el cual es un array), 
//usar método AgregarNota e imprimir la información, incluido su media de notas con el método ObtenerPromedio.

require_once('clases/Estudiante.php');
require_once('clases/EstudianteGraduado.php');

//Creamos el primer estudiante

$estudiante1 = new Estudiante('Ataulfito',13,'1A');

//Agregamos notas al estudiante

$estudiante1->AgregarNota(5);

$estudiante1->AgregarNota(4);

$estudiante1->AgregarNota(6);

//Creamos el primer estudiante

$estudiante2 = new Estudiante('Anacleto',15,'2C');

//Agregamos notas al estudiante

$estudiante2->AgregarNota(8);

$estudiante2->AgregarNota(8);

$estudiante2->AgregarNota(9);

//Imprimimos la información de los estudiantes

echo $estudiante1->getInformacion();
echo "<br>";
echo $estudiante2->getInformacion();

//------------ESTUDIANTESGRADUADOS----------//

echo "<br>";
echo "<br>";
echo "<strong>Estudiantes Graduados</strong>";
echo "<br>";
//Creamos EstudiantesGraduados

$estudiante3 = new EstudianteGraduado('Amparo',22,'1', 'Doctorado');

$estudiante3->AgregarNota(5);

$estudiante3->AgregarNota(4);

$estudiante3->AgregarNota(6);

//Creamos el primer estudiante

$estudiante4 = new EstudianteGraduado('Pedrito',23,'1', 'posgrado');

//Agregamos notas al estudiante

$estudiante4->AgregarNota(8);

$estudiante4->AgregarNota(8);

$estudiante4->AgregarNota(9);

//Imprimimos la información de los estudiantes

echo $estudiante3->getInformacion();
echo "<br>";
echo $estudiante4->getInformacion();


?>