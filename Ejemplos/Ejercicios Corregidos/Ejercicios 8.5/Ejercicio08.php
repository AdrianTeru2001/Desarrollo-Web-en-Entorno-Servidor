<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Escrube un fichero linea a linea.</h2>
		<form action="" method="post">
			Escribe una linea para el fichero:<br>
			<textarea name="linea" rows="1" cols="100" required autofocus></textarea><br>
			<input type="submit" value="Guardar">
		</form>
		<form action="" method="post">
			<input type="hidden" name="fin" required><br>
			<input type="submit" value="Finalizar">
		</form><br>
		<?php
			if (isset($_POST['linea'])) {
				$fichero=fopen("Ficheros/FicheroEscrito.txt", "a");
				fputs($fichero, $_POST['linea'].PHP_EOL);
				fclose($fichero);
			} else if (isset($_POST['fin'])) {
				if (file_exists("Ficheros/FicheroEscrito.txt")) {
					$fichero=fopen("Ficheros/FicheroEscrito.txt", "r");
					echo "Contenido de fichero:<br>";
					echo "<pre>";
					while (!feof($fichero)) {
						echo fgets($fichero);
					}
					echo "</pre>";
					fclose($fichero);
				} else {
					echo "El fichero aún no existe.";
				}
			}
		?>
	</body>
</html>