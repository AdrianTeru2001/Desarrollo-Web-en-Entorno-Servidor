<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Comida rápida "El Gordito"</h1>
<?php 
if (isset($_REQUEST['fin'])) {
	echo "<hr><hr><hr><h1>Resumen del pedido</h1>";
	$pedido=unserialize(base64_decode($_REQUEST['pedido']));
	foreach ($pedido as $comida) {
		echo $comida[0]." con: ";
		for ($i=1; $i < count($comida) ; $i++) {
			echo $comida[$i].", ";
		}
		echo "<br>";
	}
	echo "<hr><hr><hr>";
}else{ 
if (!isset($_REQUEST['comida'])){
	$pedido=[];
}else{
	$pedido=unserialize(base64_decode($_REQUEST['pedido']));
	$pedido[]=$_REQUEST['comida'];
}
?>
<h3>Pizza</h3>
<form action="Ejercicio2.php" method="post">
	<input type="hidden" name="pedido" value="<?=base64_encode(serialize($pedido))?>">
	<input type="hidden" name="comida[]" value="pizza">
	<input type="checkbox" name="comida[]" value="Jamon">Jamon<br>
	<input type="checkbox" name="comida[]" value="Bacon">Bacon<br>
	<input type="checkbox" name="comida[]" value="Peperoni">Peperoni<br>
	<input type="submit" value="Añadir al pedido">
</form>
<hr>
<h3>Hamburguesa</h3>
<form action="Ejercicio2.php" method="post">
	<input type="hidden" name="pedido" value="<?=base64_encode(serialize($pedido))?>">
	<input type="hidden" name="comida[]" value="hamburguesa">
	<input type="checkbox" name="comida[]" value="Lechuga">Lechuga<br>
	<input type="checkbox" name="comida[]" value="Tomate">Tomate<br>
	<input type="checkbox" name="comida[]" value="Queso">Queso<br>
	<input type="submit" value="Añadir al pedido">
</form>
<hr>
<h3>Perrito Caliente</h3>
<form action="Ejercicio2.php" method="post">
	<input type="hidden" name="pedido" value="<?=base64_encode(serialize($pedido))?>">
	<input type="hidden" name="comida[]" value="perrito">
	<input type="checkbox" name="comida[]" value="Lechuga">Lechuga<br>
	<input type="checkbox" name="comida[]" value="Cebolla">Cebolla<br>
	<input type="checkbox" name="comida[]" value="Patata">Patata<br>
	<input type="submit" value="Añadir al pedido">
</form>
<hr>
<form action="Ejercicio2.php" method="post">
	<input type="hidden" name="pedido" value="<?=base64_encode(serialize($pedido))?>">
	<input type="submit" name="fin" value="FINALIZAR PEDIDO">
</form>
<?php 
}
?>
</body>
</html>