<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Siguiente día de la semana</h2>
		<form action="" method="post">
			Día de la semana: <input type="text" name="dia" required>
			<input type="submit" value="Enviar">
		</form>
		<?php 
			if (isset($_POST['dia'])) {
				$dias = ["lunes"=>"Monday", "martes"=>"Tuesday", "miercoles"=>"Wednesday", "jueves"=>"Thursday", "viernes"=>"Friday", "sábado"=>"Saturday", "domingo"=>"Sunday"];
				$dia = strtolower($_POST['dia']);
				if (array_key_exists($dia, $dias)) {
					$fecha =  date("d/m/Y", strtotime("next $dias[$dia]"));
					echo "<br>El próximo dia de la semana que cae en $dia es: $fecha";
				} else {
					echo "<font color=\"red\">El dia de la semana introducido es incorrecto, por favor, intentelo de nuevo.</font>";
				}
			}
		 ?>
	</body>
</html>