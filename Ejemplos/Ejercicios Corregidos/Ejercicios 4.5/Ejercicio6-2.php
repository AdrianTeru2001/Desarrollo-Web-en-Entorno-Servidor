<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    $intentos=++$_REQUEST['intentos'];
    if (isset($_REQUEST['num'])) {
        echo "<meta http-equiv='Refresh' content='2;url=Ejercicio6-1.php?intentos=".$intentos."'>";
    }
    ?>
    <title>Document</title>
</head>
<body>
    <?php 
    if (isset($_REQUEST['palabra']) ) {
        $intentos--;
        if ($_REQUEST['palabra']=="gollum") {
    ?>
    <h1>ENHORABUENA has acertado en <?= $intentos ?> intentos, la imagen oculta era gollum</h1>
    <img src="imagen/gollum.jpg" alt="imagen de Gollum">
    <?php 
        }else {
    ?>
    <h1>Lo siento no has acertado, llevas <?=$intentos?> intentos, sigue intentándolo</h1>
    <a href="Ejercicio6-1.php?intentos=<?=$intentos?>"><h3>VOLVER</h3></a>
    <?php 
        }
    }else {
    $num=$_REQUEST['num'];
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
                $imagen=($num==$n)?"imagen/".$n.".jpg":"imagen/oculto.jpg";
                echo "<td><img src='$imagen'></td>";
            }
            echo "</tr>";
        }
    ?>  
    </table>
    <?php 
    }
    ?>
</body>
</html>