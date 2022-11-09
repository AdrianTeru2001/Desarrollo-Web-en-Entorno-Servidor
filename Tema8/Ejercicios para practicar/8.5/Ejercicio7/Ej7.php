<!-- Ejercicio 7.
Crea código php donde a través de la función escribirNumerosMod escribas en el fichero los números 2, 8, 14. 
Luego, mediante la función leerContenidoFichero muestra el contenido del fichero. 
Ahora con la función escribirNumerosMod amplía el contenido del fichero y añádele los números 33, 11 y 16.
Muestra nuevamente el contenido del fichero por pantalla. Finalmente, escribe el fichero pasándole un 
array con los número 4, 99, 12 y parámetro <<sobreescribir>> para eliminar los datos que existieran previamente.
Muestra el contenido del fichero por pantalla y un mensaje de despedida.
Crea las siguientes páginas en PHP -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    
    <?php 
    
        //Función para escribir números de un array en un fichero, ampliandolo o sobreescribiendolo, según se indique
        function escribirNumerosMod($arrayVal, $cadena, $ruta){
            $ruta = "../Fichero/datosEjercicio.txt";
            if (strtolower($cadena)=="sobreescribir") {
                $fp = fopen($ruta, "w");
                for ($i=0; $i < count($arrayVal); $i++) { 
                    fwrite($fp, $arrayVal[$i].PHP_EOL);
                }
                echo "Sobreescribiendo el fichero ",$ruta,"...";
                fclose($fp);
            } else if (strtolower($cadena)=="ampliar") {
                $fp = fopen($ruta, "a");
                for ($i=0; $i < count($arrayVal); $i++) { 
                    fwrite($fp, $arrayVal[$i].PHP_EOL);
                }
                echo "Ampliando el fichero ",$ruta,"...";
                fclose($fp);
            } else {
                echo "Instrucción incorrecta (sobreescribir o ampliar)";
            }
        }

        //Función para leer el contenido de un fichero y mostrarlo por pantalla linea a linea
        function leerContenidoFichero($ruta){
            $fp = fopen($ruta, "r");
            while(!feof($fp)){
                $linea = fgets($fp);
                echo $linea,"<br>";
            }
            fclose($fp);
        }

        //Ruta del fichero
        $ruta = "../Fichero/datosEjercicio.txt";

        //Escribir los primeros números en el fichero
        $numeros1 = array(2, 8, 14);
        $instruccion = "ampliar";
        escribirNumerosMod($numeros1, $instruccion, $ruta);

        //Mostrar el contenido del fichero
        echo "<br><br>Contenido del fichero: <br>";
        leerContenidoFichero($ruta);

        //Ampliando contenido del fichero
        $numeros2 = array(33, 11, 16);
        $instruccion = "ampliar";
        escribirNumerosMod($numeros2, $instruccion, $ruta);

        //Mostrar el contenido del fichero
        echo "<br><br>Contenido del fichero: <br>";
        leerContenidoFichero($ruta);

        //Sobreescribir fichero
        $numeros3 = array(4, 99, 12);
        $instruccion = "sobreescribir";
        escribirNumerosMod($numeros3, $instruccion, $ruta);

        //Mostrar el contenido del fichero
        echo "<br><br>Contenido del fichero: <br>";
        leerContenidoFichero($ruta);

        echo "<h2>Hasta la Proxima</h2>";

    ?>

</body>

</html>