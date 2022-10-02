<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 300px;
        }
        tr, td {
            text-align: center;
            height: 30px;
            border: 1px solid blue;
        }
    </style>
    <title>Bingo - Ejercicio 7</title>
</head>

<body>

    <?php 
        //controlar si se elijen menos de 6 números
        $contNum = 0;
        for ($i=1; $i <= 49; $i++) { 
            if (isset($_GET[$i])) {
                $contNum++;
            }
        }
        if ($contNum<6) {
            header("Refresh:0; url=Ej7.php?error=1");
        }

        //Generar numeros y serie aleatorios
        $n1 = rand(1,49);
        $n2 = rand(1,49);
        $n3 = rand(1,49);
        $n4 = rand(1,49);
        $n5 = rand(1,49);
        $n6 = rand(1,49);
        $serieR = rand(1,999);
    ?>

    <!-- Tabla resultado -->
    <h1>Resultado de tu apuesta...</h1>  
    <table>
        <?php 
            $aciertos = 0;
            $cont = 0;
            $numero = 0;
            echo "<tr>";
            for ($i=1; $i <= 49; $i++) {
                if ($cont==5) {
                    echo "<tr>";
                    $cont = 0;
                }
                //Vamos controlando que color tiene que tener cada numero segun las condiciones
                if (isset($_GET[$i])) {
                    $numero = $_GET[$i];
                    if ($numero==$n1 || $numero==$n2 || $numero==$n3 || $numero==$n4 || $numero==$n5 || $numero==$n6) {
                        echo "<td style='color: white; background-color: green;'>",$numero,"</td>";
                        $aciertos++;
                    } else {
                        echo "<td style='color: white; background-color: black;'>",$i,"</td>";
                    }
                } else {
                    if ($i==$n1 || $i==$n2 || $i==$n3 || $i==$n4 || $i==$n5 || $i==$n6) {
                        echo "<td style='color: white; background-color: red;'>",$i,"</td>";
                    } else {
                        echo "<td style='color: white; background-color: grey;'>",$i,"</td>";
                    }
                }
                if ($cont==4) {
                    echo "</tr>";
                }
                $cont++;
            }
        ?>
    </table>

    <?php 
        $dinero = 0;
        //Números de aciertos
        echo "</h3><h3>Has tenido un total de ",$aciertos," aciertos</h3>";
        if ($aciertos==4) {
            $dinero += 5;
        } else if ($aciertos==5) {
            $dinero += 30;
        } else if ($aciertos==6) {
            $dinero += 100;
        }
        //Acierto o no del número de serie
        $nSerie = $_GET["serie"];
        if ($nSerie==$serieR) {
            echo "<h3>Has acertado el número de serie, que pelotazo!!!!</h3>";
            $dinero += 500;
        } else {
            echo "<h3>No has podido acertar el número de serie</h3>";
        }
        //Que hacer si eliges 6 numeros o si eliges mas numeros
        if ($contNum==6) {
            echo "<h3>Ha ganado la cantidad de ",$dinero," euros</h3>";
        } else {
            echo "<h3>No tienes premio porque has elegido mas de 6 números y eso es trampa... TRAMPOSOOOOO!!!!!</h3>";
        }
    ?>

</body>

</html>