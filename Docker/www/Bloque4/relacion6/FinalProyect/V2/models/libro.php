<?php

// MODELO DE LIBROS

include_once "model.php";

class Libro extends Model
{

    // Constructor. Especifica el nombre de la tabla de la base de datos
    public function __construct()
    {
        $this->table = "tarea";
        $this->idColumn = "id";
        parent::__construct();
    }

    // Devuelve el último id asignado en la tabla de tarea
    public function getMaxId()
    {
        $result = $this->db->dataQuery("SELECT MAX(id) AS ultimaIdTarea FROM tarea");
        return $result[0]->ultimaIdTarea;
    }

    // Inserta una tarea. Devuelve 1 si tiene éxito o 0 si falla.
    public function insert($titulo, $descripcion)
    {
        return $this->db->dataManipulation("INSERT INTO libros (titulo,descripcion) VALUES ('$titulo','$descripcion')");
    }

    // Inserta los usuarios de una tarea. Recibe el id de la tarea y la lista de ids de los usuarios en forma de array.
    // Devuelve el número de usuarios insertados con éxito (0 en caso de fallo).
    public function insertUsuarios($idTarea, $usuarios)
    {
        $correctos = 0;
        foreach ($usuarios as $idUsuario) {
            $sql = "INSERT INTO usuarios_tarea(tarea, usuario) VALUES('$idTarea', '$idUsuario')";
            $correctos += $this->db->dataManipulation($sql);
        }
        return $correctos;
    }

    // Elimina los autores de un libro. Recibe el id del libro y la lista de ids de los autores en forma de array.
    // Devuelve el número de autores insertados con éxito (0 en caso de fallo).
    public function deleteUsuarios($idUsuario)
    {
        $correctos = 0;
        $sql = "DELETE FROM usuarios_tarea WHERE usuario = $idUsuario";
        $correctos = $this->db->dataManipulation($sql);
        return $correctos;
    }

    // Actualiza una tarea (todo menos sus usuarios). Devuelve 1 si tiene éxito y 0 en caso de fallo.
    public function update($idTarea, $titulo, $descripcion)
    {
        $ok = $this->db->dataManipulation("UPDATE tarea SET
                                titulo = '$titulo',
                                descripcion = '$descripcion',
                                WHERE id = '$idTarea'");
        return $ok;
    }

    // Busca un texto en las tablas de tareas y usuarios. Devuelve un array de objetos con todos los libros
    // que cumplen el criterio de búsqueda.
    public function search($textoBusqueda)
    {
        // Buscamos los libros de la biblioteca que coincidan con el texto de búsqueda
        $result = $this->db->dataQuery("SELECT * FROM tareas
					                    INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
                                        INNER JOIN usuarios ON usuarios_tarea.usuario = usuarios.id
					                    WHERE tarea.titulo LIKE '%$textoBusqueda%'
					                    OR tarea.descripcion LIKE '%$textoBusqueda%'
					                    OR usuarios.usuario LIKE '%$textoBusqueda%'
					                    ORDER BY tarea.titulo");
        return $result;
    }
}