<?php
require_once("models/login_model.php");

class login_controller {

  function login(){
    $usuario = new login_model();

    $username = !empty($_POST['username']) ? $_POST['username'] : "";
    $password = !empty($_POST['password']) ? $_POST['password'] : "";

    $usuario->setUsuario($username);
    $usuario->setPassword($password);

      $ok = $usuario->verifyUser();

          if ($ok) {
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];

          }
          else {

          }
      }

      

}


 ?>
