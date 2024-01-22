<?php

class Task
{
    private $id;
    private $titulo;
    private $descripcion;
    //Constructor
    // public function __construct($idUser = null, $usuario = null, $password = null)
    // {
    //     $this->idUser = $idUser;
    //     $this->usuario = $usuario;   
    //     $this->password = $password;
    // }
    public function __construct(){}

    //Getters y Setters
    public function getId(){
        return $this->id;
    }    
    public function setId($id){
        $this->id = $id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function __toString(){
        return "Tarea: " . $this->titulo . " Descripcion: " . $this->descripcion;
    }

}

?>