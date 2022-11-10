<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Funcion para leer un fichero.</h2>
		<?php
			function leerContenidoFichero($ruta) {
				if (file_exists($ruta)) {
					$fichero=fopen($ruta, "r");
					echo "Contenido de fichero:<br>";
					echo "<pre>";
					while (!feof($fichero)) {
						echo fgets($fichero);
					}
					echo "</pre>";
					fclose($fichero);
				} else {
					echo "El fichero no existe.";
				}
			}
			leerContenidoFichero("Ficheros/datosEjercicio.txt");
		?>
	</body>
</html>