<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Guardar información</title>
</head>
<body>
	<h2>Guardar información en un archivo</h2>

<?php
	$nombre = "Bryan Cardiel";
	file_put_contents("alumnos.txt", $nombre . PHP_EOL, FILE_APPEND);
	echo "Información guardada correctamente.";
	echo "<br><br>";
?>
<?php
	$nombre = "Said Galarza";
	file_put_contents("alumnos.txt", $nombre . PHP_EOL, FILE_APPEND);
	echo "Información guardada correctament";
	echo "Alumno agregado correctamente.";
?>
<?php
	echo"<br><br>";
	$contenido = file_put_contents("alumnos.txt");
	// echo $contenido;
	echo nl2br($contenido);
?>
</body>
</html>