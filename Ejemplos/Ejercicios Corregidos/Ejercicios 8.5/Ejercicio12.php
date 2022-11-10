<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Quita las etiquetas html</h2>
		<form action="" method="post">
			Documento html: <input type="text" name="fich" required><br>
			<input type="submit" value="Eliminar etiquetas">
		</form><br>
		<?php
			if (isset($_POST['fich'])) {
				$nombreFich="Ficheros/".$_POST['fich'];
				if (file_exists($nombreFich)) {
					$fichero=fopen($nombreFich, "r");
					$nombreNuevoFichero=substr($nombreFich, 0, strrpos($nombreFich, "."))."_Sin".substr($nombreFich, strrpos($nombreFich, "."));
					$nuevoFichero=fopen($nombreNuevoFichero, "w");
					while (!feof($fichero)) {
						$frase=fgets($fichero);
						while (!(strpos($frase, "<")===false && strpos($frase, ">")===false)) {
							$posIni=strpos($frase, "<");
							$posFin=strpos($frase, ">");
							$frase=substr($frase, 0, $posIni).substr($frase, $posFin+1);
						}
						fputs($nuevoFichero, $frase);
					}
					fclose($fichero);
					fclose($nuevoFichero);
				}
			}
		?>
	</body>
</html>