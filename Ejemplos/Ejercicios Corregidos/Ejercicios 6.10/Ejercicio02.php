<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Elegir formatos de horas</h2>
		<form action="" method="post">
			Hora: <input type="number" name="hora" required><br>
			Minutos: <input type="number" name="min" required><br>
			Segundos: <input type="number" name="seg" required><br>
			Elije el formato: 
			<select name="formato">
				<option value="H:i:s">HH24:MM:SS</option>
				<option value="H:i:s">HH24:MM:SS</option>
				<option value="G:i:s">H24:MM:SS</option>
				<option value="G:i:s">H24:MM:SS</option>
				<option value="h:i:s A">HH12:MM:SS AM</option>
				<option value="h:i:s a">HH12:MM:SS am</option>
				<option value="g:i:s A">H12:MM:SS AM</option>
				<option value="g:i:s a">H12:MM:SS am</option>
			</select>
			<input type="submit" value="Enviar">
		</form>
		<?php 
			if (isset($_POST['hora']) && isset($_POST['min']) && isset($_POST['seg']) && isset($_POST['formato'])) {
				$hora = $_POST['hora'];
				$minutos = $_POST['min'];
				$segundos = $_POST['seg'];
				if (validarHora($hora, $minutos, $segundos)) {
					$formato = $_POST['formato'];
					$fecha=date($formato, strtotime("$hora:$minutos:$segundos"));
					echo "$fecha";
				} else {
					echo "<font color=\"red\">La hora no es correcta, inténtelo de nuevo.</font>";
				}
			}
			function validarHora($h, $m, $s){
				return $h>=0 && $h<=23 && $m>=0 && $m<=59 && $s>=0 && $s<=59;
			}
		 ?>
	</body>
</html>