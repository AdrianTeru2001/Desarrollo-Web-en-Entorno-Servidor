<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3 Unidad5</title>
    <style>
        table {
            background-image: url("imagen/titan.jpg");
            background-size: 500px 500px;
            width:500px;
            height:500px;
            border-collapse: collapse;
        }
        #oculto {
            background-color:grey;
            border: 1px solid black;
            width: 50px;
            height: 50px;
        }
        #visto {
            background-color:transparent;
            border: 1px solid black;
        }
        #cuadrado {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php
    if (!isset($_REQUEST['intentos'])) {
        $intentos = 10;
        //for ($i=0; $i < 100; $i++) {$panel[]='oculto';}
        $panel=array_fill(0, 100, 'oculto');
    }else {
        $panel=unserialize($_REQUEST['panel']);
        $intentos = $_REQUEST['intentos'];
        if (isset($_REQUEST['num'])) {
            $panel[$_REQUEST['num']]='visto';
            $intentos--;
        }
    }
    if ($intentos<0) {
        echo "<h1>Lo siento has perdido, <a href='Ejercicio3-2.php?perdido=off'>pulsa aqui</a> para ver la solución</h1>";        
    }else{
    ?>
    <h1>Averigua la imagen escondida detrás del mosaico</h1>
    <p>Pulsa en cada cuadrado para ver la imágen que esconde, puedes descubrir hasta 10 cuadrados, escribe su nombre y comprueba si has acertado.</p>
    <h3>Te quedan <?= $intentos ?> consultas</h3>
    <table>
    <?php 
        $n=0;
        for ($i=0; $i < 10; $i++) { 
            echo "<tr>";
            for ($j=0; $j < 10; $j++) {
                ?>
                <td id='<?=$panel[$n]?>'>
                    <!-- //IMPORTANTE usar comillas simples en href para evitar error al enviar un array serializado -->
                    <?php 
                        if ($panel[$n]=='oculto') {
                        ?>
                            <a href='Ejercicio3-1.php?num=<?=$n?>&intentos=<?=$intentos?>&panel=<?=serialize($panel)?>'>
                                <div id="cuadrado"></div>
                            </a>
                        <?php 
                        }
                        ?>
                </td>
                <?php 
                $n++;
            }
            echo "</tr>";
        }
    ?>
    </table>
    <br><br>
    <form action="Ejercicio3-2.php" method="post">
        <input type="text" name="palabra" placeholder="Inténtalo" required>
        <input type="hidden" name="intentos" value="<?=$intentos?>">
        <input type="hidden" name="panel" value='<?=serialize($panel)?>'>
        <input type="submit" value="comprobar">
    </form>
    <?php 
    }
    ?>
</body>
</html>