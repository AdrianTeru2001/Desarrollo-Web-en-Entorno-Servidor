<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Uniendo dos ficheros en uno</h2>
		<form action="" method="post">
			Primer fichero: <input type="text" name="f1" required><br>
			Segundo fichero: <input type="text" name="f2" required><br>
			<input type="submit" value="Unir ficheros">
		</form><br>
		<?php
			if (isset($_POST['f1'])) {
				if (file_exists("Ficheros/".$_POST['f1']) && file_exists("Ficheros/".$_POST['f2'])) {
					if (count(file("Ficheros/".$_POST['f1']))>=count(file("Ficheros/".$_POST['f2']))) {
						$lineasfmenor=count(file("Ficheros/".$_POST['f2']));
					} else {
						$lineasfmenor=count(file("Ficheros/".$_POST['f1']));
					}
					$fichero1 = fopen("Ficheros/".$_POST['f1'], "r");
					$fichero2 = fopen("Ficheros/".$_POST['f2'], "r");
					$resultante = fopen("Ficheros/MezclaFicheros.txt", "w");
					for ($i=0; $i < $lineasfmenor; $i++) {
						fputs($resultante, fgets($fichero1));
						echo "pasa<br>";
						fputs($resultante, fgets($fichero2));
						echo "pasa<br>";
					}
					while (!feof($fichero1)) {
						fputs($resultante, fgets($fichero1));
						echo "pasa<br>";
					}
					while (!feof($fichero2)) {
						fputs($resultante, fgets($fichero2));
						echo "pasa<br>";
					}
					fclose($fichero1);
					fclose($fichero2);
					fclose($resultante);
				} else {
					echo "Alguno de los ficheros no existe.";
				}
			}
		?>
	</body>
</html>