<?
/**
 * En esta página se encuentra el código que crea el usuario. Por ahora no se hace la conexión a BD, simplemente si el usuario introducido en el formulario 
 * es test/test se redirige a la página de login. En otro caso se indicará que el usuario es incorrecto.
 *  
 * Al recuperar la password automáticamente se le aplicará un cifrado sha512.
 * 
 * Autor: Nombre Apellidos
 * 
 */


$mensajeError = "";

if (isset($_POST['usuario']) && ($_POST['password']) && isset($_POST['password2'])){

    $usuario = $_POST['usuario'];
    $password = hash('sha512', $_POST['password']);
    $password2 = hash('sha512', $_POST['password2']);

    if ($password == $password2){
        try{
            $host = "db";
            $dbUsername = "root";
            $dbPassword = "test";
            $dbName = "users";
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            //Verificamos la conexión
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $statement = $conn->prepare('SELECT * FROM usuarios WHERE username = ? LIMIT 1');
            $statement->bind_param("s", $usuario);
            $statement->execute();
            $result = $statement->get_result();
            $resultado = $result->fetch_assoc();

            if ($resultado) {
                // echo "el usuario ya existe";
                echo "<script>alert('El usuario ya existe.');</script>";
                echo "<script>window.location = 'login.php';</script>";
            } else {
                //guardo en BD el usuario
                $statement = $conn->prepare('INSERT INTO usuarios(username, password) values (?, ?)');
                $statement->bind_param("ss", $usuario, $password);
                $statement->execute();
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $statement->close();
        $conn->close();
        header("Location: login.php");
    } else {
        // echo "La contraseña no coincide.";
        $mensajeError = "La contraseña no coinciden";
    }
} else {
    //$errores .= '<li>Rellena todos los datos correctamente</li>';
}

require 'views/registro.view.php';

?>

