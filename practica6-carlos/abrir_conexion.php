<?php

// funcion para establecer conexión con la base de datos

function conn(){

  $servername = "localhost";
  $username = "user";
  $password = "user";
  $dbname = "bd6";

  // crea la conexion
  $conn = new mysqli($servername, $username, $password, $dbname);

  return $conn;
}
 ?>
