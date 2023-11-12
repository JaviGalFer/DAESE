<?
/** 
* Autor: Francisco Javier Gallego Fernández
* 
*/

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'])){

    $usuario = $_POST['username'];
    $password = hash('sha512', $_POST['password']);
    $password2 = hash('sha512', $_POST['password2']);

    if ($password === $password2){
        try{
            //Datos de conexión
            $host = "db";
            $dbUsername = "root";
            $dbPassword = "test";
            $dbname = "users";

            //Realizamos la conexión
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

            //Verificamos la conexión
            if($conn->connect_error){
                die("Conexión fallida: " . $conn->connect_error);
            }

            $statement = $conn->prepare('SELECT * FROM usuarios WHERE username = ? LIMIT 1');
            $statement->bind_param("s", $usuario);
            $statement->execute();
            $result = $statement->get_result();
            $resultado = $result->fetch_assoc();

            if ($resultado){
                //Si el usuario existe sacamos un alert y volvemos al login
                echo "<script>alert('El usuario ya existe.');</script>";
                echo "<script>window.location = '../index.html';</script>";
            }else{
                //Si no existe guardamos el usuario en BD
                $statement = $conn->prepare('INSERT INTO usuarios(username, password) values (?, ?)');
                $statement->bind_param("ss", $usuario, $password);
                $statement->execute();
            }


        }catch(mysqli_sql_exception  $e){
            echo "Error: " . $e->getMessage();
        }
        $statement->close();
        $conn->close();
        header('Location: ../login.html');
    }else{
        //Si la contraseña no coinciden
        echo "<script>alert('La contraseña no coincide.');</script>";
        echo "<script>window.location = '../registro.html';</script>";
    }

}

?>