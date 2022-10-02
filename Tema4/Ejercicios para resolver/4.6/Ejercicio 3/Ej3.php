<!-- Ejercicio 3
Partiendo del Ejercicio1, amplíalo con la siguiente funcionalidad. En la pantalla principal 
se mostrará el número de intentos que lleva el usuario, que en la primera carga será de 0 intentos y
conforme se vayan pulsando los cuadrados para descubrir la imagen que esconden se irá aumentando en 1.
Cuando el usuario intente adivinar la palabra de la imagen, si acierta se mostrará el número de intentos en que
lo ha conseguido, y si ha fallado mostrará el número de intentos que lleva hasta ese momento,
y al volver a la pantalla principal seguirá aumentando el número de intentos que llevaba.
Nota: para controlar el número de intentos es necesario pasarlo como parámetro cada vez que se 
navega de una página a otra, si no se pierde su valor. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Adivinar la Imagen 2 - Ejercicio 3</title>
</head>

<body>
    <!-- La variable contador la vamos pasando de pagina en pagina mediante el href al cambiar de pagina -->
    <h1>Adivina la imagen escondida detras del mosaico</h1>
    <p>Pulsa en cada cuadrado para ver la imagen que esconde, y cuando tengas 
    claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
    <table>
    <?php //Con esto, si la variable contador contiene algo, la actualizamos con el ultimo valor y si no pues la incializamos a 0
        if (!isset($_REQUEST['contador'])) {
            $contador = 0;
        } else {
            $contador = $_GET['contador'];
        }
    ?>
        <tr> <!-- Creamos una tabla mostrando los cuadros ocultos y al clickar en uno de ellos nos lleva a la pagina de comprobar mandandole la variable $num -->
            <td><a href="Ej3_Comprobar.php?num=1&contador=<?php echo $contador ?>"><img src="../imagenes/oculto.jpg"></a></td>
            <td><a href="Ej3_Comprobar.php?num=2&contador=<?php echo $contador ?>"><img src="../imagenes/oculto.jpg"></a></td>
            <td><a href="Ej3_Comprobar.php?num=3&contador=<?php echo $contador ?>"><img src="../imagenes/oculto.jpg"></a></td>
        </tr>
        <tr>
            <td><a href="Ej3_Comprobar.php?num=4&contador=<?php echo $contador ?>"><img src="../imagenes/oculto.jpg"></a></td>
            <td><a href="Ej3_Comprobar.php?num=5&contador=<?php echo $contador ?>"><img src="../imagenes/oculto.jpg"></a></td>
            <td><a href="Ej3_Comprobar.php?num=6&contador=<?php echo $contador ?>"><img src="../imagenes/oculto.jpg"></a></td>
        </tr>
        <tr>
            <td><a href="Ej3_Comprobar.php?num=7&contador=<?php echo $contador ?>"><img src="../imagenes/oculto.jpg"></a></td>
            <td><a href="Ej3_Comprobar.php?num=8&contador=<?php echo $contador ?>"><img src="../imagenes/oculto.jpg"></a></td>
            <td><a href="Ej3_Comprobar.php?num=9&contador=<?php echo $contador ?>"><img src="../imagenes/oculto.jpg"></a></td>
        </tr>
    </table>
    <?php //Aqui mostramos cuantos intentos lleva
        echo "<p>Llevas ",$contador," intentos</p>";
    ?>
    <br> <!-- Utilizamos un form para poder meter la solucion y comprobarla en la otra pagina -->
    <form action="Ej3_Comprobar.php" method="get">
        <input type="hidden" name="contador" value="<?php echo $contador ?>">
        <input type="submit" value="Comprobar">
        <input type="text" name="nombre">
    </form>
</body>

</html>