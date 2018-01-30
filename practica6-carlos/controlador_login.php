<?php

include("abrir_conexion.php");
include("cerrar_conexion.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// login

if (isset($_POST["submit"])) {

  $user = test_input($_POST["user"]);
  $passwd = test_input($_POST["passwd"]);
  $sql = "select usuario, password from td_usuarios where usuario like '$user' and password like '$passwd'";

  $dbConn = conn();

  $result = $dbConn->query($sql);

  if ($result->num_rows > 0) {
    session_start();
    $_SESSION['user'] = $user;
    header('location: index.php');
  } else {
    include 'pantalla_login';
    header('location: index.php?error=si');
  }

}

$user = test_input($_POST["user"]);

// logout
if (isset($_GET["logout"])) {
  session_start();
  // Borra contenido de $_SESSION
  session_unset();
  //
  session_destroy();
  header('location: index.php');
}



 ?>
