<?php

class Libro
{
    public $idLibro;
    public $titulo;
    public $genero;
    public $pais;
    public $ano;
    public $numPaginas;

    public $autores = array();


    public function getAutores()
    {
        $nombreApellidoAutores = "";
        foreach($this->autores as $autor){
            $nombreApellidoAutores = "";
            $nombreApellidoAutores .= $autor->nombre . " " . $autor->apellido;

        }
        return $nombreApellidoAutores;
    }

    public function setAutores($autor){
        $this->autores = [];
    }

    // public function __construct($idLibro, $titulo, $genero, $pais, $ano, $numPaginas)
    // {
    //     $this->idLibro = $idLibro;
    //     $this->titulo = $titulo;
    //     $this->genero = $genero;
    //     $this->pais = $pais;
    //     $this->ano = $ano;
    //     $this->numPaginas = $numPaginas;
    // }
}

?>
