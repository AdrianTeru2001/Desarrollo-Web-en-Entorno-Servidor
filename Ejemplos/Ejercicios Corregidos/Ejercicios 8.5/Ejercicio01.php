<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Escribe tres numeros en el dichero Numeros.txt</h2>
		<form action="" method="post">
			Numero 1: <input type="number" name="n1" required><br>
			Numero 2: <input type="number" name="n2" required><br>
			Numero 3: <input type="number" name="n3" required><br>
			<input type="submit" value="Guardar">
		</form><br>
		<?php
			function  escribirTresNumeros($n1, $n2, $n3) {
				$fNumeros = fopen("Ficheros/Numeros.txt", "w");
				fputs($fNumeros, $n1.PHP_EOL);
				fputs($fNumeros, $n2.PHP_EOL);
				fputs($fNumeros, $n3.PHP_EOL);
				fclose($fNumeros);
			}
			if (isset($_POST['n1'])) {
				 escribirTresNumeros($_POST['n1'], $_POST['n2'], $_POST['n3']);
			}
		?>
	</body>
</html>