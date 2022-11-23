<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$dia=$_POST['dia'];
$hora=$_POST['hora'];
$asignatura=$_POST['asignatura'];
$conexion=conectarBD();//necesario para recopilar los módulos y hacer el update
if (isset($_POST['grabar'])) {
    $actualiza = "UPDATE horario SET $hora=\"".$_POST['nueva']."\" WHERE dia=\"$dia\"";
    $conexion->exec($actualiza);
    header("location:horario.php");
}
?>
<h3><?=$dia?> a <?=$hora?> hora: <?=$asignatura?></h3>
<form action="" method="post">
    <input type="hidden" name="dia" value="<?=$dia?>">
    <input type="hidden" name="hora" value="<?=$hora?>">
    <select name="nueva">
<?php 
$modulos=recuperarModulos($conexion);
foreach ($modulos as $codigo => $nombre) {
?>
    <option value="<?=$codigo?>"><?=$nombre?></option>
<?php 
}
?>
    </select>
    <input type="submit" name="grabar" value="GRABAR">
</form>
<?php
function conectarBD (){
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root", "");
        } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
        }
    return $conexion;           
}
function recuperarModulos($conexion){
    $consulta=$conexion->query("select * from modulos");
    while ($mod = $consulta->fetchObject()) {
        $modulos[$mod->codigo]=$mod->nombre;
    }
    return $modulos;
        
}
?>
</body>
</html>