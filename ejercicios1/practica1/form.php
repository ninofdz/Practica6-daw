<!--  versió 2:
		Fa el mateix que la versió 1, però introdueix dues millores:
		 	- Empro la funció isset() per comprovar si l'usuari ha omplit
				els camps
			- Passo el contingut dels paràmetres a variables
-->

<?php
	//inicialitzar les variables
	$user_nom  = $user_llin = $user_dni = $user_tlf = $user_email = $user_coneix = "";
	$nomErr = $llinErr = $dniErr = $tlfErr = $coneixErr = "";
	$emailErr = ".";
	$comprobarEmail = "";
	$contar = "";



	function clean_name($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

	function clean_dni($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
?>

<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<?php



	//Si ha estat processat el formulari, mostro els resultats
	if (isset( $_POST['envia'] ) ) {

		if (empty($_POST["user_nom"])) {
			$nomErr = "<span style='color:red'>*</span>";
			echo "<style> #name{border:1px solid red} </style>";
			echo "<style> .campo{display:block}</style>";
		} else {
			$user_nom = clean_name($_POST["user_nom"]);
		}

		if (empty($_POST["user_llin"])) {
			$llinErr = "<span style='color:red'>*</span>";
			echo "<style> .campo{display:block}</style>";
		} else {
			$user_llin = clean_name($_POST["user_llin"]);
		}


		if (isset ($_POST["user_dni"])) {
			$dni = $_POST["user_dni"];
			$dniNum = strlen($dni);
			$dniLetra = substr($dni, -1);
			$dniNumeros = substr($dni, 0, 8);
			if ($dni == "") {
					$dniErr = "<span style='color:red'>*</span>";
					echo "<style> .campo{display:block}</style>";
			}
			elseif (!is_numeric($dniNumeros) || is_numeric($dniLetra) || $dniNum !== 9  ) {
				$dniErr = "<span style='color:red'>Tiene que tener formato DNI</span>";
				echo "<style> .campo{display:block}</style>";
			} else {
				$user_dni = clean_name($dni);
			}

		}

		if (empty($_POST["user_tlf"])) {
			$tlfErr = "<span style='color:red'>*</span>";
			echo "<style> .campo{display:block}</style>";
		} else {
			$user_tlf = clean_name($_POST["user_tlf"]);
		}

		$email = $_POST["user_email"];

		if (empty($_POST["user_email"])) {
				$comprobarEmail = "user_vacio";
				$emailErr = "<span style='color:red'>*</span>";
				echo "<style> .campo{display:block}</style>";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$comprobarEmail = "mal";
				$emailErr = "<span style='color:red'>Tiene que tener formato email</span>";

		} else {
				$emailErr = "";
				$user_email = clean_name($_POST["user_email"]);
		}

		if (isset ($_POST["coneixements"])) {
				$sel = $_POST['coneixements'];
				$contar = count($sel);
		} elseif ($contar == 0) {
			$coneixErr = "<span style='color:red'>selecciona al menys una opció</span>";
		} else {
			$coneixErr = "";
		}


}


if( empty($nomErr) && empty($llinErr) && empty($dniErr) &&
empty($tlfErr) && empty($emailErr)){


	?>


	<table border="2" cellspacing="0" cellpadding="2" >
			 <tr>
				 <th>Nom: </th>
				 <td><?php echo $user_nom ?></td>
				 <th>Llinatges: </th>
				 <td colspan="3"><?php echo $user_llin ?></td>
			 </tr>
			 <tr>
				 <th>DNI: </th>
				 <td><?php echo $user_dni ?></td>
				 <th>Sexe: </th>
				 <td><?php echo $user_sexe ?></td>
				 <th>Data de naixement: </th>
				 <td><?php echo $data ?> </td>
			 </tr>
			 <tr>
				 <th>Teléfon: </th>
				 <td><?php echo $user_tlf ?></td>
				 <th>Email: </th>
				 <td colspan="3"><?php echo $user_email ?></td>
			 </tr>
			 <tr>
				 <th>Experiència Laboral: </th>
				 <td colspan="5"><?php echo $user_exp ?></td>
			 </tr>
			 <tr>
				 <th>Coneixements: </th>
				 <td colspan="5"><?php if ($numSel == 0) {
				 	echo "Sense coneixements";
				}else {
					foreach($_POST['coneixements'] as $coneixements){
						echo  $coneixements . ", "; }
				}

				  ?></td>
			 </tr>
		 </table>

	<?php
    } else { ?>

<div class="contenedor">

		<div class="formulario">

	  <form action="form.php" method="post">
		<h1>Registra't</h1>

			<fieldset>
				<legend><span class="number">1</span>Tu informació bàsica</legend>
				<span class="campo">Camp requerit *</span><br>
			  <label for="name">Nom:<?php echo $nomErr;?></label>
				<input type="text" id="name" name="user_nom"  value="<?php echo $user_nom?>">

				<label for="llin">Llinatge:<?php echo $llinErr;?></label>
				<input type="text"  id="llin" name="user_llin">

				<label for="dni">DNI:<?php echo $dniErr ?></label>
				<input type="text"  id="dni" name="user_dni">

				<label for="tlf">Telèfon:<?php echo $tlfErr;?></label>
				<input type="text" id="tlf"  name="user_tlf">

				<label for="email">Email:<?php echo $emailErr; ?> </label>
				<input type="text" id="email"  name="user_email" placeholder="Ex: tuemail@dominio.com">

				<label for="dnaix">Data naixement:</label>
				<input type="date" id="dnaix" name="user_dnaix">

				<label for="sexe">Sexe:</label>
  			<input type="radio" id="sexe" name="user_sexe" value="hombre"> Hombre
    		<input type="radio" id="sexe" name="user_sexe" value="mujer"> Mujer
    		<input type="radio" id="sexe" name="user_sexe" value="otro"> Otro
			</fieldset>

			<fieldset>
				<legend><span class="number">2</span>Tu perfil</legend>

				<label id="xd" for="job">Experiencia laboral</label>
					<select id="job" name="user_job">
						<option value="sense">Sense experiència</option>
						<option value="menor1"> < 1 any</option>
						<option value="menor2"> < 2 anys</option>
						<option value="mayor2"> > 2 anysAudi</option>
					</select>

				<label>Coneixements:</label>
			    <input type="checkbox" name="user_coneixements[]" value="java"><label class="light" for="java">Java</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="html5"><label class="light" for="html5">Html5</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="javascript"><label class="light" for="javascript">Javascript</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="php"><label class="light" for="php">PHP</label><br>
			    <input type="checkbox" name="user_coneixements[]" value="xml"><label class="light" for="xml">XML</label><br>
			    <input type="checkbox" name="user_coneixements[]" value=".net"><label class="light" for="net">.NET</label><br>


					</fieldset>
	        <button type="submit" name="envia">enviar</button>
	  </form>
		</div>
		</div>
	<?php } ?>

</body>
</html>
