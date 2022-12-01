<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php 
			include_once 'Coche.php';
			include_once 'Bicicleta.php';

			echo "Creamos 2 bicicletas y 1 coche:<br>";
			$bici1 = new Bicicleta("BMX", 0);
			echo $bici1."<br>";
			$bici2 = new Bicicleta("Montaña", 5);
			echo $bici2."<br>";
			$coche = new Coche("Audi", "R8 Coupé V10 RWS", 0);
			echo $coche."<br>";

			echo "<br>Se han creado ".Vehiculo::getVehiculosCreados()." vehiculos.<br>";
			echo "Los kilometros totales actuales son ".Vehiculo::getKilometrosTotales()."Km.<br>";

			echo "<br>La bicicleta numero 1 va ha andar 8Km.<br>";
			echo $bici1->recorrerKilometros(8);
			echo "<br>La bicicleta numero 2 va ha andar 15Km.<br>";
			echo $bici2->recorrerKilometros(15);

			echo "<br><br>La bicicleta numero 1 va ha Hacer el caballito.<br>";
			echo $bici1->haderCaballito();

			echo "<br><br>El coche numero 1 va a andar 12Km.<br>";
			echo $coche->recorrerKilometros(12);

			echo "<br><br>El coche numero 1 va a quemar ruedas.<br>";
			echo $coche->quemarRuedas();

			echo "<br><br>Kilometraje de la bicicleta numero 1: ".$bici1->getKilometros()."<br>";
			echo "Kilometraje de la bicicleta numero 2: ".$bici2->getKilometros()."<br>";
			echo "Kilometraje del coche: ".$coche->getKilometros()."<br>";
			echo "<br>Los kilometros totales actuales son ".Vehiculo::getKilometrosTotales()."Km.<br>";
		 ?>
	</body>
</html>