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
$carta=[["Pizza","Jamon","Bacon","Peperoni","Piña","Champiñón","Barbacoa","Atún","Pimiento","Huevo"],
		["Hamburguesa","Queso","Lechuga","Cebolla","Bacon","Pepinillo","Keptchup","Mayonesa"],
		["Perrito","Lechuga","Cebolla","Patata","Mostaza","Keptchup","Mayonesa"],
		["Empanada","Espinaca","Atún","Carne picada","Jamón"],
		["Potage","garbanzos", "chícharos","arroz","lentejas","acelgas"]];
foreach ($carta as $tipoComida) {
?>
<h3><?=$tipoComida[0]?></h3>
<form action="" method="post">
	
	<input type="hidden" name="comida[]" value="<?=$tipoComida[0]?>">
	<?php
	  for ($i=1;$i<count($tipoComida);$i++) {
		echo "<input type='checkbox' name='comida[]' value='$tipoComida[$i]'> $tipoComida[$i] &nbsp";
	  }  
	?>
	<input type="hidden" name="pedido" value="<?=base64_encode(serialize($pedido))?>">
	<br><br><input type="submit" value="Añadir al pedido">
</form>
<hr>
<?php 
}
?>
<br>
<form action="" method="post">
	<input type="hidden" name="pedido" value="<?=base64_encode(serialize($pedido))?>">
	<input type="submit" name="fin" value="FINALIZAR PEDIDO">
</form>
<?php 
}
?>
</body>
</html>