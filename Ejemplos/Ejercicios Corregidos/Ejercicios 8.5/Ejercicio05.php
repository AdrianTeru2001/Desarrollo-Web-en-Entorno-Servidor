<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Funcion de ficheros para sobreescribir o ampliar un fichero.</h2>
		<?php
			function escribirNumerosMod($nums, $accion) {
				if ($accion=="sobreescribir") {
					$fichero=fopen("Ficheros/datosEjercicio.txt", "w");
					foreach ($nums as $num) {
						fputs($fichero, $num.PHP_EOL);
					}
					fclose($fichero);
				} else if ($accion=="ampliar") {
					$fichero=fopen("Ficheros/datosEjercicio.txt", "a");
					foreach ($nums as $num) {
						fputs($fichero, $num.PHP_EOL);
					}
					fclose($fichero);
				}
			}
			$numeros=[23, 45, 2, 59, 62, 10, 2, 87, 6, 0, 18, 45];
			escribirNumerosMod($numeros, "sobreescribir");
		?>
	</body>
</html>