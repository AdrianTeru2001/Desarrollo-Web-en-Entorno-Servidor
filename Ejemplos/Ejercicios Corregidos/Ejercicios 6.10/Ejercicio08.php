<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>¿Cuantos años tendrás?</h2>
		<form action="" method="post">
			
			Nombre de la persona nº 1: <input type="text" name="nombre1" required><br>
			Fecha de nacimiento persona nº 1: <input type="date" name="fechaNac1" required><br>
			Nombre de la persona nº 2: <input type="text" name="nombre2" required><br>
			Fecha de nacimiento persona nº 2: <input type="date" name="fechaNac2" required><br>
			<input type="submit" value="Enviar">
		</form>
		<?php 
			if (isset($_POST['nombre1']) && isset($_POST['fechaNac1']) && isset($_POST['nombre2']) && isset($_POST['fechaNac2'])) {
				$edad1=(int)((time()-strtotime($_POST['fechaNac1']))/31557600);
				$edad2=(int)((time()-strtotime($_POST['fechaNac2']))/31557600);
				echo $_POST['nombre1']. " tiene $edad1 años<hr>";
				echo $_POST['nombre2']. " tiene $edad2 años<hr>";
				if ($edad1>$edad2) {
					echo "<br>La persona mas mayor es ", $_POST['nombre1'], ".";
				} else if ($edad1<$edad2) {
					echo "<br>La persona mas mayor es ", $_POST['nombre2'], ".";
				} else {
					echo "<br>", $_POST['nombre1'], " y ", $_POST['nombre2'], " tienen la misma edad.";
				}
			}
		 ?>
	</body>
</html>