<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>HORARIO DE CLASE 2ºDAW</h1>
<table border="1"><tr><th>HORA</th><th>LUNES</th><th>MARTES</th><th>MIERCOLES</th><th>JUEVES</th><th>VIERNES</th></tr>
<?php    
    $conexion=conectarBD();
    $horario=recuperarHoras($conexion);
    $dias=["lunes","martes","miercoles","jueves","viernes"]; //este array sirve para recorrer los dias de la semana en orden
    $horas=["primera"=>0,"segunda"=>1,"tercera"=>2,"cuarta"=>3,"quinta"=>4,"sexta"=>5];
    foreach ($horas as $hora=>$numHora) {
        echo "<tr><td>$hora</td>";
        foreach ($dias as $dia) {
?>
<form action="cambiarHora.php" method="post">
    <input type="hidden" name="dia" value="<?=$dia?>">
    <input type="hidden" name="hora" value="<?=$hora?>">
    <td><input style="display: block; width:100px;" type="submit" name="asignatura" value="<?=$horario[$dia][$numHora]?>"></td>
</form>
<?php
        }
        echo "</tr>";
    }

    function recuperarHoras($conexion){
        $consulta=$conexion->query("select * from horario");
        while ($dia = $consulta->fetchObject()) {
            $horario[$dia->dia]=[$dia->primera, $dia->segunda, $dia->tercera, $dia->cuarta, $dia->quinta, $dia->sexta];
        }
        return $horario;
            
    }
    function conectarBD (){
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root", "");
            } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: " . $e->getMessage());
            }
        return $conexion;           
    }
?>
</table>
</body>
</html>