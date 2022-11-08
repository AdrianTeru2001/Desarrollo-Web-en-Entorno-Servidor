<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Frase convertida a ASCII y devuelta a su origen</h2>
		<form action="" method="post">
			Escribe un texto aquí:<br>
			<textarea name="texto" rows="4" cols="50" required></textarea><br>
			<input type="submit" value="Convertir">
		</form><br><br>
		<?php 
			if (isset($_POST['texto'])) {
				$frase = $_POST['texto'];
				for ($i=0; $i < strlen($frase); $i++) { 
					$caracteres[]=ord($frase[$i]);
					echo $caracteres[$i];
				}
				echo "<br><br>";
				foreach ($caracteres as $caracter) {
					echo chr($caracter);
				}
			}
		?>
	</body>
</html>