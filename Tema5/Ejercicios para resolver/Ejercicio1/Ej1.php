<!-- Ejercicio 1
Diseñar una página que esté compuesta por una tabla de 10 filas por 10 columnas, y en cada celda habrá una imagen
de un ojo cerrado. Cada vez que el usuario pulse un ojo, ser recargará la página con todos los ojos 
cerrados salvo los que se han ido pulsando que corresponderá a un ojo abierto. Conforme se vallan pulsando más
ojos se irá completando la tabla de ojos abiertos. Si se pulsa en un ojo abierto se volverá a cerrar.
Usar la función explode() para pasar arrays como cadenas. -->
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
    <title>Ejercicio 1 - Ojos</title>
</head>

<body>
    
    <table>
        <?php
            $cont = 1;
            if (!isset($_REQUEST["array"])) { //Si el array de los ojos no existe lo creamos con todos los valores a 0 y lo pasamos a String en otra variable
                $ojos = array_fill(1,100, 0);
                $junto = serialize($ojos);
            } else { //Si está creado, lo recojemos de la otra página y lo pasamos a String en otra variable
                $junto = $_REQUEST["array"];
                $ojos = unserialize($junto);
            }
            for ($i=0; $i < 10; $i++) { //Creamos los enlaces con las imagenes que al pulsarlo le mandemos a la otra página el numero del ojo y el array con los ojos
                echo "<tr>";
                for ($j=0; $j < 10; $j++) {
                    echo "<td><a href='Ej1_Comprobar.php?ojo=",$cont,"&array=",$junto,"'><img src='",($ojos[$cont]==1) ? '../imagenes/ojoabierto.png' : '../imagenes/ojocerrado.png',"' width='80px' height='65px' alt='ojoCerrado'></a></td>";
                    $cont++;
                }
                echo "</tr>";
            }
        ?>
    </table>

</body>

</html>