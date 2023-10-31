<?php
    if (!empty($_POST['n'])) {
        $n = $_POST['n'];
        $first = 0;
        $second = 1;
        $count = 2;
        echo "Los primeros $n términos de la serie de Fibonacci son: $first, $second";

        while ($count < $n) {
            $next = $first + $second;
            echo ", $next";
            $first = $second;
            $second = $next;
            $count++;
        }
    } else {
        echo "Por favor, introduce un número entero.";
    }
    ?>