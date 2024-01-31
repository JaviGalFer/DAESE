<?php
// VISTA PARA LOGIN USUARIOS

// Creamos el formulario con los campos de la tarea
echo "  
        <div class='container'>
                <form action = 'index.php' method = 'get'>
                        <h1>LOGIN</h1>
                        <input type='text' name='usuario' placeholder='Usuario' maxlength='20' required><br>
                        <input type='password' name='password' placeholder='Contraseña' maxlength='200' required><br>
                        <input type='hidden' name='action' value='hacerLogin'>
                        <input type='submit'>
                        
                        <p>¿No estas registrado?</p>
                        <p><a href='index.php?action=formularioRegistro'>Registrarse</a></p>
                </form>
        </div>";
