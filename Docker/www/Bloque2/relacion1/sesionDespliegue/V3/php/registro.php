<?
/** 
* Autor: Francisco Javier Gallego Fernández
* 
*/

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2'])){

    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);
    $password2 = hash('sha512', $_POST['password2']);

    if ($password === $password2){
        try{
            //Datos de conexión
            $host = "db";
            $dbUsername = "root";
            $dbPassword = "test";
            $dbName = "users";

            //Realizamos la conexión
            
            $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);

            

            //Verificamos la conexión
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Hacemos la sentencia
            $statement = $conn->prepare('SELECT * FROM usuarios WHERE username = :username LIMIT 1');
            $statement->execute(array(':username' => $username));
            $resultado = $statement->fetch();

            if ($resultado){
                //Si el usuario existe sacamos un alert y volvemos al login
                echo "<script>alert('El usuario ya existe.');</script>";
                echo "<script>window.location = '../index.html';</script>";
            }else{
                //Si no existe guardamos el usuario en BD
                $statement = $conn->prepare('INSERT INTO usuarios(username, password) values (:username, :pass)');
                $statement->execute(array(
                    ':username' => $username,
                    ':pass' => $password
                ));
            }


        }catch(PDOException  $e){
            echo "Error: " . $e->getMessage();
        }
        $statement->closeCursor();
        
        header('Location: ../index.html');
    }else{
        //Si la contraseña no coinciden
        echo "<script>alert('La contraseña no coincide.');</script>";
        echo "<script>window.location = '../registro.html';</script>";
    }

}

?>