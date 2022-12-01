<?php
	//session_start(); Ya esta dentro de la clase CocheLujo incluida 
	include_once 'CocheLujo.php';
	if (!isset($_SESSION['coches'])) {
		$_SESSION['coches']=[];
	}
	if (isset($_POST['matricula'])) {
		if ($_POST['lujo']=="") {
			$coche = new Coche($_POST['matricula'],$_POST['modelo'],$_POST['precio']);
		}else{
			$coche = new CocheLujo($_POST['matricula'],$_POST['modelo'],$_POST['precio'], $_POST['lujo']);
		}
		$_SESSION['coches'][]=serialize($coche);
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="" method="post">
			Matricula: <input type="text" name="matricula">
			Modelo: <input type="text" name="modelo">
			Precio: <input type="number" name="precio">
			Suplemento lujo: <input type="number" name="lujo">
			<input type="submit" value="Añadir">
		</form>
		<br>
		<?php echo "Coche mas caro-> ".Coche::masCaro(); ?>
		<br><br>
		<table border="1">
			<tr><td>Matricula</td><td>Modelo</td><td>Precio</td><td>(Suplemento lujo)</td></tr>
<?php 
		
		foreach ($_SESSION['coches'] as $coche) {
			$coche=unserialize($coche);
			echo "<tr>".$coche;
			if (get_class($coche)=='Coche') {
				echo "<td>No procede</td>";
			}
			echo "</tr>";
		}
?>
	</body>
</html>