<?php
/** 
* Autor: Francisco Javier Gallego Fernández
* Archivo: login.php
* Login de los usuarios accediendo a la DB
*/

//Incluimos el connect a la DB
include 'db_connect.php';

/////////////////IMPORTANTE//////////////
//Incluimos clases antes de las sesiones
include_once ('./clases/User.php');

//Iniciamos la sesión para poder acceder a los datos de la sesión
session_start();

if (isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);
    

    try{

        //Hacemos la consulta a la DB
        $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :username AND password = :password LIMIT 1');
        // $statement = $conn->prepare('SELECT id as idUser, usuario, password FROM usuarios WHERE usuario = :username AND password = :password LIMIT 1');
        
        $statement->execute(array(':username' => $username, ':password' => $password));

        $resultado = $statement->fetchAll(PDO::FETCH_CLASS, "User");

        
        if ($resultado) {
            $_SESSION['user'] =  $resultado[0];
            header('Location: ./logueado.php');
        }else {
            echo "<script>alert('Usuario o contraseña incorrecto.');</script>";
            echo "<script>window.location = '../index.html';</script>";
        }
        
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

}
?>