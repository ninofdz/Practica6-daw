<?php
// incluir archivos
include("abrir_conexion.php");
include("controlador.php");

// crear el formulario
echo "<center>";
echo "<h1>Añadir libro</h1>";
echo "<form action=\"altas.php\" method=\"post\" id=\"carform\">";
    echo " <p></b><input name=\"titulo\" type=\"text\" placeholder=\"titulo\" size=\"48\"></p>";
    echo " <p> </b><input  name=\"autor\" type=\"text\" placeholder=\"autor\" size=\"48\"></p>";
    echo "  Genero: <select name=\"genero\" form=\"carform\">
              <option value=\"infantil\">infantil</option>
              <option value=\"ficcion\">ficcion</option>
              <option value=\"ensayo\">ensayo</option>
            </select>";
    echo " <p></b><input  name=\"precio\" type=\"number\"  placeholder=\"Precio\" ></p>";
    echo " <input type=\"submit\" name=\"submit\" value=\"Guardar\">";
    echo " <a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO\"><button type=\"button\">Cancelar</button></a>";

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
      $conn = conn();
      add_component($conn, $titulo, $autor, $genero, $precio);

    }else {
      // si no se han enviado correctamente los datos, mostrará un mensaje de error.
      echo "<center>";
      echo "Los campos no pueden estar vacíos";
      echo "</center>";

    }

  }


 ?>
