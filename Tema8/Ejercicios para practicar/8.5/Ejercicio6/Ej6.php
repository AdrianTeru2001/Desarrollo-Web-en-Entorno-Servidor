<!-- Ejercicio 6.
Una función (tipo procedimiento, no hay valor devuelto) denominada leerContenidoFichero que reciba 
como parámetro la ruta del fichero y muestre por pantalla el contenido de cada una de las líneas del fichero. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>

<body>
    
    <?php 
    
        //Función para leer el contenido de un fichero y mostrarlo por pantalla linea a linea
        function leerContenidoFichero($ruta){
            $fp = fopen($ruta, "r");
            while(!feof($fp)){
                $linea = fgets($fp);
                echo $linea,"<br>";
            }
            fclose($fp);
        }

        $ruta = "../Fichero/datosEjercicio.txt";
        leerContenidoFichero($ruta);

    ?>  

</body>

</html>