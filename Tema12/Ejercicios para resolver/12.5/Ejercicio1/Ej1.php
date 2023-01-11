<!-- Ejercicio 1
Utilizando la API de OpenWeatherMap, realiza una aplicación que muestre la información meteorológica (investiga los distintos parámetros que puede 
informar la API) de una determinada ciudad. Para la selección de la ciudad se puede utilizar la imagen de un mapa, una o varias listas desplegables,
un campo de texto o combinaciones de los métodos anteriores, de manera que tengamos una aplicación interactiva en la que podamos seleccionar 
la ciudad y la información meteorológica que queramos conocer de ella. -->
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
    
        if (isset($_GET["local"])) {
            $localidad = $_GET["local"];
            error_reporting(E_ALL ^ E_WARNING);
            $datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$localidad,Spain&units=metric&appid=1352d49f75f197fb8110d12817b02fa9");
            if (!$datos) {
                echo "<h1>La localidad introducida no existe o no puede ser mostrada en estos momentos</h1>";
            } else {
                $tiempo = json_decode($datos);
                echo "<h1>Meteorología de $localidad</h1>";
                if (isset($_GET["temp"])) {
                    echo "Temperatura: ".$tiempo->main->temp."ºC<br>";
                }
                if (isset($_GET["min"])) {
                    echo "Minimas: ".$tiempo->main->temp_min."ºC<br>";
                }
                if (isset($_GET["max"])) {
                    echo "Maximas: ".$tiempo->main->temp_max."ºC<br>";
                }
                if (isset($_GET["hum"])) {
                    echo "Humedad: ".$tiempo->main->humidity."%<br>";
                }
                if (isset($_GET["pre"])) {
                    echo "Presión: ".$tiempo->main->pressure."mb<br>";
                }
                echo "<br>";
            }
            
        }
    
    ?>

    <form action="Ej1.php" method="get">
        <h3>Introduzca la localidad para comprobar meteorología:</h3>
        <input type="text" name="local" required><br>
        <h3>Información a mostrar:</h3>
        Temperatura <input type="checkbox" name="temp" value="temp"><br>
        Temperatura Mínima <input type="checkbox" name="min" value="min"><br>
        Temperatura Máxima <input type="checkbox" name="max" value="max"><br>
        Humedad <input type="checkbox" name="hum" value="hum"><br>
        Presión <input type="checkbox" name="pre" value="pre"><br><br>
        <input type="submit" value="Ver Meteorología">
    </form>

</body>

</html>