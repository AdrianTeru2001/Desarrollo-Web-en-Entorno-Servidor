<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Cuenta cuantas palabras tiene cada frase</h2>
		<form action="" method="post">
			Escribe un texto aquí:<br>
			<textarea name="texto" rows="4" cols="50" required></textarea><br>
			Escribe una palabra:<input type="text" name="palabra" required><br>
			<input type="submit" value="Comprobar">
		</form><br>
		<?php 
			if (isset($_POST['texto']) && $_POST['palabra']) {
				$palabra = $_POST['palabra'];
				if (preg_match("/$palabra/", $_POST['texto'])) {
					echo "La palabra espeificada está en el texto.";
				} else {
					echo "La palabra espeificada NO está en el texto.";
				}
			}
		?>
	</body>
</html>