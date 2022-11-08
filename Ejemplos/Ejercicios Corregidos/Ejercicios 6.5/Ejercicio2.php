<html>
<head>
	<title></title>
</head>
<body>
<?php 
include "librerias/controlAcceso.php";
if (isset($_POST['perfil'])) {
	$perfil= $_POST['perfil'];
	$fila=$_POST['fila'];
	$columna=$_POST['columna'];
	$valor=$_POST['valor'];
	$tarjeta =dameTarjeta($perfil);
	if (claveCorrecta($tarjeta, $fila, $columna, $valor)) {
		echo "Acceso Permitido<br>";
		echo "<form action='https://iesruizgijon.com'><input type='submit' value='CONTINUAR'></form>";
	}else{
		echo "Clave incorrecta. Acceso Restringido<br>";
		echo "<form action='Ejercicio2.php'><input type='submit' value='VOLVER'></form>";
	}
}else{
	$fila=rand(1,5);
	$columna=rand(0,4);
	$letras=['A','B','C','D','E'];
	$tarjeta =dameTarjeta('admin');
	echo "<table border='1'><tr><td>Administrador<br>";
	imprime($tarjeta);
	$tarjeta =dameTarjeta('usuario');
	echo "</td><td>Usuario estándar<br>";
	imprime($tarjeta);
	echo "</td></tr></table>";
	?>
	<form action="Ejercicio2.php" method="post">
	Perfil:<br> 
	<select name="perfil">
    <option value="admin">Administrador</option>
    <option value="usuario">Usuario</option>
	</select>
	<input type="hidden" name="fila" value="<?=$fila?>">
	<input type="hidden" name="columna" value="<?=$columna?>">
	<br><h3>INTRODUCE LA SIGUIENTE COORDENADA<br>
    COORDENADA Fila: <?=$fila?> Columna:<?=$letras[$columna]?>
    <input type="text" name="valor"></h3><br>
    <input type="submit" value="COMPROBAR">
  </form>
<?php   
}
?>
</body>
</html>