<?php
    // Obtén el día y el mes de nacimiento ingresados desde el formulario
    
    $dia = $_POST["dia"];
    $mes = $_POST["mes"];

    // Determina el horóscopo en base al día y el mes
    $horoscopo = '';

    switch ($mes) {
        case 1: // Enero
            if ($dia >= 21) {
                $horoscopo = 'Acuario';
            } else {
                $horoscopo = 'Capricornio';
            }
            break;
        case 2: // Febrero
            if ($dia >= 20) {
                $horoscopo = 'Piscis';
            } else {
                $horoscopo = 'Acuario';
            }
            break;
        case 3: // Marzo
            if ($dia >= 21) {
                $horoscopo = 'Aries';
            } else {
                $horoscopo = 'Piscis';
            }
            break;
        case 4: // Abril
            if ($dia >= 20) {
                $horoscopo = 'Tauro';
            } else {
                $horoscopo = 'Aries';
            }
            break;
        case 5: // Mayo
            if ($dia >= 21) {
                $horoscopo = 'Géminis';
            } else {
                $horoscopo = 'Tauro';
            }
            break;
        case 6: // Junio
            if ($dia >= 21) {
                $horoscopo = 'Cáncer';
            } else {
                $horoscopo = 'Geminis';
            }
            break;
        case 7: // Julio
            if ($dia >= 23) {
                $horoscopo = 'Leo';
            } else {
                $horoscopo = 'Cáncer';
            }
            break;
        case 8: // Agosto
            if ($dia >= 23) {
                $horoscopo = 'Virgo';
            } else {
                $horoscopo = 'Leo';
            }
            break;
        case 9: // Septiembre
            if ($dia >= 23) {
                $horoscopo = 'Libra';
            } else {
                $horoscopo = 'Virgo';
            }
            break;
        case 10: // Octubre
            if ($dia >= 23) {
                $horoscopo = 'Escorpio';
            } else {
                $horoscopo = 'Libra';
            }
            break;
        case 11: // Noviembre
            if ($dia >= 22) {
                $horoscopo = 'Sagitario';
            } else {
                $horoscopo = 'Escorpio';
            }
            break;
        case 12: // Diciembre
            if ($dia >= 22) {
                $horoscopo = 'Capricornio';
            } else {
                $horoscopo = 'Sagitario';
            }
            break;

        default:
            $horoscopo = 'Signo no válido';
            break;
    }

    echo "<h1>Tu horóscopo es: $horoscopo</h1>";
    
    ?>