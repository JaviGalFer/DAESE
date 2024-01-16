<?php
//Clase EstudianteGraduado extendida de la clase Estudiante con la propiedad llamada nivel, que almacenara valores
//como "doctorado" o "posgrado"

require_once("Estudiante.php");

class EstudianteGraduado extends Estudiante{
    private $nivel;

    //Constructor de la clase EstudianteGraducado que contiene datos del estudiante como nombre, edad, curso y nivel
function __construct($nombre,$edad, $curso, $nivel){
    parent::__construct($nombre,$edad,$curso); // Debería funcionar pero aparentemente no funciona
    $this->nombre = $nombre;
    $this->edad = $edad;
    $this->curso = $curso;
    $this->nivel = $nivel;
} 

public function setNivel($nivel){
    $this->nivel = $nivel;
}
public function getNivel(){
    return $this->nivel;
}

//Metodo que muestra los datos del estudiante
public function getInformacion(){
    $media = $this->ObtenerMedia();
    return "Nombre: $this->nombre, Edad: $this->edad, Curso: $this->curso, Nivel: $this->nivel, Media: $media";


}



}





?>