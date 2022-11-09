<!-- Ejercicio 1.
Una función (tipo procedimiento, no hay valor devuelto) denominada escribirTresNumeros 
que reciba tres números enteros como parámetros y proceda a escribir dichos números en tres
líneas en un archivo denominado datosEjercicio.txt. Si el archivo no existe, debe crearlo. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    
    <?php 

        //Función para escribir los tres números en el fichero
        function escribirTresNumeros($num1, $num2, $num3){
            $file = "../Fichero/datosEjercicio.txt";
            $fp = fopen($file, "a");
            fwrite($fp, $num1.PHP_EOL.$num2.PHP_EOL.$num3.PHP_EOL);
            echo "ESCRIBIENDO en el fichero ".$file.".....";
            fclose($fp);
        }

        //Llamamos a la función y generamos los tres números aleatoriamente
        escribirTresNumeros(rand(0,999), rand(0,999), rand(0,999));

    ?>

</body>

</html>