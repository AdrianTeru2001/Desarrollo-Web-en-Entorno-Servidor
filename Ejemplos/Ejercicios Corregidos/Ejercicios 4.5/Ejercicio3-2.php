<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    $intentos=++$_REQUEST['intentos'];
    if (isset($_REQUEST['num'])) {
        echo "<meta http-equiv='Refresh' content='2;url=Ejercicio3-1.php?intentos=".$intentos."'>";
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
    <img src="gollum.jpg" alt="imagen de Gollum">
    <?php 
        }else {
    ?>
    <h1>Lo siento no has acertado, llevas <?=$intentos?> intentos, sigue intentándolo</h1>
    <a href="Ejercicio3-1.php?intentos=<?=$intentos?>"><h3>VOLVER</h3></a>
    <?php 
        }
    }else {
    $num=$_REQUEST['num'];
    ?>
    <h1>Averigua la imagen escondida detrás del mosaico</h1>
    <p>Pulsa en cada cuadrado para ver la imágen que esconde, y cuando tengas claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
    <table border=1 cellspacing=0 cellpadding=0 bordercolor="red">
    <tr><td><img src="<?php echo ($num==1)?"1.jpg":"oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==2)?"2.jpg":"oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==3)?"3.jpg":"oculto.jpg" ?>"></td></tr>
    <tr><td><img src="<?php echo ($num==4)?"4.jpg":"oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==5)?"5.jpg":"oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==6)?"6.jpg":"oculto.jpg" ?>"></td></tr>
    <tr><td><img src="<?php echo ($num==7)?"7.jpg":"oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==8)?"8.jpg":"oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==9)?"9.jpg":"oculto.jpg" ?>"></td></tr>
    </table>
    <?php 
    }
    ?>
</body>
</html>