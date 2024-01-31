<div class='nav'>
    <nav>
        

        <?php if (isset($_SESSION["usuario"])) : ?>
            <!-- Mostrar botones cuando la sesión está iniciada -->    
            <a href='index.php?action=mostrarListaTareas' class='logout-link'>Home</a>
            <a href='index.php?action=CerrarSesion' class='logout-link'>Cerrar Sesión</a>
        <?php else : ?>
            <!-- Mostrar botón iniciar sesión cuando la sesión no está iniciada -->
            <a href='index.php?action=comprobarUsuarioLogueado' class='logout-link'>Iniciar Sesión</a>
            <a href='index.php?action=formularioRegistro' class='logout-link'>Registrarse</a>

        <?php endif; ?>

    </nav>
</div>
<br>
