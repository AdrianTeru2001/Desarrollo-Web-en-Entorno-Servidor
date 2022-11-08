<?php session_start();
if (isset($_REQUEST['cerrarSesion'])) {
	session_destroy();
	header("refresh:0;");
}
if (!isset($_SESSION['colores'])) {
 		$_SESSION['colores']=[];
}
if (isset($_REQUEST['color'])) {	
 	$color="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
 	$_SESSION['colores'][]=$color;
}else {
	$color="";
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body style="background-color:<?=$color?>;">
  <?php 
	echo "Colores creados: ".count($_SESSION['colores']);
	?>
	<br><br>
  <form action="#" method="post">
  	<input type="submit" name="color" value="AÑADIR COLOR">
  </form>
  <br>
  <form action="paleta.php" method="post">
  	<input type="submit" name="paleta" value="Mostrar paleta creada">
  </form>
 </body>
 </html>