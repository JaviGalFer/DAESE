<?php
if (!empty($_POST['num'])) {
    $numeroIntroducido = isset($_POST["num"]) ? $_POST["num"] : 0;
    // $numeros = [];
    $contadorNumeros = isset($_POST["contadorNumeros"]) ? $_POST["contadorNumeros"] : 0;

    $contadorImpares = isset($_POST["contadorImpares"]) ? $_POST["contadorImpares"] : 0;
    $sumaImpares = isset($_POST["sumaImpares"]) ? $_POST["sumaImpares"] : 0;
    $mediaImpares = isset($_POST["mediaImpares"]) ? $_POST["mediaImpares"] : 0;

    $mayorPar = isset($_POST["mayorPar"]) ? $_POST["mayorPar"] : 0;

    while ($_POST['num'] >= 0) {
        $numero = $_POST['num'];
        $numeros[] = $numero;
        $contadorNumeros++;

        if ($numero % 2 !== 0) {
            $sumaImpares += $numero;
            $contadorImpares++;
        } else {
            if ($numero > $mayorPar) {
                $mayorPar = $numero;
            }
        }

        echo "<p>Número anterior agregado: $numero</p>";
        echo "<p>Total de números introducidos: $contadorNumeros</p>";

        echo "<form action='analizarNums.php' method='post'>
                <label for='num'>Introduce un número:</label>
                <input type='number' id='num' name='num'>
                <input type='hidden' name='contadorNumeros' value='$contadorNumeros'>
                <input type='hidden' name='contadorImpares' value='$contadorImpares'>
                <input type='hidden' name='sumaImpares' value='$sumaImpares'>
                <input type='hidden' name='mediaImpares' value='$mediaImpares'>
                <input type='hidden' name='mayorPar' value='$mayorPar'>
                <input type='submit' value='Agregar'>
                </form>";
        exit;
    }

    echo "<p>Total de números introducidos: $contadorNumeros</p>";

    if ($contadorImpares > 0) {
        $mediaImpares = $sumaImpares / $contadorImpares;
        echo "<p>Media de los números impares: $mediaImpares</p>";
    } else {
        echo "<p>No se introdujeron números impares.</p>";
    }

    if ($mayorPar !== PHP_INT_MIN) {
        echo "<p>El mayor número par introducido: $mayorPar</p>";
    } else {
        echo "<p>No se introdujeron números pares.</p>";
    }
} else {
    echo "<p>Por favor, introduce al menos un número.</p>";
}
?>
