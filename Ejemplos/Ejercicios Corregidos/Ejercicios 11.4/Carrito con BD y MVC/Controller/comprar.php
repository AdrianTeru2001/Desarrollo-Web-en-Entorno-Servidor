<?php
session_start();
require_once '../Model/Producto.php';

$fichero = fopen("factura.txt", "w");
fputs($fichero,"FACTURA DE COMPRA ".PHP_EOL.PHP_EOL);
fputs($fichero, "CODIGO \t PRODUCTO \t\t CANTIDAD \t PRECIO \t IMPORTE". PHP_EOL);
$total=0;
foreach ($_SESSION['productos'] as $prod => $cantidad) {
	//el siguiente bloque escribe la linea del producto en el fichero factura
	$producto=Producto::getProductoById($prod);
	$importe=$cantidad*$producto->getPrecio();
	$linea=$producto->getCodigo()."\t ".$producto->getNombre()."\t\t ".$cantidad."\t\t ".$producto->getPrecio()."\t\t ".$importe;
	fputs($fichero,$linea.PHP_EOL);
	$total+=$importe;
	
	$diferencia=$producto->getStock()-$cantidad;
	if ($diferencia>=0) {
		$producto->vender($cantidad);
	}else if ($producto->getStock()>0){
		$producto->vender($producto->getStock());
		echo "<script>alert (\"Unidades insuficientes del producto: ".$producto->getNombre().", seran vendidas solo ".$producto->getStock()." unidades\");</script>";
	}else{
		echo "<script>alert (\"No hay unidades del producto: ".$producto->getNombre().", así que no será vendido\");</script>";
	}  
}

fputs($fichero,"------------------------------------------------------".PHP_EOL);
$linea="Base imponible: ".$total;
fputs($fichero,$linea.PHP_EOL);
$total*=1.21;
$linea="Importe total con IVA: ".$total." €";
fputs($fichero,$linea.PHP_EOL);
fclose($fichero);

session_destroy();
setcookie("total", NULL, -1);
setcookie("cantidad", NULL, -1);
setcookie("productos", NULL, -1);
include '../View/compraFinalizada.php';