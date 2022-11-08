<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Imprimir una frase invertida</h2>
		<form action="" method="post">
			Escribe un texto aquí:<br>
			<textarea name="texto" rows="4" cols="50" required></textarea><br>
			<input type="submit" value="Convertir">
		</form><br><br>
		<?php 
			if (isset($_POST['texto'])) {
				echo strrev($_POST['texto']);
			}
		?>
	</body>
</html>