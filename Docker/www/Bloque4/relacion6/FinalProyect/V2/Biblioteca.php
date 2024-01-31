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
                $data["cssFile"] = "styles.css";
                View::render("login/form", $data);
                exit();
            } else {
                $this->mostrarListaTareas();
            }
        }

        //---------------------------------- HACER LOGIN USUARIO -------------------------------------
        public function hacerLogin() {
            // echo "hola";
            // Primero, recuperamos todos los datos del formulario
            // echo "hola ". $_REQUEST["usuario"];
            $usuario = strtolower($_REQUEST["usuario"]);
            $password = hash('sha512', $_REQUEST["password"]);
            // Pedimos al modelo que intente hacer login
            $result = $this->Usuario->login($usuario, $password);
            // Si el login ha funcionado, guardamos en la sesión el usuario
            // echo $result;
            if ($result == 1) {
                // echo $usuario;
                $_SESSION["usuario"] = $usuario;
                $_SESSION["idUsuario"] = $this->Usuario->getIdByUsername($usuario);
                // Mostramos la lista de tareas
                $this->mostrarListaTareas();
            }else{
                echo "<script>alert('Usuario o contraseña incorrecto.');</script>";
                echo "<script>window.location = './index.php';</script>";
                // View::render("login/form");
                exit();
            }
            
        }
        //---------------------------------- FORMULARIO REGISTRO USUARIO -------------------------------------
        public function formularioRegistro() {
            $data["cssFile"] = "stylesReg.css";
            View::render("register/form", $data);
        }
        
        //---------------------------------- REGISTRO USUARIO -------------------------------------
        public function hacerRegistro() {
            // Primero, recuperamos todos los datos del formulario
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'])){
                $username = strtolower($_POST['username']);
                $password = hash('sha512', $_POST['password']);
                $password2 = hash('sha512', $_POST['password2']);
                
                if ($password == $password2){
                    try{
                        
                        //Hacemos la sentencia
                        $resultado = $this->Usuario->login($username, $password);
                        if ($resultado){
                            //Si el usuario existe sacamos un alert y volvemos al login
                            echo "<script>alert('El usuario ya existe.');</script>";
                            echo "<script>window.location = './index.php';</script>";
                        }else{
                            //Si no existe guardamos el usuario en BD
                            $result = $this->Usuario->insert($username, $password);
            
                            //Depuración
                            echo "<script>alert('Usuario registrado correctamente.');</script>";
            
                            echo "<script>window.location = './index.php';</script>";
                            exit(); //Nos aseguramos que se detenga
                        }
                    }catch(PDOException  $e){
                        echo "Error: " . $e->getMessage();
                    }
                }else{
                    //Si la contraseña no coinciden
                    echo "<script>alert('La contraseña no coincide.');</script>";
                    echo "<script>window.location = '../registro.html';</script>";
                }
            }
        }   


        //---------------------------------- CERRAR SESION -------------------------------------
        public function cerrarSesion() {
            session_destroy();
            $_SESSION = array();
            $data["cssFile"] = "styles.css";
            View::render("login/form", $data);
            exit();
        }

        // --------------------------------- MOSTRAR LISTA DE TAREAS ----------------------------------------
        public function mostrarListaTareas() {
            $data["cssFile"] = "stylesTarea.css";
            $data["listaTareas"] = $this->Tarea->getTareasByIdUser($this->Usuario->getIdByUsername($_SESSION["usuario"]));
            View::render("tarea/all", $data);
        }

        // --------------------------------- FORMULARIO ALTA DE TAREAS ----------------------------------------

        public function formularioInsertarTareas() {
            $data["cssFile"] = "stylesMod.css";
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
                // $idUsuario = $this->Usuario->getIdByUsername($usuario);
                $idUsuario = $_SESSION["idUsuario"];
                // Obtenemos el ID de la tarea recién insertada
                $idTarea = $this->Tarea->getMaxId();
                
                // Insertamos el usuario asociado a la tarea en la tabla usuarios_tarea
                $resultUsuariosTarea = $this->Tarea->insertUsuariosTarea($idTarea, array($idUsuario));


                // Ya podemos insertar todos los autores junto con el libro en "escriben"
                // $result = $this->libro->insertAutores($idTarea, $autores);
                
                
            } 
            $data["cssFile"] = "stylesTarea.css";
            $data["listaTareas"] = $this->Tarea->getTareasByIdUser($this->Usuario->getIdByUsername($_SESSION["usuario"]));
            View::render("tarea/all", $data);

        }

        // --------------------------------- BORRAR TAREAS ----------------------------------------

        public function borrarTarea() {
            // Recuperamos el id de la tarea que hay que borrar
            $idTarea = $_REQUEST["idTarea"];
            $idUsuario = $_SESSION["idUsuario"];
            // Pedimos al modelo que intente borrar la tarea
            $result = $this->Tarea->deleteTarea($idTarea, $idUsuario);
            $data["cssFile"] = "stylesTarea.css";
            $data["listaTareas"] = $this->Tarea->getTareasByIdUser($this->Usuario->getIdByUsername($_SESSION["usuario"]));
            View::render("tarea/all", $data);

        }

        // --------------------------------- FORMULARIO MODIFICAR TAREAS ----------------------------------------

        public function formularioModificarTarea() {
            // Recuperamos los datos de la tarea a modificar
            $idTarea = $_REQUEST["idTarea"];

            $data["cssFile"] = "stylesMod.css";
            $data["tarea"] = $this->Tarea->getTareasByIdTarea($idTarea, $this->Usuario->getIdByUsername($_SESSION["usuario"]))[0];
            
            if (!$data["tarea"]) {
                // La tarea no pertenece al usuario actual
                echo "<script>alert('Error: Tarea no encontrada o no pertenece al usuario.');</script>";
                echo "<script>window.location = 'index.php';</script>";
                exit();
            }
            View::render("tarea/form", $data);
        }

        // --------------------------------- MODIFICAR TAREAS ----------------------------------------

        public function modificarTarea() {
            // Primero, recuperamos todos los datos del formulario
            $idTarea = $_REQUEST["idTarea"];
            $titulo = $_REQUEST["titulo"];
            $descripcion = $_REQUEST["descripcion"];
            
            //Comprobamos primero que la tarea pertenece al usuario
            $comprobación = $this->Tarea->getTareasByIdTarea($idTarea, $this->Usuario->getIdByUsername($_SESSION["usuario"]));

            if (!$comprobación) {
                // La tarea no pertenece al usuario actual
                echo "<script>alert('Error: Tarea no encontrada o no pertenece al usuario.');</script>";
                echo "<script>window.location = 'index.php';</script>";
                exit();
            }else{
                // Pedimos al modelo que haga el update
                $result = $this->Tarea->update($idTarea, $titulo, $descripcion);                    
                
                $data["listaTareas"] = $this->Tarea->getTareasByIdUser($this->Usuario->getIdByUsername($_SESSION["usuario"]));
                View::render("tarea/all", $data);
            }            
        }

        // --------------------------------- BUSCAR TAREAS ----------------------------------------

        public function buscarTareas() {
            // Recuperamos el texto de búsqueda de la variable de formulario
            $textoBusqueda = $_REQUEST["textoBusqueda"];
            $idUsuario = $_SESSION["idUsuario"];
            // Buscamos las tareas que coinciden con la búsqueda
            $data["cssFile"] = "stylesTarea.css";
            $data["listaTareas"] = $this->Tarea->search($textoBusqueda, $idUsuario);
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