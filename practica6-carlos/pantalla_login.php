<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="login" action="controlador_login.php" method="post">
      <p>Usuario <input type="text" name="user" value=""></p>
      <p></p>Contraseña <input type="text" name="passwd" value=""></p>
      <input type="submit" name="submit" value="Login">

      <?php

      if (isset($_GET['error'])) {
        echo "<p style=\"color: red\">El usuario y/o ka contraseña son incorrectos</p>";
      }

       ?>

    </form>

  </body>
</html>
