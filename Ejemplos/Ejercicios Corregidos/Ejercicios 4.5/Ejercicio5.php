<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1 tema4</title>
</head>
<body>
<h1>Pulsa un ojo para abrirlo</h1>
<table border=1 cellspacing=0>
    <?php
    if (isset($_REQUEST['seleccion'])) {
        $sel=$_REQUEST['seleccion'];
    }else {
        $sel= 0;
    }
    $n=1; 
    for ($i=1; $i <= 10; $i++) { 
        echo "<tr>";
        for ($j=1; $j <= 10; $j++) {
            if ($n==$sel) {
                echo "<td><a href='Ejercicio2.php?seleccion=$n'><img width='70' height='70' src='imagen/ojoabierto.png'></td>";
            }else {
                echo "<td><a href='Ejercicio2.php?seleccion=$n'><img width='70' height='70'  src='imagen/ojocerrado.png'></td>";
            }
            $n++;
        }
        echo "</tr>";
    } 
    ?>
</table>
</body>
</html>