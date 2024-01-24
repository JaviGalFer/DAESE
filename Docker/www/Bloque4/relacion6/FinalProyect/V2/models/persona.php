<?php

// MODELO DE PERSONAS

include_once "model.php";

class Persona extends Model {

    // Constructor. Conecta con la base de datos.
    public function __construct() {
        $this->table = "usuarios";
        $this->idColumn = "id";
        parent::__construct();
    }

    // Devuelve un array con los ids de los autores de un libro
    public function getUsuarios($idTarea) {
        // Obtenemos solo los autores del libro que estamos buscando
        $usuariosTarea = $this->db->dataQuery("SELECT idPersona FROM escriben WHERE idLibro = '$idTarea'");
        // Vamos a convertir esa lista de autores del libro en un array de ids de personas
        return $usuariosTarea;
    }

    // Inserta un libro. Devuelve 1 si tiene éxito o 0 si falla.
    public function insert($usuario, $password)
    {
        return $this->db->dataManipulation("INSERT INTO usuarios (usuario,password) VALUES ('$usuario','$password')");
    }
}