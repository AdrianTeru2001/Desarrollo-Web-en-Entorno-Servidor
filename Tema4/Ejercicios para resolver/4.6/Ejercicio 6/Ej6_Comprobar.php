<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinar la Imagen - Ejercicio 6</title>
</head>

<body>

    <?php 
        //Comprobamos si la variable $nombre tiene algo de contenido
        if (isset($_GET["nombre"])) {
            $nombre = $_GET["nombre"];
            if (strtolower($nombre)=="gollum") { ?> <!-- Si tiene contenido y ha acertado, se dice que ha acertado y se le muestra la foto entera -->
                <h1><?php echo "Enhorabuena Has ganado, era ",$nombre,"."; ?></h1><br>
                <img src="../imagenes/gollum.jpg">
                <?php 
            } else { ?> <!-- Si tiene contenido pero no ha acertado, se le dice que ha fallado y se le da la opcion de jugar otra vez -->
                <h1><?php echo "Has fallado, no era ",$nombre,"."; ?></h1><br>
                <h3><a href="Ej6.php">Volver para intentarlo de nuevo</a></h3>
                <?php
            }
        } else { //Si $nombre no tiene contenido significa que llegamos a esta pagina por pulsar un cuadro de la imagen
            $num = $_REQUEST["num"]; //Mostramos el mismo contenido de la pagina principal pero enseñando que imagen se encuentra en el cuadro pulsado.
            header("Refresh:2; url=Ej6.php"); ?>
            <h1>Adivina la imagen escondida detras del mosaico</h1>
            <p>Pulsa en cada cuadrado para ver la imagen que esconde, y cuando tengas 
            claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
            
            <table>
                <?php //Utilizamos una condicion separada por '?' y ':'
                    $cont = 1;
                    $img = "";
                    for ($i=0; $i < 3; $i++) { 
                        echo "<tr>";
                        for ($j=0; $j < 3; $j++) { 
                            $img = ($num==$cont) ? "../imagenes/$cont.jpg" : "../imagenes/oculto.jpg";
                            echo "<td><img src='$img'></td>";
                            $cont++;
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
            <!-- <table> 
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
            </table> -->
        <?php } 
    ?>

</body>

</html>