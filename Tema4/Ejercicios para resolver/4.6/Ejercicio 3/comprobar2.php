<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinar la Imagen 2</title>
</head>

<body>
    <!-- La variable contador la vamos pasando de pagina en pagina mediante el href al cambiar de pagina -->
    <?php //Con esto, si la variable contador contiene algo, la actualizamos con el ultimo valor y si no pues la incializamos a 0
        if (!isset($_REQUEST['contador'])) {
            $contador = 0;
        } else {
            $contador = $_REQUEST['contador'];
            $contador++;
        }
        //Comprobamos si la variable $nombre tiene algo de contenido
        if (isset($_GET["nombre"])) {
            $nombre = $_GET["nombre"];
            if ($nombre=="gollum") { ?> <!-- Si tiene contenido y ha acertado, se dice que ha acertado y se le muestra la foto entera -->
                <h1><?php echo "Enhorabuena Has Ganado, era ",$nombre,"."; ?></h1><br>
                <img src="../imagenes/gollum.jpg">
                <h2><?php echo "Te ha costado adivinarlo ",$contador," intentos."?></h2>
                <?php 
            } else { ?> <!-- Si tiene contenido pero no ha acertado, se le dice que ha fallado y se le da la opcion de jugar otra vez -->
                <h1><?php echo "Has fallado, no era ",$nombre,"."; ?></h1>
                <h3><?php echo "Llevas ",$contador," intentos."?></h3>
                <h3><a href="principal2.php?contador=<?php echo $contador ?>">Volver para intentarlo de nuevo</a></h3>
                <?php
            }
        } else { //Si $nombre no tiene contenido significa que llegamos a esta pagina por pulsar un cuadro de la imagen
            $num = $_REQUEST["num"]; //Mostramos el mismo contenido de la pagina principal pero enseñando que imagen se encuentra en el cuadro pulsado.
            header("Refresh:2; url=principal2.php?contador=$contador"); ?>
            <h1>Adivina la imagen escondida detras del mosaico</h1>
            <p>Pulsa en cada cuadrado para ver la imagen que esconde, y cuando tengas 
            claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
            <table> <!-- Utilizamos una condicion separada por '?' y ':' -->
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
            <?php //Aqui mostramos cuantos intentos lleva
                echo "<p>Llevas ",$contador," intentos</p>";
            ?>
        <?php } 
    ?>

</body>

</html>