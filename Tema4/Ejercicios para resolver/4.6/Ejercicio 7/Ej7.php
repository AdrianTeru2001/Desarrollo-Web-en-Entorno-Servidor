<!-- EJERCICIO 7
Realiza el ejercicio 2 correspondiente al juego de la primitiva, pero usando estructuras repetitivas para simplificar el código. 
Pero en esta ocasión lo vamos a realizar de una forma más vistosa gracias a que podemos utilizar las estructuras repetitivas. 
Para mostrar el resultado de la apuesta vamos a mostrar una tabla con todos los números de la primitiva, y los números elegidos
por el usuario que hayan sido aciertos serán de color verde, los elegidos por el usuario que no han sido aciertos 
serán de color negro, los números de la combinación aleatoria que no han sido elegidos por el usuario serán de color 
rojo y por último el resto de números serán de color gris. También contaremos los números seleccionados por el 
usuario y si son más de 6, en vez de mostrar el premio obtenido se mostrará un mensaje indicando que ha hecho trampas. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 300px;
        }
        tr, td {
            height: 30px;
            border: 1px solid blue;
        }
    </style>
    <title>Bingo - Ejercicio 7</title>
</head>

<body>
    <h1>Bingo</h1>
    <h3>Elige seis números y el número de serie (1-999)</h3>
    <!-- Aqui captamos el error de meter menos de 6 numeros -->
    <?php 
        if (isset($_GET["error"])) {
            $fallo = $_GET["error"];
            if ($fallo=1) {
                echo "<h3>Tienes que elegir 6 números, no puedes elegir menos</h3>";
            }
        }
    ?>
    <!-- Formulario para pasar los datos a la otra pagina -->
    <form action="Ej7_Comprobar.php" method="get">
        <table>
        <?php 
            $cont = 0;
            for ($i=1; $i <= 49; $i++) {
                if ($cont==5) {
                    echo "<tr>";
                    $cont = 0;
                }
                echo "<td><input type='checkbox' name='$i' value='$i'><strong>",$i,"</strong></td>";
                if ($cont==4) {
                    echo "</tr>";
                }
                $cont++;
            }
        ?>
        </table>
        <br>
        <strong>Número de serie -></strong> <input type="text" name="serie"><br><br>
        <input type="submit" value="Jugar al Bingo">
    </form>
</body>

</html>