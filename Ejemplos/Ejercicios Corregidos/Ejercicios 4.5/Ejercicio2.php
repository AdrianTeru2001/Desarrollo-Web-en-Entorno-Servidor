<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Resultado de tu apuesta...</h1>
    <?php
        $n1=rand(1,49);$n2=rand(1,49);$n3=rand(1,49);$n4=rand(1,49);$n5=rand(1,49);$n6=rand(1,49);
        $serie=rand(1,999);
        echo "<table border=1 cellspacing=0 cellpadding=0 bordercolor='green'>"; 
        echo "<tr><th colspan='7'><h3>Combinación ganadora</h3></th></td>";
        echo "<tr><td><h1>$n1</h1></td><td><h1>$n2</h1></td><td><h1>$n3</h1></td><td><h1>$n4</h1></td><td><h1>$n5</h1></td><td><h1>$n6</h1></td><td><h1>$serie</h1></td></tr>";
        echo "</table><br><br>";
        $numerosAcertados="";
        $aciertos=0;
        if (isset($_REQUEST[$n1])) {
            $aciertos++;
            $numerosAcertados.=$n1.", ";
        }
        if (isset($_REQUEST[$n2])) {
            $aciertos++;
            $numerosAcertados.=$n2.", ";
        }
        if (isset($_REQUEST[$n3])) {
            $aciertos++;
            $numerosAcertados.=$n3.", ";
        }
        if (isset($_REQUEST[$n4])) {
            $aciertos++;
            $numerosAcertados.=$n4.", ";
        }
        if (isset($_REQUEST[$n5])) {
            $aciertos++;
            $numerosAcertados.=$n5.", ";
        }
        if (isset($_REQUEST[$n6])) {
            $aciertos++;
            $numerosAcertados.=$n6.", ";
        }
        echo "<h3>Números acertados: ".$numerosAcertados."</h3>";
        echo "<h3>Has tenido un total de $aciertos aciertos</h3>";
        $premio=0;
        switch ($aciertos) {
            case '4':
                $premio+=10;
                break;
            case '5':
                $premio+=30;
                break;
            case '6':
                $premio+=100;
                break;
            
            default:
                echo "<h3>Parece que no has tenido mucha suerte</h3>";
                break;
        }
        if ($serie==$_REQUEST['serie']) {
            $premio+=500;
        }
        echo "<h3>Has ganado la cantidad de $premio euros</h3>";
 
    ?>

</body>
</html>