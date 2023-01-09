<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Api Rest</title>
</head>

<body>

    <!-- <h2>El tiempo en Málaga</h2> -->
    <?php
        /* $datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Utrera,
        Spain&units=metric&appid=1352d49f75f197fb8110d12817b02fa9");
        echo "<h3>Datos en bruto (en formato JSON): </h3>$datos<hr>";
        $tiempo = json_decode($datos);
        echo "<h3>Datos en un objeto: </h3>";
        print_r($tiempo);
        echo "<hr>";
        echo "<h3>Datos sueltos: </h3>";
        echo "Temperatura: ".$tiempo->main->temp."ºC<br>";
        echo "Humedad: ".$tiempo->main->humidity."%<br>";
        echo "Presión: ".$tiempo->main->pressure."mb<br>"; */
    ?>

    <?php 
    
        $uri = 'http://api.football-data.org/v4/competitions/PD/matches/?matchday=1';
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: 3e308446a7e147768f5e66f408002913';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($uri, false, $stream_context);
        $matches = json_decode($response);
        /* var_dump($matches); */
        echo $matches->awayTeam->score;
    
    ?>
    
</body>

</html>