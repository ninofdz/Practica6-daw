<?php

include("abrir_conexion.php");
include("controlador.php");

echo "<center>";
echo "<h1>Añadir componente</h1>";
echo "<form action=\"altas.php\" method=\"post\">";
    echo " <p></b><input name=\"type\" type=\"text\" placeholder=\"Tipo\" size=\"48\"></p>";
    echo " <p> </b><input  name=\"model\" type=\"text\" placeholder=\"Marca\" size=\"48\"></p>";
    echo " <p></b><input  name=\"price\" type=\"number\"  placeholder=\"Precio\" size=\"10\"></p>";
    echo " <p><textarea   rows=\"4\" cols=\"50\" name=\"description\" placeholder=\"Descripcion...\"></textarea></p>";
    echo " <a  href=\"http://localhost/ejercicios1/practica3\"><button type=\"button\">Cancelar</button></a>";
    echo " <input type=\"submit\" name=\"submit\" value=\"Guardar\">";
echo "</form>";
echo "</center>";

    if(isset($_POST['submit'])){
    $type = $_POST["type"];
    $model = $_POST["model"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    if (!empty($type) && !empty($model) && !empty($type) && !empty($description)) {
      $conn = conn();
      add_component($conn, $type, $model, $price, $description);

    }else {
      echo "<center>";
      echo "valores incorrectos";
      echo "</center>";

    }

  }


 ?>
