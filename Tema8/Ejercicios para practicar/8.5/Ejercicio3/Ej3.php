<!-- Ejercicio 3.
Una función denominada obtenerArrNum (tipo función, devolverá un array de valores numéricos) que reciba
una ruta de archivo como parámetro, lea los números existentes en cada línea del archivo, y devuelva un 
array cuyo índice 0 contendrá el número existente en la primera línea, cuyo índice 1 contendrá el número 
existente en la segunda línea y así sucesivamente (no usar la función file). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    
    <?php 
    
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

        $ruta = "../Fichero/datosEjercicio.txt";
        $arrayNum = obtenerArrNum($ruta);
        echo "Array con todos los números del fichero: ",var_dump($arrayNum);

    ?>

</body>

</html>