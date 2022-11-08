<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>La palabra mas larga y cuantas palabras de longitud 8-16 tienen mas de 3 vocales "a"</h2>
		<form action="" method="post">
			Escribe una frase:<br>
			<textarea name="frase" rows="4" cols="50" autofocus></textarea><br>
			<input type="submit" value="Imprimir">
		</form><br>
		<?php 
			if (isset($_POST['frase'])) {
				$signos=['.',',',';'];
				$palabraLarga="";
				$pos=-1;
				$frase=trim($_POST['frase']);
				$palabras=0;
				do {
					$frase=trim($frase)." ";
					$pal=substr($frase,0,strpos($frase,' '));
					$frase=strstr($frase, " ");
					if (in_array(substr($pal, -1), $signos)) {
						$pal=substr($pal,0,-1);
					}
					if (strlen($pal)>strlen($palabraLarga)) {
						$palabraLarga=$pal;
						$pos=strpos($_POST['frase'], $palabraLarga);
					}
					if (palabraCumple($pal)) {
						$palabras++;
					}
				} while (strlen($frase)>1);
				echo "La palabra mas larga es $palabraLarga, con ".strlen($palabraLarga)." y esta en la posicion $pos";
				echo "<br>Hay $palabras con longitud entre 8 y 16 con mas de 3 vocales a";
			}
			function palabraCumple($cadena){
				$cadena=strtolower($cadena);
				if (strlen($cadena)<8 || strlen($cadena)>16) {
					return false;
				}else{
					$cont=0;
					for ($i=0; $i < strlen($cadena) ; $i++) { 
						if ($cadena[$i]=='a') {
							$cont++;
						}
					}
					return ($cont>3);
				}
			}
		?>
	</body>
</html>