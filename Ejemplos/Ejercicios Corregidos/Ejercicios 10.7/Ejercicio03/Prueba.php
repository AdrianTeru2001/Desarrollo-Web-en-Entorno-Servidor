<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Objeto Cubo</h2>
		<?php
			include_once 'Cubo.php';

			echo "Creamos Cubo 1, con capacidad 10 contenido 3:<br>";
			$cubo1 = new Cubo(10, 3);
			echo $cubo1;

			echo "<br><br>Creamos Cubo 2, con capacidad 11 contenido 12:<br>";
			$cubo2 = new Cubo(11, 12);
			echo $cubo2;

			echo "<br><br>Establecemos Cubo 2 con 7:<br>";
			$cubo2->setContenido(7);
			echo $cubo2;

			echo "<br><br>Rellenamos Cubo 1 con el contenido de Cubo 2:<br>";
			$cubo2->verter($cubo1);
			echo "Cubo 1: ".$cubo1;
			echo "<br>Cubo 2: ".$cubo2;

			echo "<br><br>Establecemos Cubo 2 con 3:<br>";
			$cubo2->setContenido(3);
			echo "Cubo 2: ".$cubo2;

			echo "<br><br>Rellenamos Cubo 2 con el contenido de Cubo 1:<br>";
			$cubo1->verter($cubo2);
			echo "Cubo 1: ".$cubo1;
			echo "<br>Cubo 2: ".$cubo2;
		?>
	</body>
</html>