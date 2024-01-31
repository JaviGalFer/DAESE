<hr/>
<nav>
    

    <?php if (isset($_SESSION["usuario"])) : ?>
        <!-- Mostrar botones cuando la sesión está iniciada -->    
        <a href='index.php?action=CerrarSesion' class='logout-link'>Cerrar Sesión</a>
    <?php else : ?>
        <!-- Mostrar botón iniciar sesión cuando la sesión no está iniciada -->
        <a href='index.php?action=comprobarUsuarioLogueado'>Iniciar Sesión</a>
        <a href='index.php?action=formularioRegistro'>Registrarse</a>

    <?php endif; ?>

</nav>
<hr/>
