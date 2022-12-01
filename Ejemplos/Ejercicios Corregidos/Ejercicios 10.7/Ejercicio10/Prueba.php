<?php 
	include_once 'Bombilla.php';

	if (!isset($_SESSION['bombillas'])) {
		$_SESSION['bombillas']=[];
	}
	if (isset($_POST['nombre'])) {
		$_SESSION['bombillas'][]=new Bombilla($_POST['estaEncendida'], $_POST['potencia'], $_POST['nombre']);
	}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<style type="text/css">
			form {
				display: inline-block;
				padding: 0;
				margin: 0;
			}
			input {
				margin: 0;
			}
			table {
				border-spacing: 0;
			}
			td {
				text-align: center;
			}
		</style>
	</head>
	<body>
		<h1>Prueba objeto Bombilla</h1>
		<form action="" method="post">
			Crear nueva bombilla:
			<input type="text" name="nombre" placeholder="Lugar">
			<input type="number" step="0.1" name="potencia" placeholder="Potencia">
			<select name="estaEncendida">
				<option value="0">apagada</option>
				<option value="1">encendida</option>
			</select>
			<input type="submit" value="Crear">
		</form>
		<br>
		<h2>General: OFF
			<?php if (Bombilla::getGeneral()){ ?>
				<a href="CambiaEstadoBombillas.php?general=desactivar"><img src="Images/ON.png"></a>
			<?php }else{ ?>
				<a href="CambiaEstadoBombillas.php?general=activar"><img src="Images/OFF.png"></a>
			<?php } ?>
		ON</h2>
<?php 
		include 'PintaBombillas.php';
 ?>
		<h2>Gasto general: <?php echo Bombilla::getPotenciaGeneral() ?>W</h2>
	</body>
</html>