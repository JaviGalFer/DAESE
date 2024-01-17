<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
  require_once('Estudiante.php');
  require_once('EstudianteGraduado.php');

  $Estudiante1= new Estudiante('Jose', '19', '1º');
  $Estudiante2= new Estudiante('Maria', '20', '2º');
  
  $Estudiante1-> agregarNota('1');
  $Estudiante1-> agregarNota('7');
  $Estudiante1-> agregarNota('9');

  $Estudiante2-> agregarNota('2');
  $Estudiante2-> agregarNota('9');
  $Estudiante2-> agregarNota('5');

  $EstudianteGraduado1= new EstudianteGraduado('Marcos', '24', '4º', 'Doctorado');
  $EstudianteGraduado2= new EstudianteGraduado('Lucia', '26', '4º', 'Posgrado');

  $EstudianteGraduado1-> agregarNota('9');
  $EstudianteGraduado1-> agregarNota('7');
  $EstudianteGraduado1-> agregarNota('8');

  $EstudianteGraduado2-> agregarNota('5');
  $EstudianteGraduado2-> agregarNota('8');
  $EstudianteGraduado2-> agregarNota('7');

  echo "<b>Estudiante 1: </b>".$Estudiante1->getNombre()."<b> Notas: </b>".implode(",",$Estudiante1->getNotas())."<b> Media De Notas: </b>".$Estudiante1->obtenerNotaMedia()."<br>";
  echo "<b>Estudiante 2: </b>".$Estudiante2->getNombre()."<b> Notas: </b>".implode(",",$Estudiante2->getNotas())."<b> Media De Notas:  </b>".$Estudiante2->obtenerNotaMedia()."<br>";
  echo "<b>Estudiante Graduado 1: </b>".$EstudianteGraduado1->getNombre()."<b> Notas: </b>".implode(",",$EstudianteGraduado1->getNotas())."<b> Media De Notas: </b>".$EstudianteGraduado1->obtenerNotaMedia()."<b> Nivel: </b>".$EstudianteGraduado1->getNivel()."<br>";
  echo "<b>Estudiante Graduado 2: </b>".$EstudianteGraduado2->getNombre()."<b> Notas: </b>".implode(",",$EstudianteGraduado2->getNotas())."<b> Media De Notas: </b>".$EstudianteGraduado2->obtenerNotaMedia()."<b> Nivel: </b>".$EstudianteGraduado1->getNivel()."<br>";
  ?>
</body>
</html>