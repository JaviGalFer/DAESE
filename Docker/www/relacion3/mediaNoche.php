<?php
    // Obtén las horas y los minutos ingresados desde el formulario

    $horas = $_POST["horas"];
    $minutos = $_POST["minutos"];

    // Calcula los segundos restantes hasta la medianoche
    $segundos_faltantes = (24 - $horas) * 3600 + (60 - $minutos) * 60;

    echo "<h1>Segundos faltantes hasta la medianoche: $segundos_faltantes segundos</h1>";

    ?>