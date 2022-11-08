<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $intentos = (isset($_REQUEST['intentos']))?$_REQUEST['intentos']:0;
    ?>
    <h1>Averigua la imagen escondida detrás del mosaico</h1>
    <p>Pulsa en cada cuadrado para ver la imágen que esconde, y cuando tengas claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
    <table border=1 cellspacing=0 cellpadding=0 bordercolor="red">
    <?php 
        $n=0;
        for ($i=0; $i < 3; $i++) { 
            echo "<tr>";
            for ($j=0; $j < 3; $j++) { 
                $n++;
                echo "<td><a href='Ejercicio6-2.php?num=$n&intentos=$intentos'><img src='imagen/oculto.jpg'></a></td>";
            }
            echo "</tr>";
        }
    ?>
    </table>
    <br><br>
    <?php echo "<h3>Numero de intentos: ".$intentos."</h3>"; ?> 
    <form action="Ejercicio6-2.php" method="post">
        <input type="text" name="palabra" placeholder="Inténtalo" required>
        <input type="hidden" name="intentos" value="<?=$intentos?>">
        <input type="submit" value="comprobar">
    </form>
</body>
</html>