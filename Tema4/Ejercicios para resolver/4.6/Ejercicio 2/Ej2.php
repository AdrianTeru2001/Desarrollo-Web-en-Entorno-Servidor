<!-- Ejercicio 2
Mejora el ejercicio de la lotería primitiva del tema anterior. Ahora los números se seleccionan
de un boleto al estilo “bingo” con filas y columnas, para representar los números seleccionados se usarán checkbox,
y para el número de serie una caja de texto. Cuando se pulse el botón jugar, 
se mostrará la combinación ganadora generada aleatoriamente y los aciertos que ha tenido. 
No se usarán estructuras repetitivas ni arrays, se mostrará la combinación ganadora en una tabla con una sola fila y un número en cada columna.
Se mostrará el número de aciertos que ha tenido el usuario y cuánto dinero ha ganado:
-menos de 4 aciertos: nada
-4 aciertos: dinero vuelto
-5 aciertos: 30 euros
-6 aciertos: 100 euros
-número de serie: Si se acierta se sumarán 500 euros independientemente del número de aciertos.
Nota: no hace falta comprobar todos los números, solo los de la combinación ganadora,
por lo que no se controla si el usuario selecciona más de 6 números. -->
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
    <title>Bingo</title>
</head>

<body>
    <h1>Bingo</h1>
    <h3>Elige seis números y el número de serie (1-999)</h3>
    <?php  //Capturamos aqui el error si se eligen mas o menos de 6 números
        if (isset($_GET["error"])) {
            $fallo = $_GET["error"];
            if ($fallo=1) {
                echo "<h3>Tienes que elegir 6 números, no puedes elegir ni mas ni menos</h3>";
            }
        }
    ?>
    <form action="Ej2_Comprobar.php" method="get"> 
        <table>
        <?php 
            $cont = 0;
            for ($i=1; $i <= 49; $i++) { //Hacemos la tabla con todos los números para poder elegirlos
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
        <br> <!-- Aqui escribimos el número de serie -->
        <strong>Número de serie -></strong> <input type="text" name="serie"><br><br> 
        <input type="submit" value="Jugar al Bingo">
    </form>
</body>

</html>