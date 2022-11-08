<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Cuenta cuantas palabras tiene cada frase</h2>
		<form action="" method="post">
			Escribe dos frases separadas por puntos:<br>
			<textarea name="texto" rows="4" cols="50" autofocus></textarea><br>
			<input type="submit" value="Comprobar">
		</form><br>
		<?php 
			if (isset($_POST['texto'])) {
				$frases=$_POST['texto'];
				$contenidoFrases=explode(".", $frases);
				if ($contenidoFrases[count($contenidoFrases)-1]=="") {
					//Eliminamos la última posición del array si está vacía, ya que al terminar en punto la última frase nos crea una última posición vacía
					unset($contenidoFrases[count($contenidoFrases)-1]);
				}
				for ($i=0; $i < count($contenidoFrases); $i++) { 
					$contenidoFrases[$i]=trim($contenidoFrases[$i]);
					$contenidoFrases[$i]=explode(" ", $contenidoFrases[$i]);
					echo "<br>La frase numero ", $i+1, " tiene ", count($contenidoFrases[$i]), " palabras.";
				}
			}
		?>
	</body>
</html>