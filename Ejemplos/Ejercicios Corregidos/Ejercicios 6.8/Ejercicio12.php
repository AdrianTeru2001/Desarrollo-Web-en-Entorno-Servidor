<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Informacion de la frase</h2>
		<form action="" method="post">
			Escribe una frase que termine en punto:<br>
			<textarea name="frase" rows="4" cols="50" required autofocus></textarea><br>
			<input type="submit" value="Convertir">
		</form><br><br>
		<?php 
			if (isset($_POST['frase'])) {
				$frase = strtolower($_POST['frase']);
				if (substr($frase, -1)=='.') { //al poner -1 solo es forma abreviada de acceder al último caracter
					$palabrasMayoresA10=0;
					$ocurrenciasVocales=["a"=>0, "e"=>0, "i"=>0, "o"=>0, "u"=>0];
					$totalLetras=strlen($frase);
					$frase = explode(" ", substr($frase, 0, strpos($frase, ".")));
					foreach ($frase as $palabra) {
						if (strlen($palabra)>10) {
							$palabrasMayoresA10++;
						}
						foreach (str_split($palabra) as $letra) {
							if (array_key_exists($letra, $ocurrenciasVocales)) {
								$ocurrenciasVocales[$letra]++;
							}
						}
					}
					echo "<br>Hay ", $palabrasMayoresA10, " palabras con mas de 10 caracteres.<br>";
					foreach ($ocurrenciasVocales as $vocal => $ocurrencias) {
						echo "De la vocal ", $vocal, " hay ", $ocurrencias, " ocurrencias.<br>";
					}
					echo "El porcentajes de espacios en blanco es ", round(((count($frase)-1)*100)/$totalLetras,2), "%.";
				} else {
					echo "<font color=\"red\">La frase debe terminar en punto.<font>";
				}
			}
		?>
	</body>
</html>