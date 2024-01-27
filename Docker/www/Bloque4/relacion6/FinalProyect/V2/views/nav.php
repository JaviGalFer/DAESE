<!-- <hr/>
<nav>
    Menú de navegación: 
    <a href='index.php'>Home</a>
    <a href='index.php?action=mostrarListaTareas'>Tareas</a>
    <a href='index.php?action=mostrarListaAutores'>Autores</a>
    <a href='index.php?action=CerrarSesion'>CerrarSesion</a>
</nav>
<hr/> -->

<hr/>
<nav>
    Menú de navegación: 

    <?php if (isset($_SESSION["usuario"])) : ?>
        <!-- Mostrar botones cuando la sesión está iniciada -->
        <a href='index.php'>Home</a>
        <a href='index.php?action=mostrarListaTareas'>Tareas</a>
        <a href='index.php?action=mostrarListaAutores'>Autores</a>
        <a href='index.php?action=CerrarSesion'>Cerrar Sesión</a>
    <?php else : ?>
        <!-- Mostrar botón iniciar sesión cuando la sesión no está iniciada -->
        <a href='index.php?action=comprobarUsuarioLogueado'>Iniciar Sesión</a>
    <?php endif; ?>

</nav>
<hr/>
