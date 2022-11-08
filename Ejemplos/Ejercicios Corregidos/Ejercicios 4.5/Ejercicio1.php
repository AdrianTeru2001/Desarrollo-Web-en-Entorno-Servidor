<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    if (isset($_REQUEST['num'])) {
        echo "<meta http-equiv='Refresh' content='2;url=Ejercicio1.html'>";
    }
    ?>
    <title>Document</title>
</head>
<body>
    <?php 
    if (isset($_REQUEST['palabra']) ) {
        if ($_REQUEST['palabra']=="gollum") {
    ?>
    <h1>ENHORABUENA has acertado, la imagen oculta era gollum</h1>
    <img src="imagen/gollum.jpg" alt="imagen de Gollum">
    <?php 
        }else {
    ?>
    <h1>Lo siento no has acertado, sigue intentándolo</h1>
    <a href="Ejercicio1.html"><h3>VOLVER</h3></a>
    <?php 
        }
    }else {
    $num=$_REQUEST['num'];
    ?>
    <h1>Averigua la imagen escondida detrás del mosaico</h1>
    <p>Pulsa en cada cuadrado para ver la imágen que esconde, y cuando tengas claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
    <table border=1 cellspacing=0 cellpadding=0 bordercolor="red">
    <tr><td><img src="<?php echo ($num==1)?"imagen/1.jpg":"imagen/oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==2)?"imagen/2.jpg":"imagen/oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==3)?"imagen/3.jpg":"imagen/oculto.jpg" ?>"></td></tr>
    <tr><td><img src="<?php echo ($num==4)?"imagen/4.jpg":"imagen/oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==5)?"imagen/5.jpg":"imagen/oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==6)?"imagen/6.jpg":"imagen/oculto.jpg" ?>"></td></tr>
    <tr><td><img src="<?php echo ($num==7)?"imagen/7.jpg":"imagen/oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==8)?"imagen/8.jpg":"imagen/oculto.jpg" ?>"></td>
        <td><img src="<?php echo ($num==9)?"imagen/9.jpg":"imagen/oculto.jpg" ?>"></td></tr>
    </table>
    <?php 
    }
    ?>
</body>
</html>