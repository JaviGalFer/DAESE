<?php

class User 
{
    private $id;
    private $usuario;
    private $password;
    //Constructor
    // public function __construct($idUser = null, $usuario = null, $password = null)
    // {
    //     $this->idUser = $idUser;
    //     $this->usuario = $usuario;   
    //     $this->password = $password;
    // }
    public function __construct(){}

    //Getters y Setters
    public function getIdUser(){
        return $this->id;
    }
    public function setIdUser($id){
        $this->id = $id;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    //Metodos
    public function __toString()
    {
        return "Usuario: " . $this->usuario . " Password: " . $this->password;
    }

}

?>