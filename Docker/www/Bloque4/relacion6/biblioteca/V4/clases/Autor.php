<?php

class Autor
{
    public $idPersona;
    public $nombre;
    public $apellido;

    // public function __construct($idPersona, $nombre, $apellido)
    // {
    //     $this->idPersona = $idPersona;
    //     $this->nombre = $nombre;
    //     $this->apellido = $apellido;
    // }

    public function getNombreCompleto(){
        return $this->nombre . " " . $this->apellido;
    
    }
}

?>
