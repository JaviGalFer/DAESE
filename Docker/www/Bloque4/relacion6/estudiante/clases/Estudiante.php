<?php
//Clase Estudiante que contiene constructor y métodos para manejar los datos de un estudiante.
class Estudiante
{
    private $nombre;
    private $edad;

    private $curso;

    private $notas = array();


    public function __construct($nombre, $edad, $curso)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->curso = $curso;
        $this->notas = array();
    }

    // Métodos Getters y Setters para los atributos privados.
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function setCurso($curso)
    {
        $this->curso = $curso;
    }
    public function getCurso()
    {
        return $this->curso;
    }
    public function getNotas()
    {
        return $this->notas;
    }
    public function setNotas($notas)
    {
        $this->notas = $notas;
    }

    // Método AgregarNota: Acepta una nota como parámetro y la agrega al array de notas del estudiante.

    public function AgregarNota($nota)
    {
        $this->notas[] = $nota;
    }

    // Método ObtenerMedia: Calcula el promedio de las notas del estudiante y devuelve el resultado.
    public function ObtenerMedia()
    {
        $suma = 0;
        foreach ($this->notas as $nota) {
            $suma += $nota;
        }
        return $suma / count($this->notas);
    
    }

    //Método getInformacion: Devuelve un string con la información del estudiante, incluyendo su nombre, edad, curso y media de notas
    //usando la función ObtenerMedia().
    public function getInformacion(){
        $media = $this->ObtenerMedia();
        return "Nombre: getNombre(), Edad: $this->edad, Curso: $this->curso, Media: $media";
    }
    
}

?>
