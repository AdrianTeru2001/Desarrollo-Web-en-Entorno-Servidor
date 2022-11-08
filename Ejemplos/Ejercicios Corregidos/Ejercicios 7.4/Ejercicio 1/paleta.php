<?php session_start(); 
if (!isset($_SESSION['colores'])) {
	header("location:index.php");
}
if (isset($_REQUEST['fondo'])) {
	$fondo=$_REQUEST['fondo'];
}else {
	$fondo="";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color:<?=$fondo?>;">
	<table><tr>
<?php
	$cont=0; 
	foreach ($_SESSION['colores'] as $color) {
?>
		<td style="background-color: <?=$color?>;width:20px;height:20px">
			<a href='paleta.php?fondo=<?=$color?>'><div style="width:20px;height:20px"></div></a>
		</td>
<?php
		$cont++;
		if ($cont%5==0) {
				echo "</tr><tr>";
			}	
	}
 ?>
 </tr></table>
 <br><form action="index.php" method="post">
  	<input type="submit" name="volver" value="Añadir mas colores">
  </form>
 <br><form action="index.php" method="post">
  	<input type="submit" name="cerrarSesion" value="Crear nueva paleta">
  </form>
</body>
</html>