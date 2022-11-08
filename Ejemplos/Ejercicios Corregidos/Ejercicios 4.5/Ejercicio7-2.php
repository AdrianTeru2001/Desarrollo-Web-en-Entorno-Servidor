<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{font-weight:bold;}
    </style>
</head>
<body>
<h1>Juega a la lotería primitiva.</h1>
<table border=1 cellspacing=0 cellpadding=0 bordercolor='green'>
<tr><th colspan='6'>Combinación ganadora</th></td>
    <?php
        $tuserie=$_REQUEST['serie'];
        $n1=rand(1,49);$n2=rand(1,49);$n3=rand(1,49);$n4=rand(1,49);$n5=rand(1,49);$n6=rand(1,49);
        $serie=rand(1,999);
        echo "<tr><td>$n1</td><td>$n2</td><td>$n3</td><td>$n4</td><td>$n5</td><td>$n6</td></tr>";
        echo "</table><br><br>";
        echo "<h3>RESULTADO DE TU APUESTA</h3>";
        
        echo "<table border=1 cellspacing=0 cellpadding=0 bordercolor='green'>"; 
        $cont=0;
        $aciertos=0;
        $n=1;
        for ($i=0; $i<7 ; $i++) { 
            echo "<tr>";
            for ($j=0; $j<7 ; $j++) { 
                if (isset($_REQUEST[$n])) {
                    $cont++;
                    $estilo="";
                    if ($n1==$n || $n2==$n || $n3==$n || $n4==$n || $n5==$n || $n6==$n) {
                        $aciertos++;
                        $estilo=" style='color:#00ff00;'";
                    }
                    echo "<td><span $estilo>$n</span></td>";
                }else {
                    if ($n1==$n || $n2==$n || $n3==$n || $n4==$n || $n5==$n || $n6==$n) {
                        $estilo=" style='color:#ff0000;'";
                    }else {
                        $estilo=" style='color:#aaaaaa;'";
                    } 
                    echo "<td><span $estilo>$n</span></td>";
                }
                $n++;
            }
            echo "</tr>";
        }
    ?>
    <tr><td colspan="4">Tu serie: <?= $tuserie ?></td><td colspan="3">Ganadora: <?= $serie ?></td></tr>
    </table>
    <?php 
    if ($cont>6) {
    ?>
    <h3>Has hecho trampas, solo se pueden seleccionar 6 números</h3> 
    <h3>Solo has ganado la verguenza de que te hayan pillado</h3>
    <a href="Ejercicio7-1.php"><h4>VOLVER</h4></a>
    <?php 
    } else {
        echo "<h3>Has tenido un total de $aciertos aciertos</h3>";
        $gana=0;
        switch ($aciertos) {
            case '4':
                $gana=10;
                break;
            case '5':
                $gana=30;
                break;
            case '4':
                $gana=100;
                break;
        }
        $gana+=($serie==$tuserie)?500:0;
        if ($gana==0) {
            echo "Lo siento no has ganado ni un solo céntimo";
        }else {
            echo "Tu ganancia asiende a un total de $gana euros";
        }
    }  
    ?>

</body>
</html>