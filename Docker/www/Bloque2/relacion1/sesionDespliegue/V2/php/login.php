<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* 
*/
session_start();

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['loginType'])){

    $usuarios = array("user1", "user2"); // Array de usuarios
    // $passwords = array("pass1", "pass2"); // Array de contraseñas
    $passwords = array(hash('sha512', "pass1"), hash('sha512', "pass2"));

    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);
    $loginType = $_POST['loginType'];

    try{
        //Datos de la DB
        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $dbname = "users";

        //Hacemos la conexión a la DB
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        //Comprobación de errores
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }   
        if($loginType == "database"){
                //Hacemos la consulta a la DB
            $statement = $conn->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ? LIMIT 1");
            $statement->bind_param("ss", $username, $password); 
            $statement->execute();
            $result = $statement->get_result();
            $resultado = $result->fetch_assoc();

            if ($resultado) {
                $_SESSION['username'] = $username;
                header('Location: ../logueado.html');
            }else {
                echo "<script>alert('Usuario o contraseña incorrecto.');</script>";
                echo "<script>window.location = '../index.html';</script>";
            }
        }else{

            if (in_array($username, $usuarios) && in_array(hash('sha512', $_POST['password']), $passwords)) {
                $_SESSION['username'] = $username;
                header('Location: ../logueado.html');
            } else {
                // echo "Usuario o contraseña incorrectos.";
                echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
                echo "<script>window.location = '../index.html';</script>";
            }
        }
        
    }catch(mysqli_sql_exception $e){
        echo "Error: " . $e->getMessage();
    }

}
?>