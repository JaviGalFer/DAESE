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

        if($loginType == "database"){
            //Datos de la DB
            $host = "mydatabase-javi.c1pe6tuhpgsv.us-east-1.rds.amazonaws.com";
            $dbUsername = "admin";
            $dbPassword = "Lolazo619.";
            $dbName = "bddjavi";

            //Hacemos la conexión a la DB
            $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);


            //Comprobación de errores
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Hacemos la consulta a la DB
            $statement = $conn->prepare('SELECT * FROM usuarios WHERE username = :username AND password = :password LIMIT 1');
            
            
            $statement->execute(array(':username' => $username, ':password' => $password));

            $resultado = $statement->fetch();

            if ($resultado) {
                $_SESSION['username'] = $username;
                header('Location: ../logueado.php');
            }else {
                echo "<script>alert('Usuario o contraseña incorrecto.');</script>";
                echo "<script>window.location = '../index.html';</script>";
            }
        }elseif ($loginType == "array"){

            if (in_array($username, $usuarios) && in_array(hash('sha512', $_POST['password']), $passwords)) {
                $_SESSION['username'] = $username;
                header('Location: ../logueado.php');
            } else {
                // echo "Usuario o contraseña incorrectos.";
                echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
                echo "<script>window.location = '../index.html';</script>";
            }
        }else{
            echo "<script>alert('Selecciona el tipo de conexión.');</script>";
            header('Location: ../index.html');
            exit();
        }
        
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

}
?>