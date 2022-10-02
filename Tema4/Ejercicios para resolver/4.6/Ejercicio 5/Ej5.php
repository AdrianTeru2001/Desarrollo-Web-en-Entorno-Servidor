<!-- EJERCICIO 5
Diseñar una página que esté compuesta por una tabla de 10 filas por 10 columnas, 
y en cada celda habrá una imagen de un ojo cerrado. Cada vez que el usuario pulse un ojo, 
ser recargará la página con todos los ojos cerrados salvo el que se ha pulsado que corresponderá a un ojo abierto. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <title>Ojos - Ejercicio 5</title>
</head>

<body>

    <table>
        <?php
            $cont = 1;
            //Comprobamos si hemos clickado en el ojo, si no lo hemos hecho, la variable ojo vale 0, 
            //si lo hemos hecho, la variable vale segun el ojo que hayamos pulsado
            if (!isset($_REQUEST['ojo'])) {
                $ojo = 0;
            } else {
                $ojo = $_REQUEST['ojo'];
            }
            for ($i=0; $i < 10; $i++) { 
                echo "<tr>";
                for ($j=0; $j < 10; $j++) { //Metemos la imagen dentro de un enlace para, al pulsarlo, recargar la pagina enviando el dato del ojo que hemos pulsado
                    echo "<td><a href='Ej5.php?ojo=",$cont,"'><img src='",($ojo==$cont) ? '../imagenes/ojoabierto.png' : '../imagenes/ojocerrado.png',"' width='80px' height='65px' alt='ojoCerrado'></a></td>";
                    $cont++;
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>

</html>