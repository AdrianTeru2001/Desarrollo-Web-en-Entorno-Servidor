<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>¿Cuantos años tendrás?</h2>
		<form action="" method="post">
			Fecha de nacimiento: <input type="date" name="nac" required><br>
			Fecha futura: <input type="date" name="ftura" required><br>
			<input type="submit" value="Enviar">
		</form>
		<?php 
			if (isset($_POST['nac']) && isset($_POST['ftura'])) {
				$fechaNac = strtotime($_POST['nac']);
				$fechaFutura = strtotime($_POST['ftura']);
				$tiempoTranscurrido = $fechaFutura - $fechaNac;
				$tiempoTranscurrido = (int)($tiempoTranscurrido/31557600);//Que es lo mismo que divifir entre 60*60*24*365.25
				$fechaFutura = date("d \d\\e\l m \d\\e\l Y", $fechaFutura);
				echo "<br>El $fechaFutura tendrás $tiempoTranscurrido años";
			}
		 ?>
	</body>
</html>