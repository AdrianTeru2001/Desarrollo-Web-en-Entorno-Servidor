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
            height: 50px;
            border: 1px solid blue;
            text-align: center;
            font-size: 18px;
            font-weight: 900;
        }
    </style>
    <title>Bingo</title>
</head>

<body>

    <?php 
        $cont = 0;
        for ($i=1; $i <= 49; $i++) { 
            if (isset($_GET[$i])) {
                $cont++;
            }
        }
        if ($cont!=6) {
            header("Refresh:0; url=bingo.php?error=1");
        }
    ?>

    <h1>Resultado de tu apuesta...</h1>  
    <table>
        <tr>
            <td colspan="6">Combinación Ganadora</td>
        </tr>
        <tr>
            <td><?php echo $n1 = rand(1,49) ?></td>
            <td><?php echo $n2 = rand(1,49) ?></td>
            <td><?php echo $n3 = rand(1,49) ?></td>
            <td><?php echo $n4 = rand(1,49) ?></td>
            <td><?php echo $n5 = rand(1,49) ?></td>
            <td><?php echo $n6 = rand(1,49) ?></td>
        </tr>
        <tr>
            <td colspan="6">Serie -> <?php echo $serieR = rand(1,999) ?></td>
        </tr>
    </table>

    <?php 
        $numero = 0;
        $aciertos = 0;
        $dinero = 0;
        echo "<h3>Valores acertados: ";
        for ($i=1; $i <= 49; $i++) { 
            if (isset($_GET[$i])) {
                $numero = $_GET[$i];
                if ($numero==$n1) {
                    echo $numero,", ";
                    $aciertos++;
                } else if ($numero==$n2) {
                    echo $numero,", ";
                    $aciertos++;
                } else if ($numero==$n3) {
                    echo $numero,", ";
                    $aciertos++;
                } else if ($numero==$n4) {
                    echo $numero,", ";
                    $aciertos++;
                } else if ($numero==$n5) {
                    echo $numero,", ";
                    $aciertos++;
                } else if ($numero==$n6) {
                    echo $numero,", ";
                    $aciertos++;
                }
            }
        }
        echo "</h3><h3>Has tenido un total de ",$aciertos," aciertos</h3>";
        $nSerie = $_GET["serie"];
        if ($nSerie==$serieR) {
            echo "<h3>Has acertado el número de serie, que pelotazo!!!!</h3>";
            $dinero += 500;
        } else {
            echo "<h3>No has podido acertar el número de serie</h3>";
        }
        if ($aciertos==4) {
            $dinero += 5;
        } else if ($aciertos==5) {
            $dinero += 30;
        } else if ($aciertos==6) {
            $dinero += 100;
        }
        echo "<h3>Ha ganado la cantidad de ",$dinero," euros</h3>";
    ?>

</body>

</html>