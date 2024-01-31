<?php
// VISTA PARA REGISTRO DE USUARIOS


// Creamos el formulario con los campos de la tarea
echo "
        <div class='container'>
                <form action = 'index.php' method = 'post'>
                        <h1>Register</h1>
                        <input type='text' name='username' placeholder='Usuario' maxlength='20' required>
                        <input type='password' name='password' placeholder='Contraseña' maxlength='200' required>
                        <input type='password' name='password2' placeholder='Repite Contraseña' maxlength='200' required><br>
                        <input type='hidden' name='action' value='hacerRegistro'>
                        <input type='submit' value='Registrarse'>
                        <p>¿Tienes cuenta?</p>
                        <a href='index.php'>Inicia sesión</a>
                </form>        
        </div>
        ";
