<?php

class Estudiante
{
  private $nombre;
  private $edad;
  private $curso;
  private $notas;

  public function __construct($nombre, $edad, $curso)
  {
    $this->nombre = $nombre;
    $this->edad = $edad;
    $this->curso = $curso;
    $this->notas = array();
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function getEdad()
  {
    return $this->edad;
  }

  public function setEdad($edad)
  {
    $this->edad = $edad;
  }

  public function getCurso()
  {
    return $this->curso;
  }

  public function setCurso($curso)
  {
    $this->curso = $curso;
  }

  public function getNotas()
  {
    return $this->notas;
  }

  public function setNotas($notas)
  {
    $this->notas = $notas;
  }

  public function agregarNota($nota)
  {
    $this->notas[] = $nota;
  }

  public function obtenerMedia()
  {

    $media = array_sum($this->notas);
    return $media / count($this->notas);
  }
}

class EstudianteGraduado extends Estudiante
{
  private $nombre;
  private $edad;
  private $curso;
  private $notas;
  private $nivel;

  public function __construct($nombre, $edad, $curso, $nivel)
  {
    $this->nombre = $nombre;
    $this->edad = $edad;
    $this->curso = $curso;
    $this->nivel = $nivel;
    $this->notas = array();
    
  }

  public function getNivel()
  {
    return $this->nivel;
  }

  public function setNivel($nivel)
  {
    $this->nivel = $nivel;
  }
}
