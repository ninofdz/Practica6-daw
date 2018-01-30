<?php
// incluir archivos
include("abrir_conexion.php");
include("controlador.php");
$conn = conn();
$id = $_GET["update"];

$sql = "SELECT titulo, autor, genero, precio from $tabla_libros where id =$id";

// guarda el resultado de la sentencia sql ejecutada en una variable
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$genero = $row['genero'];

// crear el formulario
echo "<center>";
echo "<h1>Modificar componente</h1>";
echo "<form action=\"controlador_modificar.php?update={$_GET['update']}\" method=\"post\">";
    echo " <p>titulo: </b><input name=\"titulo\" type=\"text\"  value=\"".$row['titulo']."\" size=\"48\"></p>";
    echo " <p> autor: </b><input  name=\"autor\" type=\"text\"  value=\"".$row['autor']."\" size=\"48\"></p>";
    if ($genero == 'infantil') {
      echo " Género: <select name=\"genero\" >
                <option value=\"infantil\" selected>infantil</option>
                <option value=\"ficcion\" >ficcion</option>
                <option value=\"ensayo\">ensayo</option>
              </select>";
    }
    if ($genero == 'ficcion') {
      echo " Género: <select name=\"genero\" >
                <option value=\"infantil\">infantil</option>
                <option value=\"ficcion\" selected>ficcion</option>
                <option value=\"ensayo\">ensayo</option>
              </select>";
    }
    if ($genero == 'ensayo') {
      echo " Género: <select name=\"genero\" >
                <option value=\"infantil\">infantil</option>
                <option value=\"ficcion\" >ficcion</option>
                <option value=\"ensayo\" selected>ensayo</option>
              </select>";
    }
    echo " <p>precio: </b><input  name=\"precio\" type=\"number\"  value=\"".$row['precio']."\" size=\"10\"></p>";
    echo " <a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO\"><button type=\"button\">Cancelar</button></a>";
    echo " <input type=\"submit\" name=\"submit\" value=\"Guardar\">";
    echo "</form>";
echo "<form action=\"controlador_baja.php\" method=\"post\">";
echo "</form>";
echo "</center>";

  // si se ha enviado el formulario añade los componentes


    if(isset($_POST['submit'])){
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];
    $precio = $_POST["precio"];

    // comprueba que no hayan campos vacios
    if (!empty($titulo) && !empty($autor) && !empty($genero) && !empty($precio)) {
      update_component($conn, $titulo, $autor, $genero, $precio, $id);

    }else {
      // si no se han enviado correctamente los datos, mostrará un mensaje de error.
      echo "<center>";
      echo "valores incorrectos";
      echo "</center>";
    }
  }


 ?>
