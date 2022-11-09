<!-- Ejercicio 4.
Crea código php donde a través de la función escribirTresNumeros escribas en el fichero los números 2, 8, 14. 
Luego, mediante la función obtenerSuma muestra por pantalla el resultado de sumar los números existentes en el archivo.
Finalmente, mediante la función obtenerArrNum obtén el array, recórrelo y muestra cada uno de los elementos del array. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    
    <?php 
    
        //Función para escribir los tres números en el fichero
        function escribirTresNumeros($num1, $num2, $num3, $ruta){
            $fp = fopen($ruta, "a");
            fwrite($fp, $num1.PHP_EOL.$num2.PHP_EOL.$num3.PHP_EOL);
            echo "ESCRIBIENDO en el fichero ".$ruta.".....";
            fclose($fp);
        }

        //Función para obtener la suma de los números del fichero
        function obtenerSuma($ruta){
            if (file_exists($ruta)) {
                $fp = fopen($ruta, "r");
                $suma = 0;
                while (!feof($fp)) {
                    $num = fgets($fp);    
                    $suma += $num;
                }
                fclose($fp);
                return $suma;    
            } else {
                echo "El fichero ",$ruta," no existe";
            }
            
        }

        //Función para obtener un array con los números del fichero
        function obtenerArrNum($ruta){
            if (file_exists($ruta)) {
                $fp = fopen($ruta, "r");
                $arrayNum = [];
                while (!feof($fp)) {
                    $num = fgets($fp);    
                    $arrayNum[] = $num;    
                }
                array_pop($arrayNum); //Borramos el ultimo elemento del array porque mete un elemento final diferente 
                fclose($fp);
                return $arrayNum; 
            } else {
                echo "El fichero ",$ruta," no existe";
            }
        }

        //Ruta del fichero
        $ruta = "../Fichero/datosEjercicio.txt";

        //Valores para añadirlos al fichero
        $num1 = 2;
        $num2 = 8;
        $num3 = 14;
        escribirTresNumeros($num1, $num2, $num3, $ruta);

        echo "<br><br>";

        //Obtener suma de todos los números del fichero
        $suma = obtenerSuma($ruta);
        echo "La suma de todos los números del fichero es ",$suma;

        echo "<br><br>";

        //Obtener array con todos los números del fichero
        $arrayNum = obtenerArrNum($ruta);
        echo "Array con todos los números del fichero: <br>";
        for ($i=0; $i < count($arrayNum); $i++) { 
            echo $arrayNum[$i]," | ";
            if ($i%5==0 && $i>1) {
                echo "<br>";
            }
        }

    ?>

</body>

</html>