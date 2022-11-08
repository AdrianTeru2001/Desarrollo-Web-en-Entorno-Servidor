<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Voltear un string hasta quedar de la misma manera</h2>
		<form action="" method="post">
			Escribe algo:<br>
			<textarea name="texto" rows="4" cols="50" autofocus></textarea><br>
			<input type="submit" value="Comprobar">
		</form><br>
		<?php 
			if (isset($_POST['texto'])) {
				$texto=$_POST['texto'];
				echo "$texto";
				for ($i=0; $i < strlen($texto); $i++) { 
					//$texto=substr($texto, -1).substr($texto, 0, -1);
					$texto=substr($texto,strlen($texto)-1).substr($texto,0,strlen($texto)-1);
					echo "<br>$texto";
				}
			}
		?>
	</body>
</html>