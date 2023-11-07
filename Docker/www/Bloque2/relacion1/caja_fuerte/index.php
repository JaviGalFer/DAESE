<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Juego de la caja fuerte</title>
	</head>
	<body>
    <h1>Caja Fuerte</h1>
	<?php
		
		
        // Primero, comprobamos si ya existe la variable "numero" en la URL.
        // Si no existe, significa que el usuario tiene que escribir un número: tenemos que mostrarle el formulario.
        // Si ya existe, significa que el usuario ha escrito algún número y tenemos que comprobar si coincide con el aleatorio.
        if (!isset($_REQUEST['numero'])) {
            // La variable "numero" NO existe. Vamos a pedirle que lo escriba en un formulario
            // ¿Y el número aleatorio? Si aún no existe, significa que es LA PRIMERA ejecución y aún tenemos que elegirlo.
            // En cambio, si ya existe, tendremos que recuperarlo para seguir usando el mismo aleatorio y no uno nuevo cada vez.
            if (!isset($_SESSION['aleatorio'])) {
				$intentos = 4;
				$aleatorio = rand(1,1000);
				$_SESSION['aleatorio'] = $aleatorio;
				$_SESSION['intentos'] = $intentos;
			}
			echo "<form action='index.php' method='get'>
				Ingresa la combinación (4 cifras):
				<input type='text' name='numero' min='0' max='9999' pattern='\d{4}'><br>
				Te quedan ".$_SESSION['intentos']." intentos.
				<br>
				<br>				
				<input type='submit' value='Abrir caja fuerte'>
				</form>";
		} else {
            // La variable "numero" existe. Eso indica que el usuario escribió un número en el formulario.
            // Vamos a recuperar ese número y a compararlo con el aleatorio.
			$n = $_REQUEST['numero'];
			$aleatorio = $_SESSION['aleatorio'];
			$intentos = $_SESSION['intentos'];
			
			echo "Número introducido: $n<br>";
			if ($n == $aleatorio) {
				echo "La caja fuerte se ha abierto satisfactoriamente.<br>";
				session_destroy();
			}else {
                $intentos--;
                $_SESSION['intentos'] = $intentos;
                if ($intentos >0){
                    echo "<p>Lo siento, esa no es la combinación. Te quedan $intentos intentos.</p>";
                }else {
                    echo "<p>Agotaste todos los intentos. La caja fuerte está bloqueada.</p>";
                    session_destroy();
                }
			}
            // Volvemos a llamar a este mismo programa, pasándole como variables de URL el aleatorio
            // y el número de intentos, para seguir jugando con el mismo número secreto.
			echo "<br><a href='index.php'>Sigue jugando...</a>";
            
		}

	?>
	
	</body>
</html>