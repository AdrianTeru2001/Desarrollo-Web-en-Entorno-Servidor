<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Imprimir string a caracter por linea</h2>
		<form action="" method="post">
			Escribe una frase:<br>
			<textarea name="frase" rows="4" cols="50" autofocus></textarea><br>
			<input type="submit" value="Imprimir">
		</form><br>
		<?php 
			if (isset($_POST['frase'])) {
				$frase=$_POST['frase'];
				for ($i=0; $i < strlen($frase); $i++) { 
					echo $frase[$i], "<br>";
				}
			}
		?>
	</body>
</html>