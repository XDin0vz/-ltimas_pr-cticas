<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de alumnos</title>
</head>
<body>
	<h2>Registro de datos de alumnos</h2>
	<form method="POST">
		Nombre del alumnos: <br>
		<input type="text" name="nombre"><br><br>

		Edad: <br>
		<input type="text" name="edad"><br><br>

		Pasatiempo: <br>
		<input type="text" name="pasatiempo"><br><br>

		<button type="submit" name="guardar">Guardar</button>
	</form>

	<br>
	<form method="POST">
		<button type="submit" name="eliminar">Eliminar zzz</button>
	</form>

<?php
	if (isset($_POST["guardar"])) {
		$nombre = $_POST['nombre'];
		$edad = $_POST['edad'];
		$pasatiempo = $_POST['pasatiempo'];

		file_put_contents("alumnos.txt", $nombre . PHP_EOL, FILE_APPEND);
		file_put_contents("edades.txt", $edad . PHP_EOL, FILE_APPEND);
		file_put_contents("pasatiempos.txt", $pasatiempo . PHP_EOL, FILE_APPEND);

		echo "<p>Datos guardados correctamente.</p>";
	}

	if (isset($_POST["eliminar_uno"])) {
		$archivo = $_POST['archivo'];
		$dato = trim($_POST['dato_eliminar']);

		if (file_exists($archivo)) {
			$txt = file($archivo);

			$ntxt = array_diff($txt, [$dato]);

			if (count($ntxt) > 0) {
				file_put_contents($archivo, implode(PHP_EOL, $ntxt) . PHP_EOL); 
			} else {
				file_put_contents($archivo, "");
			}

			echo "<p>Registro eliminado, $archivo.</p>";
		} else {
			echo "<p>Registro no existente.</p>";
		}
	}

	if (isset($_POST["eliminar"])) {
		if (file_exists("alumnos.txt")) { unlink("alumnos.txt");}
		if (file_exists("edades.txt")) { unlink("edades.txt");}
		if (file_exists("pasatiempos.txt")) { unlink("pasatiempos.txt");}
		echo "<p>Información eliminada correctamente.</p>";
	}
?>
	<h3>Lista de registros</h3>
<?php
	if (file_exists("alumnos.txt")) {
		echo nl2br(file_put_contents("alumnos.txt")) . "<br>";
		echo nl2br(file_put_contents("edades.txt")) . "<br>";
		echo nl2br(file_put_contents("pasatiempos.txt")) . "<br>";
	}
	else {
		echo "No existen registros.";
	}
?>
</body>
</html>