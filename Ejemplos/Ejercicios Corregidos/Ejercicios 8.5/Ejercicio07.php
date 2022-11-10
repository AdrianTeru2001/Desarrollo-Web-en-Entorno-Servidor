<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Uso de las funciones.</h2>
		<?php
			include_once 'Funciones.php';
			echo "Primer paso:<br>";
			$numeros=[2, 8, 14];
			escribirNumerosMod($numeros, "sobreescribir");
			leerContenidoFichero("Ficheros/datosEjercicio.txt");
			echo "Segundo paso:<br>";
			$numeros=[33, 11, 16];
			escribirNumerosMod($numeros, "ampliar");
			leerContenidoFichero("Ficheros/datosEjercicio.txt");
			echo "Tercer paso:<br>";
			$numeros=[4, 99, 12];
			escribirNumerosMod($numeros, "sobreescribir");
			leerContenidoFichero("Ficheros/datosEjercicio.txt");
			echo "<br>Fin del programa.";
		?>
	</body>
</html>