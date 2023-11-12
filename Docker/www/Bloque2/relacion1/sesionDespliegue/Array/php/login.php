<?php
session_start();
$usuarios = array("user1", "user2"); // Array de usuarios
$passwords = array("pass1", "pass2"); // Array de contraseñas

$username = $_POST['username'];
$password = $_POST['password'];

if (in_array($username, $usuarios) && in_array($password, $passwords)) {
    $_SESSION['username'] = $username;
    header('Location: ../logueado.html');
} else {
    // echo "Usuario o contraseña incorrectos.";
    echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
    echo "<script>window.location = '../index.html';</script>";
}
?>