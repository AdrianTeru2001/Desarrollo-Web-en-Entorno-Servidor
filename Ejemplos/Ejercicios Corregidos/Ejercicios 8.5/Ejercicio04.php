<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Usa las funciones de ficheros creadas</h2>
		<?php
			include_once  'Funciones.php';
			escribirTresNumeros(2, 8, 14);
			$suma=obtenerSuma("Ficheros/NumerosFunciones.txt");
			echo "2 + 8 + 14 = ", $suma;
			$vector=obtenerArrNum("Ficheros/NumerosFunciones.txt");
			echo "<br>El fichero NumerosFunciones.txt contiene:<br>";
			foreach ($vector as $n) {
				echo $n,"<br>";
			}
		?>
	</body>
</html>