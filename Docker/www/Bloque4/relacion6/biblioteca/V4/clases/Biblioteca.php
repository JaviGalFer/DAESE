<?php
    include_once("clases/Autor.php");
    include_once("clases/Libro.php");

class Biblioteca{

    private $db = null;
    public function __construct(){
        $this->db = new mysqli("db", "root", "test", "biblioteca");
    }

    // --------------------------------- MOSTRAR LISTA DE LIBROS ----------------------------------------
    function mostrarListaLibros()
    {
        echo "<h1>Biblioteca</h1>";
        //Conecta con la BD y comprueba si hay libros. Si no hay muestra un mensaje indicando que no hay libros.
        
        //En el caso que haya libros. Muestra los libros y además, muestra un formulario de búsqueda y que busque por el título del libro.
        // Buscamos todos los libros de la biblioteca

        if ($result = $this->db->query("SELECT * FROM libros ORDER BY libros.titulo")){
            
            //La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
            if ($result->num_rows != 0) {

                //Primero el formulario de búsqueda
                echo "<form action='index.php'>
                    <input type='hidden' name='action' value='buscarLibros'>
                    <input type='text' name='textoBusqueda'>
                    <input type='submit' value='Buscar'>
                </form><br>";

                //La consulta ha devuelto registros: vamos a mostrarlos
                echo "<table border='1'>
                        <tr>
                            <th>Título</th>
                            <th>Género</th>
                            <th>País</th>
                            <th>Año</th>
                            <th>Autor</th>
                            <th>Número de páginas</th>
                            <th>Acciones</th>
                        </tr>";
                
                while ($libro = $result->fetch_object("Libro")) {
                    //1º select autores where idLibro = $ libro -> idLibro
                    $resultAutores = $this->db->query("SELECT personas.* FROM personas
                    INNER JOIN escriben ON personas.idPersona = escriben.idPersona
                    WHERE escriben.idLibro = '$libro->idLibro'");
                
                $autores = array();
                // 2º while $ autor = $ resultAutores->fetch_object("Autor"){
                while ($autor = $resultAutores->fetch_object("Autor")) {
                    $libro->setAutores($autor);
                }
                
                $autoresString = implode(", ", $autores);
                // $ libro->setAutores ($ autoresString);

                    echo "<tr>
                            <td>" . $libro->titulo . "</td>
                            <td>" . $libro->genero . "</td>
                            <td>" . $libro->pais . "</td>
                            <td>" . $libro->ano . "</td>
                            <td>" . $libro->getAutores() . "</td>
                            <td>" . $libro->numPaginas . "</td>
                            <td>
                                <a href='index.php?action=borrarLibro&idLibro=" . $libro->idLibro . "'>Borrar</a>
                                <a href='index.php?action=formularioModificarLibro&idLibro=" . $libro->idLibro . "'>Modificar</a>
                            </td>
                        </tr>";
                }

                echo "</table>";
            } else {
                // La consulta no contiene registros
                echo "No se encontraron datos";
            }
        }else{
            echo "No se encontraron datos/Error con la conexión a la DB";
        }
        echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";
    }

    // --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------

    function formularioInsertarLibros()
    {
        echo "<h1>Modificación de libros</h1>";

        // Crear el formulario con los campos del libro
        echo "<form action = 'index.php' method = 'get'>
                    Título:<input type='text' name='titulo'><br>
                    Género:<input type='text' name='genero'><br>
                    País:<input type='text' name='pais'><br>
                    Año:<input type='text' name='ano'><br>
                    Número de páginas:<input type='text' name='numPaginas'><br>";

        // Añadimos un select para seleccionar id del autor o autores
        
        $result = $this->db->query("SELECT * FROM personas");
        //Agregamos la etiqueta de apertura del select
        echo "<select name='autores[]' multiple>";
        while ($autor = $result->fetch_object("Autor")) {
            echo "<option value='" . $autor->idPersona . "'>" . $autor->nombre . " " . $autor->apellido . "</option>";
        }
        echo "</select>";
        echo "<a href='index.php?action=formularioInsertarAutores'>Añadir nuevo</a><br>";

        // Finalizamos el formulario
        echo "  <input type='hidden' name='action' value='insertarLibro'>
				<input type='submit'>
				</form>";
        echo "<p><a href='index.php'>Volver</a></p>";
    }


    // --------------------------------- INSERTAR LIBROS ----------------------------------------

    function insertarLibro()
    {
        echo "<h1>Alta de libros</h1>";

        // Vamos a procesar el formulario de alta de libros
        // Primero, recuperamos todos los datos del formulario (titulo, género...)
        $autores = $_GET['autores'];
        $titulo = $_GET['titulo'];
        $genero = $_GET['genero'];
        $pais = $_GET['pais'];
        $ano = $_GET['ano'];
        $numPaginas = $_GET['numPaginas'];

        // Lanzamos el INSERT contra la BD.
        
        $this->db->query("INSERT INTO libros (titulo, genero, pais, ano, numPaginas) 
                    VALUES ('$titulo', '$genero', '$pais', '$ano', '$numPaginas')");

        
        if ($this->db->affected_rows == 1) {
            // Si la inserción del libro ha funcionado, continuamos insertando en la tabla "escriben"
            // Tenemos que averiguar qué idLibro se ha asignado al libro que acabamos de insertar

            $result = $this->db->query("SELECT MAX(idLibro) AS ultimoIdLibro FROM libros");
            $idLibro = $result->fetch_object("Libro")->ultimoIdLibro;

            // Ya podemos insertar todos los autores junto con el libro en "escriben"
            
            foreach ($autores as $idAutor) {
                //echo "INSERT INTO escriben (idLibro, idAutor) VALUES ('$idLibro', '$idAutor'";
                $this->db->query("INSERT INTO escriben (idLibro, idPersona) VALUES ('$idLibro', '$idAutor')");
                
                
            }
            
    

            echo "Libro insertado con éxito<br>";
           // echo 'idLibro: ' . $idLibro .' e  idAutor: ' .$autores;
        } else {
            // Si la inserción del libro ha fallado, mostramos mensaje de error
            echo 'idLibro: $idLibro, idAutor: $idAutor';
            echo "Ha ocurrido un error al insertar el libro. Por favor, inténtelo más tarde.";
        }
        echo "<p><a href='index.php'>Volver</a></p>";
    }

    // --------------------------------- BORRAR LIBROS ----------------------------------------

    function borrarLibro()
    {
        echo "<h1>Borrar libros</h1>";

        // Recuperamos el id del libro y lanzamos el DELETE contra la BD
        $idLibro = $_GET['idLibro'];
        $this->db = new mysqli("db", "root", "test", "biblioteca");
        $this->db->query("DELETE FROM libros WHERE idLibro='$idLibro'");

        // Mostramos mensaje con el resultado de la operación
        if ($this->db->affected_rows == 0) {
            echo "Ha ocurrido un error al borrar el libro. Por favor, inténtelo de nuevo";
        } else {
            echo "Libro borrado con éxito";
        }
        echo "<p><a href='index.php'>Volver</a></p>";
    }

    // --------------------------------- FORMULARIO MODIFICAR LIBROS ----------------------------------------

    function formularioModificarLibro()
    {
        echo "<h1>Modificación de libros</h1>";

        // Recuperamos el id del libro que vamos a modificar y sacamos el resto de sus datos de la BD
        $idLibro = $_GET['idLibro']; 
        
        $result = $this->db->query("SELECT * FROM libros WHERE idLibro='$idLibro'");
        $libro = $result->fetch_object("Libro");

        
        // Creamos el formulario con los campos del libro
        // y lo rellenamos con los datos que hemos recuperado de la BD
        echo "<form action='index.php' method='get'>
                    <input type='hidden' name='idLibro' value='$idLibro'>
                    Título:<input type='text' name='titulo' value='" . $libro->titulo . "'><br>
                    Género:<input type='text' name='genero' value='" . $libro->genero . "'><br>
                    País:<input type='text' name='pais' value='" . $libro->pais . "'><br>
                    Año:<input type='text' name='ano' value='" . $libro->ano . "'><br>
                    Número de páginas:<input type='text' name='numPaginas' value='" . $libro->numPaginas . "'><br>";

        // Vamos a añadir un selector para el id del autor o autores.
        // Para que salgan preseleccionados los autores del libro que estamos modificando, vamos a buscar
        // también a esos autores.
        
        // Vamos a convertir esa lista de autores del libro en un array de ids de personas
        $resultAutores = $this->db->query("SELECT idPersona FROM escriben WHERE idLibro='$idLibro'");
        
        if($resultAutores === false){
            //Control de errores
            echo "Error en la consulta: " . $this->db->error;
        }else{
            $autoresSeleccionados = array();
            while ($rowAutores = $resultAutores->fetch_object("Autor")) {
                $autoresSeleccionados[] = $rowAutores->idPersona;
            }
        }
        
        // Ya tenemos todos los datos para añadir el selector de autores al formulario
        $result = $this->db->query("SELECT * FROM personas");
        echo "<select name='autores[]' multiple>";
        while ($row = $result->fetch_object("Autor")) {
            $selected = (in_array($row->idPersona, $autoresSeleccionados)) ? "selected" : "";
            echo "<option value='" . $row->idPersona . "' $selected>" . $row->nombre . " " . $row->apellido . "</option>";
        }
        echo "</select>";
        
        // Por último, un enlace para crear un nuevo autor
        echo "<a href='index.php?action=formularioInsertarAutores'>Añadir nuevo</a><br>";

        // Finalizamos el formulario
        echo "  <input type='hidden' name='action' value='modificarLibro'>
                    <input type='submit'>
                    </form>";
        echo "<p><a href='index.php'>Volver</a></p>";
    }

    // --------------------------------- MODIFICAR LIBROS ----------------------------------------

    function modificarLibro()
    {
        echo "<h1>Modificación de libros</h1>";

        // Vamos a procesar el formulario de modificación de libros
        // Primero, recuperamos todos los datos del formulario (idLibro, titulo....)
        $idLibro = $_GET['idLibro'];
        $titulo = $_GET['titulo'];
        $genero = $_GET['genero'];
        $pais = $_GET['pais'];
        $ano = $_GET['ano'];
        $numPaginas = $_GET['numPaginas'];

         // Verificar si se proporcionaron datos para modificar del libro
        $datosLibroModificados = false;

        if (!empty($titulo) || !empty($genero) || !empty($pais) || !empty($ano) || !empty($numPaginas)) {
        $datosLibroModificados = true;
        }

        // Construir la consulta SQL para actualizar datos del libro solo si hay cambios
        $sqlLibro = "";
        if ($datosLibroModificados) {
            $sqlLibro = "UPDATE libros SET 
                        titulo='$titulo', 
                        genero='$genero', 
                        pais='$pais', 
                        ano='$ano', 
                        numPaginas='$numPaginas' 
                            WHERE idLibro='$idLibro'";
            // Lanzar el UPDATE contra la base de datos
            $this->db->query($sqlLibro);
        }
        //Verificamos si hay cambios en los datos del libro con la función nueva
        
        if ($this->db->affected_rows >= 0) {
            
            // Si la modificación del libro ha funcionado o no se proporcionaron datos para modificar del libro,
            // continuamos actualizando la tabla "escriben".
            // Primero borraremos todos los registros del libro actual y luego los insertaremos de nuevo
            $this->db->query("DELETE FROM escriben WHERE idLibro='$idLibro'");

            // Ya podemos insertar todos los autores junto con el libro en "escriben"
            if (isset($_GET['autores'])) {
                foreach ($_GET['autores'] as $idAutor) {
                    $this->db->query("INSERT INTO escriben (idLibro, idPersona) VALUES ('$idLibro', '$idAutor')");
                }
            }

            echo "Libro actualizado con éxito";
        } else {
            // Si la modificación del libro ha fallado, mostramos mensaje de error
            echo "Ha ocurrido un error al modificar el libro. Por favor, inténtelo más tarde.";
        }
        echo "<p><a href='index.php'>Volver</a></p>";
    }



    // --------------------------------- BUSCAR LIBROS ----------------------------------------

    function buscarLibros()
    {
        // Recuperamos el texto de búsqueda de la variable de formulario
        $textoBusqueda = $_GET['textoBusqueda'];
        echo "<h1>Resultados de la búsqueda: \"$textoBusqueda\"</h1>";

        //Buscamos en la base de datos
        
        $result = $this->db->query("SELECT * FROM libros WHERE titulo LIKE '%$textoBusqueda%'");

        // Buscamos los libros de la biblioteca que coincidan con el texto de búsqueda
        if($result){
        // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
            if ($result->num_rows != 0) {
                // La consulta ha devuelto registros: vamos a mostrarlos
                // Primero, el formulario de búsqueda
                
                // Después, la tabla con los datos
                echo "<table border='1'>
                        <tr>
                            <th>Título</th>
                            <th>Género</th>
                            <th>País</th>
                            <th>Año</th>
                            <th>Número de páginas</th>
                            <th>Acciones</th>
                        </tr>";
                while ($row = $result->fetch_object("Libro")) {
                    echo "<tr>
                            <td>" . $row->titulo . "</td>
                            <td>" . $row->genero . "</td>
                            <td>" . $row->pais . "</td>
                            <td>" . $row->ano . "</td>
                            <td>" . $row->numPaginas . "</td>
                            <td>
                                <a href='index.php?action=borrarLibro&idLibro=" . $row->idLibro . "'>Borrar</a>
                                <a href='index.php?action=formularioModificarLibro&idLibro=" . $row->idLibro . "'>Modificar</a>
                            </td>
                        </tr>";
                }
                echo "</table>";
            } else {
                // La consulta no contiene registros
                echo "No se encontraron datos";
            }
        } else {
            // La consulta ha fallado
            echo "Error al tratar de recuperar los datos de la base de datos. Por favor, inténtelo más tarde";
        }
        echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";
        echo "<p><a href='index.php'>Volver</a></p>";
    }
    // --------------------------------- FORMULARIO Insetar Autores ----------------------------------------

    function formularioInsertarAutores()
    {
        echo "<h1>Insertar autores</h1>";

        echo "<form action = 'index.php' method = 'get'>
                    Nombre:<input type='text' name='nombre'><br>
                    Apellido:<input type='text' name='apellido'><br>";

        // Finalizamos el formulario
        echo "  <input type='hidden' name='action' value='insertarAutor'>
					<input type='submit'>
				</form>";
        echo "<p><a href='index.php'>Volver</a></p>";
    }
    // --------------------------------- INSERTAR autores ----------------------------------------


    function insertarAutor()
    {
    
        echo "<h1>Alta de autores</h1>";
        // Vamos a procesar el formulario de alta de libros
        // Primero, recuperamos todos los datos del formulario (nombre, apellido)
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        
        // Lanzamos el INSERT contra la BD.
        $stmt = $this->db->prepare("INSERT INTO personas (nombre, apellido) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $nombre, $apellido);
            $stmt->execute();

            if ($stmt->affected_rows == 1) {
                echo "Autor insertado con éxito";
            } else {
                // Si la inserción del autor ha fallado, mostramos mensaje de error
                echo "Ha ocurrido un error al insertar el autor. Por favor, inténtelo más tarde.";
            }

            // Cerramos la sentencia preparada
            $stmt->close();
        } else {
            // Si la preparación de la sentencia falla, mostramos un mensaje de error
            echo "Error en la preparación de la consulta SQL";
        }

        echo "<p><a href='index.php'>Volver</a></p>";
    }

}

?>