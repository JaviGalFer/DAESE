<!DOCTYPE html>
<html>
<head>
    <title>Análisis de Números</title>
</head>
<body>
    <h2>Análisis de Números</h2>
    <form action="./php/analizarNums.php" method="post">
        <label for="num">Introduce un número:</label>
        <input type="number" id="num" name="num">
        <!-- <input type="hidden" name="contadorNumeros" value="<?php echo $contadorNumeros; ?>">
        <input type="hidden" name="sumaImpares" value="<?php echo $sumaImpares; ?>">
        <input type="hidden" name="contadorImpares" value="<?php echo $contadorImpares; ?>">
        <input type="hidden" name="mayorPar" value="<?php echo $mayorPar; ?>"> -->
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
