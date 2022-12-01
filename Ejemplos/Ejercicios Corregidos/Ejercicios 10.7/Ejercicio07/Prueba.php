<?php 
	include_once 'DadoPoker.php';

	if (!isset($_SESSION['dados'])) {
		for ($i=0; $i < 5; $i++) { 
			$_SESSION['dados'][] = new DadoPoker();
		}
	} 
	if (isset($_POST['nuevaTirada'])) {
		foreach ($_SESSION['dados'] as $dado) {
			$dado->tirar();
		}
	}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<style type="text/css">
			table {
				border-spacing: 0;
			}
			table, th, td {
				border: 1px solid black;
			}
			td, th {
				text-align: center;
				min-width: 50px;
				min-height: 50px;
			}
		</style>
	</head>
	<body>
		<h1>Prueba objeto DadoPoker</h1>
		<form action="" method="post">
			<input type="hidden" name="nuevaTirada">
			<input type="submit" value="Titar dados" autofocus>
		</form>
		<br>
		<h3>Tiradas totales: <?=DadoPoker::getTiradasTotales()?></h3>
		<table>
			<tr>
				<th colspan="5">TIRADA ACTUAL</th>
			</tr>
			<tr>
				<th>Dado 1</th>
				<th>Dado 2</th>
				<th>Dado 3</th>
				<th>Dado 4</th>
				<th>Dado 5</th>
			</tr>
			<tr>
				<?php
					foreach ($_SESSION['dados'] as $dado) {
						echo "<td>".$dado->getNumSacado()."</td>";
					}
				?>
			</tr>
		</table>
	</body>
</html>