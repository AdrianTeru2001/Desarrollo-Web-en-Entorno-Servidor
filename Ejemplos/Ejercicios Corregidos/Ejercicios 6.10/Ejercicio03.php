<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Día de la semana</h2>
		<form action="" method="post">
			Fecha: <input type="date" name="fecha" required>
			<input type="submit" value="Enviar">
		</form>
		<?php 
			if (isset($_POST['fecha'])) {
				$diasDeSemana = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
				echo $_POST['fecha']."<br>";
				$fecha = date("w", strtotime($_POST['fecha']));
				echo "<br>El dia de la semana es $diasDeSemana[$fecha]";
			}
		 ?>
	</body>
</html>