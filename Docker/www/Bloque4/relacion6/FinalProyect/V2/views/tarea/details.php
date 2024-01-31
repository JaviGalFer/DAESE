<?php 
extract($data);   // Extrae el contenido de $data y lo convierte en variables individuales 
$username = $_SESSION['usuario'];
$titulo = $tarea->titulo;
$descripcion = $tarea->descripcion;

echo "
    <br>
    <div class='container'>
        <h1>". strtoupper($username)."</h1>
        <hr>
        <br>
        <h1>Título de la tarea</h1>
        
        <div class='details-box'>
            <h3>".$titulo."</h3>
        </div>
        <h1>Descripción</h1>
        <div class='details-box'>
            <p><strong></strong>".$descripcion."</p>
        </div>
        <br>
        <a href='index.php' class='logout-link'>Volver</a>
    </div>";