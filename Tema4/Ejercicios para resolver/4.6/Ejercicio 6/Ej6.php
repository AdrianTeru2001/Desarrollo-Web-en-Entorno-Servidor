<!-- EJERCICIO 6
Realiza el ejercicio 1 correspondiente al juego de adivinar una imagen, 
pero usando estructuras repetitivas para simplificar el código. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinar la Imagen - Ejercicio 6</title>
</head>

<body>
    <h1>Adivina la imagen escondida detras del mosaico</h1>
    <p>Pulsa en cada cuadrado para ver la imagen que esconde, y cuando tengas 
    claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
    <table>
        <?php //Creamos una tabla mostrando los cuadros ocultos y al clickar en uno de ellos nos lleva a la pagina de comprobar mandandole la variable $num
            $cont = 1;
            for ($i=0; $i < 3; $i++) { 
                echo "<tr>";
                for ($j=0; $j < 3; $j++) { 
                    echo "<td><a href='Ej6_Comprobar.php?num=",$cont,"'><img src='../imagenes/oculto.jpg'></a></td>";
                    $cont++;
                }
                echo "</tr>";
            }
        ?>
    </table>
    <br> <!-- Utilizamos un form para poder meter la solucion y comprobarla en la otra pagina -->
    <form action="Ej6_Comprobar.php" method="get">
        <input type="submit" value="Comprobar">
        <input type="text" name="nombre">
    </form>
</body>

</html>