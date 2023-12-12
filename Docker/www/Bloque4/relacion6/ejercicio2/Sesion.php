<?php
class Sesion
{
    public function __construct()
    {
        // Inicia la sesión solo si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function setUsuario($nombre)
    {
        $_SESSION['usuario'] = $nombre;
    }

    public function getUsuario()
    {
        return isset($_SESSION['usuario']) ? $_SESSION['usuario'] : "No existe";
    }

    public function eliminarUsuario()
    {
        unset($_SESSION['usuario']);
    }

    public function destruirSesion()
    {
        session_unset();
        session_destroy();
    }
}
?>
