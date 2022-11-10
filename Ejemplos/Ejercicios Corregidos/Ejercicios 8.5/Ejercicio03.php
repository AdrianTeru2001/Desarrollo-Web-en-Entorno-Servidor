<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Optiene un array con los numeros del fichero Numeros.txt</h2>
		<?php
			function  obtenerArrNum($ruta) {
				$fNumeros = fopen($ruta, "r");
				$numeros = array();
				while (!feof($fNumeros)) {
					$numeros[]=fgets($fNumeros);
				}
				return $numeros;
			}
			$nums=obtenerArrNum("Ficheros/Numeros.txt");
			echo "El array contiene:<br>";
			foreach ($nums as $n) {
				echo $n,"<br>";
			}
		?>
	</body>
</html>