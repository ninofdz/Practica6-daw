<?php

// incluir archivos
include("abrir_conexion.php");
include("cerrar_conexion.php");
include("controlador.php");

session_start();



if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  if($user == 'admin'){
    //abrir conexion
   $dbConn = conn();
    //consultar los datos
    consult_admin($dbConn);
    //cerrar conexíon
  } elseif ($user == 'cliente') {
    //abrir conexion
   $dbConn = conn();
    //consultar los datos
    consult_cliente($dbConn);
    //cerrar conexíon
   close_conn($dbConn);  }
}else {
  include("pantalla_login.php");
}




 ?>
