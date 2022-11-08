<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Cambiar vocales de una frase</h2>
		<h3>Frase original:</h3>
		<?php 
		  $frase="Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar";
		  echo $frase.'<br><br>';
		?>
		
		<form action="" method="post">
			Escribe la vocal: <input type="text" name="vocal" min="1" max="1" name="frase" autofocus>
			<input type="submit" value="Cambiar">
		</form>
		<br>
		<?php 
			if (isset($_POST['vocal'])) {
				$vocal=$_POST['vocal'];
				$vocales=['a','e','i','o','u'];
				if (!in_array($vocal,$vocales)) {
					echo "<font color=\"red\">Debe introducir una vocal.</font>";
				} else {
					echo str_replace($vocales, $vocal, $frase);
				}
			}
		?>
	</body>
</html>