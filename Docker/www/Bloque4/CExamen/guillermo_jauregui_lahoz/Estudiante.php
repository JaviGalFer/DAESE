<?php
class Estudiante{
  private $Nombre;
  private $Edad;
  private $Curso;

  private $Notas;

  public function __construct($Nombre,$Edad,$Curso){
    $this->Nombre = $Nombre;
    $this->Edad = $Edad;
    $this->Curso = $Curso;
    $this->Notas= [];
  }

  public function getNombre() {
    return $this->Nombre;
}

public function getEdad() {
    return $this->Edad;
}

public function getCurso() {
    return $this->Curso;
}

public function getNotas() {
    return $this->Notas;
}

public function setNombre($Nombre) {
    $this->Nombre = $Nombre;
}

public function setEdad($Edad) {
    $this->Edad = $Edad;
}

public function setCurso($Curso) {
    $this->Curso = $Curso;
}

public function setNotas($Notas) {
    $this->Notas = $Notas;
}
  
  public function agregarNota($Nota){
    $this->Notas[] = $Nota;
}

  public function obtenerNotaMedia(){
    $suma= array_sum($this->Notas);
    $cantidad= count($this->Notas);
    return $suma/$cantidad;
  }

}

?>