<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Optiene y suma los numeros que contiene Numeros.txt</h2>
		<?php
			function  obtenerSuma($ruta) {
				if (file_exists($ruta)) {
					$fNumeros = fopen($ruta, "r");
					$suma = 0;
					while (!feof($fNumeros)) {
						$suma+=(int)fgets($fNumeros);
					}
					fclose($fNumeros);
				} else {
					$suma = -1;
					echo "El fichero NOOO existe<br>";
				}
				return $suma;
			}
			$suma=obtenerSuma("Ficheros/Numeros.txt");
			echo "La suma de los numeros es: ".$suma;
		?>
	</body>
</html>