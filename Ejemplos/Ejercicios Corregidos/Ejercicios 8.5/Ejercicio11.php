<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Cuantas ocurrencias encuentra.</h2>
		<form action="" method="post">
			Fichero en el que buscar: <input type="text" name="fich" required><br>
			Cadena de texto a buscar: <input type="text" name="busqueda" required><br>
			<input type="submit" value="Contar texto">
		</form><br>
		<?php
			if (isset($_POST['fich'])) {
				if (file_exists("Ficheros/".$_POST['fich'])) {
					$palabra=$_POST['busqueda'];
					$ocurrencias=0;
					$fichero=fopen("Ficheros/".$_POST['fich'], "r");
					while (!feof($fichero)) {
						$posicion=0;
						$frase=fgets($fichero);
						while (($posicion=strpos($frase, $palabra))!==false) {
							$ocurrencias++;
							$frase=substr($frase, $posicion+strlen($palabra));
						}
					}
					echo "El fichero contiene $ocurrencias vez/es el texto '$palabra'.";
					fclose($fichero);
				}
			}
		?>
	</body>
</html>