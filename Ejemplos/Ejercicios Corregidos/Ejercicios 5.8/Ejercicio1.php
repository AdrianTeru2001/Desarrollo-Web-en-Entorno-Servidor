<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1 Unidad5</title>
</head>
<body>
<h1>Pulsa un ojo para abrirlo</h1>
<table border=1 cellspacing=0>
    <?php
    if (isset($_REQUEST['seleccion'])) {
        $sel=$_REQUEST['seleccion'];
        $ojos=explode(',',$_REQUEST['ojos']);
        $ojos[$sel]=($ojos[$sel]==0)?1:0;   
    }else {
        $ojos=array_fill(0,100,0);
    }
    $cadena=implode(',',$ojos);
    $n=0; 
    for ($i=0; $i < 10; $i++) { 
        echo "<tr>";
        for ($j=0; $j < 10; $j++) {
            echo "<td><a href='Ejercicio1.php?seleccion=$n&ojos=$cadena'><img width='70' height='70' src='imagen/ojo".(($ojos[$n]==1)?"abierto":"cerrado").".png'></td>";
            $n++;
        }
        echo "</tr>";
    } 
    ?>
</table>
</body>
</html>