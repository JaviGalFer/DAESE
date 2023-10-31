<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calcula los segundos para llegar a la medianoche</h1>
    <form action="mediaNoche.php" method="POST">
        <label for="horas">Horas:</label>
        <input type="number" name="horas" id="horas" min="0" max="23" required>
        <br>
        <label for="minutos">Minutos:</label>
        <input type="number" name="minutos" id="minutos" min="0" max="59" required>
        <br>
        <br>
        <input type="submit" value="Calcular segundos">
    </form>
</body>
</html>