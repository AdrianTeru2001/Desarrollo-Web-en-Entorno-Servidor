<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Ordenar palabras alfabéticamente de un fichero *.txt</h2>
		<form action="" method="post">
			Fichero con palabras: <input type="text" name="fich" required><br>
			<input type="submit" value="Ordenar">
		</form><br>
		
		<pre><?php
			function limpiaFrase($frase) {
				$signos = [".", ",", "-", ":", ";", "¿", "?", "¡", "!"];
				$frase = trim($frase);
				$frase = str_replace($signos, "", $frase);
				$frase = preg_replace('/  +/', ' ', $frase);
				return $frase;
			}
			function  obtenerArrayPalabrasFichero($ruta) {
				$fich = fopen($ruta, "r");
				$palabras = array();
				while (!feof($fich)) {
					$palabras=array_merge(explode(" ", limpiaFrase(fgets($fich))), $palabras);
				}
				fclose($fich);
				return $palabras;
			}
			if (isset($_POST['fich'])) {
				$nombreFich="Ficheros/".$_POST['fich'];
				if (file_exists($nombreFich)) {
					$palabras=obtenerArrayPalabrasFichero($nombreFich);
					sort($palabras);
					$nombreNuevoFichero=substr($nombreFich, 0, strrpos($nombreFich, "."))."_sort".substr($nombreFich, strrpos($nombreFich, "."));
					$ficheroNuevo = fopen($nombreNuevoFichero, "w");
					foreach ($palabras as $p) {
						fputs($ficheroNuevo, $p.PHP_EOL);
					}
					fclose($ficheroNuevo);
				}
			}
		?>
		</pre>
	</body>
</html>