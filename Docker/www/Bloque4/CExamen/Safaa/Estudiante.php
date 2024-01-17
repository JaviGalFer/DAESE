<?php
class Estudiante {
    private $nombre;
    private $edad;
    private $curso;
    private $notas = [];

    public function __construct($nombre, $edad, $curso) 
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->curso = $curso;
    }
   
        public function agregarNota($nota) 
        {
            $this->notas[] = $nota;
        }

        public function obtenerMedia() 
        {
            $total = count($this->notas);
    
            if ($total > 0) {
                $sumaNotas = array_sum($this->notas);
                return $sumaNotas / $total;
            } else {
                return 0; 
            }
        }


      
public function obtenerDatos()
{
    return "Nombre: {$this->nombre}, Edad: {$this->edad}, Curso: {$this->curso}, Media de Notas: {$this->obtenerMedia()}";
}

}


class EstudianteGraduado extends Estudiante 
{
    private $grado;

    public function __construct($nombre, $edad, $curso, $grado)
     {
        parent::__construct($nombre, $edad, $curso);
        $this->grado = $grado;
     }
     public function obtenerGrado() 
     {
     return ", Grado: {$this->grado}";
     }
   
}





?>