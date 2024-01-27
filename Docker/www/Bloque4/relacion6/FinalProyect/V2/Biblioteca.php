<?php
include_once("models/Tarea.php");  // Modelos
include_once("models/Usuario.php");
include_once("View.php");          // Plantilla de vista

class Biblioteca {
        private $db;             // Conexión con la base de datos
        private $Tarea, $Usuario;// Modelos

        public function __construct() {
            $this->Tarea = new Tarea();
            $this->Usuario = new Usuario();
        }

        //---------------------------------- COMPROBAR USUARIO LOGUEADO -------------------------------------

        public function comprobarUsuarioLogueado() {
            if (!isset($_SESSION["usuario"])) {
                View::render("login/form");
                exit();
            } else {
                $this->mostrarListaTareas();
            }
        }

        //---------------------------------- HACER LOGIN USUARIO -------------------------------------
        public function hacerLogin() {
            // Primero, recuperamos todos los datos del formulario
            // echo "hola ". $_REQUEST["usuario"];
            $usuario = $_REQUEST["usuario"];
            $password = $_REQUEST["password"];
            // Pedimos al modelo que intente hacer login
            $result = $this->Usuario->login($usuario, $password);
            // Si el login ha funcionado, guardamos en la sesión el usuario
            echo $result;
            if ($result == 1) {
                echo $usuario;
                $_SESSION["usuario"] = $usuario;
            }
            // Mostramos la lista de tareas
            $this->mostrarListaTareas();
        }

        //---------------------------------- CERRAR SESION -------------------------------------
        public function cerrarSesion() {
            session_destroy();
            $_SESSION = array();
            View::render("login/form");
            exit();
        }

        // --------------------------------- MOSTRAR LISTA DE TAREAS ----------------------------------------
        public function mostrarListaTareas() {
            $data["listaTareas"] = $this->Tarea->getAll();
            View::render("tarea/all", $data);
        }

        // --------------------------------- FORMULARIO ALTA DE TAREAS ----------------------------------------

        public function formularioInsertarTareas() {
            $data["listaUsuarios"] = $this->Usuario->getAll();
            $data["usuariosTarea"] = array();  // Array vacío (la tarea aún no tiene autores asignados)
            View::render("tarea/form", $data);
        }

        // --------------------------------- INSERTAR TAREAS ----------------------------------------

        public function insertarTarea() {
            // Primero, recuperamos todos los datos del formulario
            $titulo = $_REQUEST["titulo"];
            $descripcion = $_REQUEST["descripcion"];;            

            $result = $this->Tarea->insert($titulo, $descripcion);
            if ($result == 1) {
                // Si la inserción de la tarea ha funcionado, continuamos insertando los autores, pero
                // necesitamos conocer el id de la tarea que acabamos de insertar y el usuario
                $usuario = $_SESSION["usuario"];
                $idUsuario = $this->Usuario->getIdByUsername($usuario);
                // Obtenemos el ID de la tarea recién insertada
                $idTarea = $this->Tarea->getMaxId();
                
                // Insertamos el usuario asociado a la tarea en la tabla usuarios_tarea
                $resultUsuariosTarea = $this->Tarea->insertUsuariosTarea($idTarea, array($idUsuario));


                // Ya podemos insertar todos los autores junto con el libro en "escriben"
                // $result = $this->libro->insertAutores($idTarea, $autores);
                
                
            } 
            $data["listaTareas"] = $this->Tarea->getAll();
            View::render("tarea/all", $data);

        }

        // --------------------------------- BORRAR TAREAS ----------------------------------------

        public function borrarTarea() {
            // Recuperamos el id de la tarea que hay que borrar
            $idTarea = $_REQUEST["idTarea"];
            // Pedimos al modelo que intente borrar la tarea
            $result = $this->Tarea->delete($idTarea);

            $data["listaTareas"] = $this->Tarea->getAll();
            View::render("tarea/all", $data);

        }

        // --------------------------------- FORMULARIO MODIFICAR TAREAS ----------------------------------------

        public function formularioModificarTarea() {
            // Recuperamos los datos de la tarea a modificar
            // echo $_REQUEST["idTarea"];
            $idTarea = $_REQUEST["idTarea"];
            $data["tarea"] = $this->Tarea->get($idTarea)[0];
            // Renderizamos la vista de inserción de libros, pero enviándole los datos del libro recuperado.
            // Esa vista necesitará la lista de todos los autores y, además, la lista
            // de los autores de este libro en concreto.
            // $data["todosLosUsuarios"] = $this->persona->getAll();
            // $data["usuariosTarea"] = $this->persona->getAutores($_REQUEST["idTarea"]);
            View::render("tarea/form", $data);
        }

        // --------------------------------- MODIFICAR TAREAS ----------------------------------------

        public function modificarTarea() {
            // Primero, recuperamos todos los datos del formulario
            $idTarea = $_REQUEST["idTarea"];
            $titulo = $_REQUEST["titulo"];
            $descripcion = $_REQUEST["descripcion"];
            // $usuarios = $_REQUEST["usuarios"];

            // Pedimos al modelo que haga el update
            $result = $this->Tarea->update($idTarea, $titulo, $descripcion);

            // Eliminamos todos los autores asociados con el libro en "escriben"
            // $result = $this->libro->deleteAutores($idTarea);

            // Ya podemos insertar todos los autores junto con el libro en "escriben"
            // $result = $this->libro->insertAutores($idTarea, $usuarios);
                
            
            $data["listaTareas"] = $this->Tarea->getAll();
            View::render("tarea/all", $data);
        }

        // --------------------------------- BUSCAR TAREAS ----------------------------------------

        public function buscarTareas() {
            // Recuperamos el texto de búsqueda de la variable de formulario
            $textoBusqueda = $_REQUEST["textoBusqueda"];
            // Buscamos las tareas que coinciden con la búsqueda
            $data["listaTareas"] = $this->Tarea->search($textoBusqueda);
            // Mostramos el resultado en la misma vista que la lista completa de tareas
            View::render("tarea/all", $data);
        }

        // --------------------------------- MOSTRAR LISTA DE USUARIOS ----------------------------------------
        public function mostrarListaUsuarios() {
            $data["listaUsuarios"] =  $this->Usuario->getAll();
            View::render("login/all",$data);
        }   
        public function formularioInsertarUsuario() {
            View::render("login/form");
        }

        public function insertarUsuario() {
            // Primero, recuperamos todos los datos del formulario
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];          

            $result = $this->Usuario->insert($nombre, $apellidos);
    
            $data["listaUsuarios"] = $this->Usuario->getAll();
            View::render("Login/all", $data);

        }

        public function borrarUsuario() {
            // Recuperamos el id de la persona que hay que borrar
            $idUsuario = $_REQUEST["idUsuario"];
            // Pedimos al modelo que intente borrar la tarea
            $result = $this->Usuario->delete($idUsuario);
 
            $data["listaUsuarios"] = $this->Usuario->getAll();
            View::render("login/all", $data);

        }
    } // class