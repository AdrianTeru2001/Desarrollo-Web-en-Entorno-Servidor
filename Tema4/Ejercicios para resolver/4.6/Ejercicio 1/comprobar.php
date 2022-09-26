<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinar la Imagen</title>
</head>

<body>

    <?php 
        /* $num = $_REQUEST["num"]; */
        /* $nombre = $_GET["nombre"]; */
        header("Refresh:2; url=principal.html");
        if (isset($_GET["nombre"])) {
            $nombre = $_GET["nombre"];
            if ($nombre=="gollum") {
                echo "Enhorabuena Has ganadooooooooooooooooooo <br> ooooooooooooooooooooooo";
            } else {
                echo "Has perdidoooooooooooooooooooooooo <br> ooooooooooooooooooo";
            }
        } else { 
            $num = $_REQUEST["num"]; ?>
            <h1>Adivina la imagen escondida detras del mosaico</h1>
            <p>Pulsa en cada cuadrado para ver la imagen que esconde, y cuando tengas 
            claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
            <table>
                <tr>
                    <td><img src="<?php echo ($num==1) ? '../imagenes/1.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
                    <td><img src="<?php echo ($num==2) ? '../imagenes/2.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
                    <td><img src="<?php echo ($num==3) ? '../imagenes/3.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
                </tr>
                <tr>
                    <td><img src="<?php echo ($num==4) ? '../imagenes/4.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
                    <td><img src="<?php echo ($num==5) ? '../imagenes/5.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
                    <td><img src="<?php echo ($num==6) ? '../imagenes/6.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
                </tr>
                <tr>
                    <td><img src="<?php echo ($num==7) ? '../imagenes/7.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
                    <td><img src="<?php echo ($num==8) ? '../imagenes/8.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
                    <td><img src="<?php echo ($num==9) ? '../imagenes/9.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
                </tr>
            </table>
            <br>
            <form action="ejercicio1.php" method="get">
                <input type="submit" value="Comprobar">
                <input type="text" name="nombre">
            </form>
        <?php } 
    ?>

    <!-- <h1>Adivina la imagen escondida detras del mosaico</h1>
    <p>Pulsa en cada cuadrado para ver la imagen que esconde, y cuando tengas 
    claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
    <table>
        <tr>
            <td><img src="<?php echo ($num==1) ? '../imagenes/1.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
            <td><img src="<?php echo ($num==2) ? '../imagenes/2.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
            <td><img src="<?php echo ($num==3) ? '../imagenes/3.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
        </tr>
        <tr>
            <td><img src="<?php echo ($num==4) ? '../imagenes/4.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
            <td><img src="<?php echo ($num==5) ? '../imagenes/5.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
            <td><img src="<?php echo ($num==6) ? '../imagenes/6.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
        </tr>
        <tr>
            <td><img src="<?php echo ($num==7) ? '../imagenes/7.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
            <td><img src="<?php echo ($num==8) ? '../imagenes/8.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
            <td><img src="<?php echo ($num==9) ? '../imagenes/9.jpg' : '../imagenes/oculto.jpg'; ?>"></td>
        </tr>
    </table>
    <br>
    <form action="ejercicio1.php" method="get">
        <input type="submit" value="Comprobar">
        <input type="text" name="nombre">
    </form> -->

</body>

</html>