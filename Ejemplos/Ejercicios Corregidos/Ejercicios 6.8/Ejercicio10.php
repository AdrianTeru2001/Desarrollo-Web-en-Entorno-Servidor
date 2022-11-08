<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Imprimir nombre con mayúsculas</h2>
		<form action="" method="post">
			Escribe tu nombre con tus apellidos:<input type="text" name="nombre" size="50" required><br>
			<input type="submit" value="Convertir">
		</form><br><br>
		<?php 
			if (isset($_POST['nombre'])) {
				echo ucwords($_POST['nombre']);
			echo "<br>";
			$palabras=explode(' ',trim($_POST['nombre']));
			foreach ($palabras as $key => $value) {
				echo ucwords(substr($value,0,1)).'.';
			}
		}
		?>
	</body>
</html>