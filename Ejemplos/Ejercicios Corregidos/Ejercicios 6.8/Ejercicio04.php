<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Verifica si la frase empieza por la misma palabra que termina</h2>
		<form action="" method="post">
			Escribe una frase:<br>
			<textarea name="frase" rows="4" cols="50" autofocus></textarea><br>
			<input type="submit" value="Comprobar">
		</form><br>
		<?php 
			if (isset($_POST['frase'])) {
				$frase=trim($_POST['frase']);
				$primera=substr($frase, 0, strpos($frase, " "));
				$ultima=substr($frase, strrpos($frase, " ")+1);
				if ($primera==$ultima) {
					echo "Empieza y termina con la misma palabra<br>";
				} else {
					echo "NO Empieza y termina con la misma palabra<br>";
				}
			}
		?>
	</body>
</html>