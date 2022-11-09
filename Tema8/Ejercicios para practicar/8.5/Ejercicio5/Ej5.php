<!-- Ejercicio 5.
Una función (tipo procedimiento, no hay valor devuelto) denominada escribirNumerosMod que reciba dos parámetros: 
un array de valores enteros y una cadena de texto que puede ser "sobreescribir" ó "ampliar". 
La función debe proceder a: escribir cada uno de los números que forman el contenido del array en una 
línea de un archivo datosEjercicio.txt usando el modo de operación que se indique con el otro parámetro. 
Si el archivo no existe, debe crearlo.
Ejemplo: El array que se pasa es $numeros = array(5, 9, 3, 22); y la invocación que se 
utiliza es escribirNumerosMod($numeros, "sobreescribir"); En este caso, se debe eliminar el 
contenido que existiera previamente en el archivo y escribir en él 4 líneas, cada una de las cuales 
contendrá los números 5, 9, 3 y 22. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    
    <?php 

        //Función para escribir números de un array en un fichero, ampliandolo o sobreescribiendolo, según se indique
        function escribirNumerosMod($arrayVal, $cadena){
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

        $numeros = array(523, 91, 3, 222);
        $instruccion = "ampliar";
        escribirNumerosMod($numeros, $instruccion);

    ?>

</body>

</html>