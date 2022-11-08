<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>A cuanto equivale un número romano</h2>
		<form action="" method="post">
			Escribe el numero romano:<input type="text" name="numero" size="10" required><br>
			<input type="submit" value="Ver número decimal">
		</form><br><br>
		<?php 
			if (isset($_POST['numero'])) {
				$letras = ["M"=>1000, "D"=>500, "C"=>100, "L"=>50, "X"=>10, "V"=>5, "I"=>1];
				$numeroRomano =  str_split(strtoupper($_POST['numero']));
				$romanoCorrecto = true;
				for ($i=0; $i < count($numeroRomano) && $romanoCorrecto; $i++) { 
					if (!array_key_exists($numeroRomano[$i], $letras)) {//La funcion array_key_exists(valor_a_buscar, array) devuelve verdadero si el array contiene en la KEY lo especificado
						//Para ver si un array contiene en alguna posicion algo en concreto es in_array(valor_a_buscar, array)
						$romanoCorrecto=false;
					}
				}
				if ($romanoCorrecto) {
					$numeroDecimal=0;
					for ($i=0; $i < count($numeroRomano); $i++) { 
						$numeroDecimal+=$letras[$numeroRomano[$i]];
					}
					echo "El número introducido en romano es en decimal: ", $numeroDecimal;
				} else {
					echo "<font color=\"red\">Debe ser un número romano.<font>";
				}
			}
		?>
	</body>
</html>