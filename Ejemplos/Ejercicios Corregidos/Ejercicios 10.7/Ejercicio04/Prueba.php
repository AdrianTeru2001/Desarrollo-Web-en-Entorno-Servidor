<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h2>Prueba objeto Factura</h2>
		<?php
			include_once 'Factura.php';

			echo "Creamos una factura con fecha de hoy<br>";
			$factura1 = new Factura(date("d-m-Y H:i:00",time()));

			echo "Añadimos 1 saco de patatas.<br>";
			$factura1->aniadeProducto("Saco de patatas", 5.24, 1);

			echo "Añadimos 3 tabletas de chocolate.<br>";
			$factura1->aniadeProducto("Tableta de chocolate", 1.95, 3);

			echo "Añadimos 8 botellas de agua.<br>";
			$factura1->aniadeProducto("Botella de agua", 0.58, 8);

			echo "<br><br>Imprimimos la factura.<br><br>";
			$factura1->imprimirFactura();

			echo "<br><br>Pagamos la factura.<br>";
			$factura1->pagar();


			echo "Imprimimos la facruta.<br><br>";
			$factura1->imprimirFactura();
		?>
	</body>
</html>