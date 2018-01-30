<?php

//include("abrir_conexion.php");

include("abrir_conexion.php");
include("cerrar_conexion.php");
include("controlador.php");

// abrir conexion
$dbConn = conn();
// consultar los datos
modificar($dbConn);
// cerrar conexiíon

function modificar($conn){
  global $tabla_libros;

  if (isset($_GET['drop'])) {
    $id = $_GET['drop'];
    $sqlDelete = "DELETE FROM $tabla_libros WHERE ID = '$id'";

    //Ejecutar la consulta
    $resultadoDelete = $conn->query($sqlDelete);

    //redirigir nuevamente a la página para ver el resultado
    header("location: index.php");

  }
  close_conn($conn);


}

 ?>
