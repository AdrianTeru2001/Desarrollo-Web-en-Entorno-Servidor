<!-- Ejercicio 2
Realiza una aplicación que haga uso de cualquier API Rest gratuita que encontréis y que proporcione alguna información, debéis procesar esa 
información y mostrarla formateada correctamente. Si tenéis dificultad para encontrar un servicio gratuito, podéis usar el de la página 
football-data.org, que ofrece información de fútbol completísima, de manera gratuita, de todas las ligas del mundo, resultados, equipos, 
jugadores, etc…, además la página contiene mucha información de la API y ejemplos de uso. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1{
            font-size: 1000px;
        }
        img{
            width: 5000px;
            height: 5000px;
        }
        body{
            background-image: url("copa.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <title>Ejercicio 2</title>
</head>

<body>
    
<?php 
    
    // $uri = 'http://api.football-data.org/v4/competitions/PD/matches';
    /* $uri = 'https://api.football-data.org/v4/teams';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 3e308446a7e147768f5e66f408002913';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $matches = json_decode($response);
    var_dump($matches); */
    /* echo $matches->awayTeam->name; */

    echo "<h1>MESSI</h1>";

?>

    <!-- <img src="copa.jpg" alt=""> -->

</body>

</html>