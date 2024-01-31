<?php
    session_start();
    include_once("Biblioteca.php");  

    // Verifica si la acción requiere inicio de sesión
    $actionsRequiringLogin = ["mostrarListaTareas", "formularioInsertarTareas", "insertarTarea", "borrarTarea", "formularioModificarTarea", "modificarTarea", "buscarTareas", "mostrarListaUsuarios", "borrarUsuario"];

    // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    /*
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "comprobarUsuarioLogueado";  // Acción por defecto
    }
    */
    if (isset($_REQUEST["action"]) && in_array($_REQUEST["action"], $actionsRequiringLogin)) {
        // Verifica si el usuario está logueado
        if (!isset($_SESSION["usuario"])) {
            // Si no está logueado, redirige a la página de inicio de sesión
            // header("Location: login.php");
            echo "<script>alert('Error: Dónde vas listillo logueate anda.');</script>";
            View::render("login/form");
            exit();
        }
    }

    // Acción por defecto
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "comprobarUsuarioLogueado";


    // Creamos un objeto de tipo Biblioteca y llamamos al método $action()
    $biblio = new Biblioteca();
    $biblio->$action();

    