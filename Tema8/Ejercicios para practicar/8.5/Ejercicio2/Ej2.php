<!-- Ejercicio 2.
Una función denominada obtenerSuma (tipo función, devolverá un valor numérico) que reciba una ruta de archivo 
como parámetro, lea los números existentes en cada línea del archivo, y devuelva la suma de todos esos números. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    
    <?php 

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

        //Introducimos la ruta del fichero
        $ruta = "../Fichero/datosEjercicio.txt";
        $suma = obtenerSuma($ruta);
        echo "La suma de todos los números del fichero es ",$suma;

    ?>

</body>

</html>