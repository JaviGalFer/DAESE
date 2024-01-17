
<?php
include_once 'Estudiante.php';

$Alumno1 = new Estudiante("Juan", 10, "1º");
$Alumno2 = new Estudiante("marta", 16, "3º");
$Alumno1->agregarNota(5);
$Alumno2->agregarNota(7,5);

echo "Imprimir el primer alumno: " . $Alumno1->obtenerDatos(). "<br>" ;
echo "Imprimir el segundo alumno: " .$Alumno2->obtenerDatos() ."<br>" ;

$graduado1 = new EstudianteGraduado("carlo", 30, "Posgrado", "Doctorado");
$graduado2 = new EstudianteGraduado("juan", 29, "Doctorado", "Posgrado");


$graduado1->agregarNota(8);
$graduado2->agregarNota(7);





?>