<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Cuantas palabras tiene una frase</h2>
		<form action="" method="post">
			Escribe una frase:<br>
			<textarea name="frase" rows="4" cols="50" autofocus></textarea><br>
			<input type="submit" value="Imprimir">
		</form><br>
		<?php 
			if (isset($_POST['frase'])) {
				$frase=trim($_POST['frase']);
				$palabras=0;
				do {
					$palabras++;
					$frase=trim(strstr($frase, " "));
				} while ($frase!="");
				echo "La frase tiene $palabras palabras.";
			}
		?>
	</body>
</html>