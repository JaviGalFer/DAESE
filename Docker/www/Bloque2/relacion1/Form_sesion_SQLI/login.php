<?
/**
 * En esta página se encuentra el código de que comprueba que el usuario conectado es "test" y su password es "test".
 * Si el usuario es test/test se mostrará la página de contenido.php. En caso contrario se mostrará la de registro.php. 
 * 
 * Al recuperar la password automáticamente se le aplicará un cifrado sha512.
 * 
 * Autor: Nombre Apellidos
 * 
 */
session_start();

if (isset($_POST['usuario']) && isset($_POST['password'])) {

    $usuario = $_POST['usuario'];
    $password = hash('sha512', $_POST['password']);

    try {
        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbName = "users";
        // Conexión a DB
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        // Comprobación de errores
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $statement = $conn->prepare('SELECT * FROM usuarios WHERE username = ? AND password = ? LIMIT 1');
        $statement->bind_param("ss", $usuario, $password);
        $statement->execute();
        $result = $statement->get_result();
        $resultado = $result->fetch_assoc();


        if ($resultado) {
            $_SESSION['usuario'] = $usuario;
            header('Location: contenido.php');
        } else {
            echo "<script>alert('Usuario o contraseña incorrecto.');</script>";
            echo "<script>window.location = 'login.php';</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

require './views/login.view.php';

?>
