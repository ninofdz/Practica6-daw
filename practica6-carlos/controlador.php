<?php


// creamos la variable para la tabla
$tabla_libros = "td_libros";
$tabla_usuarios = "td_usuarios";


// funcion que consulta los datos de la base de datos
function consult_admin($conn){
  global $tabla_libros;
  $sql = "select * from $tabla_libros ORDER BY titulo ASC";
  $result = $conn->query($sql);
  $user = $_SESSION['user'];


  // comprueba que el resultado de la query tenga más de 0 columnas
  if ($result->num_rows > 0) {
      // muestra los datos de la bd en una tabla
      $showComponents = "
    <center>
    <h1>Libreria</h1>
    <a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/controlador_login.php?logout\"><button type=\"button\">Logout</button></a>
    <h3 align=\"right\"> Hola " .$user. "</h3>
      <table border = \"1\" width = \"600\" height = \"150\">
        <tr>
        <th><a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/ordenado.php\">titulo</a></th>
          <th>autor</th>
          <th>genero</th>
          <th>precio</th>
        </tr>";

      while($row = $result->fetch_assoc()) {

        $showComponents.=
        "<tr>
          <td>".$row["titulo"]." </td>
          <td>".$row["autor"]." </td>
          <td>".$row["genero"]." </td>
          <td>".$row["precio"]."</td>
          <td><a href='controlador_baja.php?drop=".$row["id"]."'>Borrar</a></td>
          <td><a href='controlador_modificar.php?update=".$row["id"]."'>modificar</a></td>
        </tr>
        ";
      }

      $showComponents.= "</table></center>";
      echo $showComponents;
      echo "<br><center><a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/altas.php\"><button type=\"button\">Nuevo</button></a></center>";

  } else {
    // si no hay mas de 0 columnas muestra que no hay resultados
      echo "
      <center>
      <a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/controlador_login.php?logout\"><button type=\"button\">Logout</button></a>
      <h1>Libreria</h1>
      <h3 align=\"right\"> Hola " .$user. "</h3>
      <table border = \"1\" width = \"600\" height = \"150\">
              <tr>
                <th>titulo</th>
                <th>autor</th>
                <th>genero</th>
                <th>precio</th>
              </tr>";
      echo "<br><center><a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/altas.php\"><button type=\"button\">Nuevo</button></a></center>";

  }
}

// libreria que ve el cliente para que no pueda modificar como el admin

function consult_cliente($conn){
  global $tabla_libros;
  $sql = "select * from $tabla_libros ";
  $result = $conn->query($sql);
  $user = $_SESSION['user'];

  // comprueba que el resultado de la query tenga más de 0 columnas
  if ($result->num_rows > 0) {
      // muestra los datos de la bd en una tabla
      $showComponents = "
    <center>
    <a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/controlador_login.php?logout\"><button type=\"button\">Logout</button></a>
    <h1>Libreria cliente</h1>
    <h2 align=\"right\"> Hola " .$user. "</h2>
      <table border = \"1\" width = \"600\" height = \"150\">
        <tr>
          <th><a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/altas.php\">titulo</a></th>
          <th>autor</th>
          <th>genero</th>
          <th>precio</th>
        </tr>";

      while($row = $result->fetch_assoc()) {

        $showComponents.=
        "<tr>
          <td>".$row["titulo"]." </td>
          <td>".$row["autor"]." </td>
          <td>".$row["genero"]." </td>
          <td>".$row["precio"]."</td>
        </tr>
        ";
      }

      $showComponents.= "</table></center>";
      echo $showComponents;
      //echo "<br><center><a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/altas.php\"><button type=\"button\">Nuevo</button></a>";
    //  echo "<a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/controlador_baja.php\"><button type=\"button\">Modificar</button></a>";


  } else {
    // si no hay mas de 0 columnas muestra que no hay resultados
      echo "<table border = \"1\" width = \"600\" height = \"150\">
              <tr>
                <th>titulo</th>
                <th>autor</th>
                <th>genero</th>
                <th>precio</th>
              </tr>";
      echo "<br><center><a  href=\"http://localhost/ejercicios1/FERNANDEZ_ANTONIO/altas.php\"><button type=\"button\">Agregar</button></a>";

  }
}


// funcion para eliminar innecesarios caracteres, para eliminar barras invertidas y convertir
// caracteres especiales en entidades HTML y asi evitar ataque SQL Injection
function test_input(&$data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
}

// función para añadir componentes
function add_component($conn, $titulo, $autor, $genero, $precio){
  global $tabla_libros;

  // usa la funcion test input para limpiar los datos
  test_input($titulo);
  test_input($autor);
  test_input($genero);
  test_input($precio);

  // sentencia para insertar los datos a la tabla
  $sql = "INSERT INTO $tabla_libros (titulo, autor, genero, precio) VALUES ('$titulo', '$autor', '$genero', $precio)";

  // si se han insertado correctamente, redireccionará a la página principal
  if ($conn->query($sql) === TRUE) {
      header('location: index.php');

  } else {
      echo "<br>Error:" . $conn->error;
  }

}


// función para modificar componentes
function update_component($conn, $titulo, $autor, $genero, $precio, $id){
  global $tabla_libros;

  // usa la funcion test input para limpiar los datos
  test_input($titulo);
  test_input($autor);
  test_input($genero);
  test_input($precio);
  test_input($id);

  // sentencia para insertar los datos a la tabla
  $sql = "UPDATE $tabla_libros SET titulo = '$titulo', autor = '$autor', genero = '$genero', precio = '$precio' where id = '$id'";

  // si se han insertado correctamente, redireccionará a la página principal
  if ($conn->query($sql) === TRUE) {
      header('location: index.php');

  } else {
      echo "<br>Error:" . $conn->error;
  }

}


 ?>
