<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilos.css" type="text/css">
	<title>Document</title>
</head>

<body>
	<h1>Consulta de la API productos</h1>
	<div class="contenedor">
		<?php
		if (isset($_POST['cerrar'])) {
			session_destroy(); //destruye la sesion
			header("refresh: 0;"); // refresca la página
		}
		if (isset($_POST['user'])) {
			$_SESSION['identificar'] = "&user=" . $_POST['user'] . "&token=" . $_POST['token'];
		}
		if (!isset($_SESSION['identificar'])) {

		?>
			<form action="#" method="post">
				<h2>Identificate</h2>
				Nombre <input type="text" name="user">
				Token de acceso <input type="text" name="token">
				<input type="submit" name="aceptar" value="Aceptar">
			</form>
		<?php
		} else {
			echo "<h3>Datos sessión: " . $_SESSION['identificar'] . "</h3>"; //muestra solo para control
		?>
			<form action="#" method="post">
				<h2>Filtro por nombre</h2>
				Nombre <input type="text" name="nombre">
				<input type="submit" name="filtrar" value="Filtrar">
			</form>
			<form action="#" method="post">
				<h2>Filtro por precio:</h2>
				Mínimo <input type="number" name="min" required>
				Máximo <input type="number" name="max" required>
				<input type="submit" name="filtrar" value="Filtrar">
			</form>
			<form action="#" method="post">
				<h2>Cerrar Session </h2>
				<input type="submit" name="cerrar" value="Cerrar">
			</form>
		<?php
			if (isset($_POST['max']) && isset($_POST['min'])) {
				$parametros = '?min=' . $_POST['min'] . '&max=' . $_POST['max'];
				hacerPeticion($parametros);
			} else if (isset($_POST['nombre'])) {
				$parametros = "?nombre=" . $_POST['nombre'];
				hacerPeticion($parametros);
			}
		}
		function hacerPeticion($parametros){
			$data = file_get_contents("http://localhost/Curso%20Actual/Ejercicios%20Adicionales/Tema12/Boletin/12.6/3/consultaProductos.php" . $parametros . $_SESSION['identificar']);
			$productos = json_decode($data);
			if ($productos->codEstado != 200) {
				echo "<h1>$productos->mensaje</h1>";
			} else {
				mostrarDatos($productos);
			}
		}
		function mostrarDatos($productos)
		{
			echo "<table border='1'><tr><th>Nombre</th><th>Precio</th><th>Imagen</th></tr>";
			foreach ($productos->productos as $producto) {
				echo "<tr><td>" . $producto->nombre . "</td>";
				echo "<td>" . $producto->precio . "</td>";
				echo "<td><img style=\"width:100px\" src=\"". $producto->imagen . "\"></td></tr>";
			}
			echo "</table>";
		}
		?>
	</div>
</body>

</html>