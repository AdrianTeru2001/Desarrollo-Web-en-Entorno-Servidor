<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $saludo = "Hola, estamos trabajando con las cadenas"; //la posición del primer carácter es 0
    echo "<br>Todo en minúsculas: " . strtolower($saludo);
    echo "<br>Todo en mayúsculas: " . strtoupper($saludo);
    echo "<br>Primera letra mayuscula: " . ucfirst($saludo);
    echo "<br>Primeras palabras mayúsculas" . ucwords($saludo);
    echo "<br>Eliminamos espacios de principio y final: " . trim($saludo);
    echo "<br>Repetimos la cadena 5 veces: " . str_repeat($saludo, 5);
    echo "<br>Contamos los caracteres: " . strlen($saludo);
    echo "<br>Busqueda de cadenas: " . strstr($saludo, 'la'); //devuelve la cadena donde la encuentre hasta el final
    echo "<br>Remplazando cadenas: " . str_replace(["Hola","Buenas","Hello"], "Adios", $saludo); //sustituye una o varias cadenas de un array por otra cadena
    echo "<br>Extraer cadenas: " . substr($saludo, 2, 8); //extrae desde la posición 2 hasta la 10 (2+8) desde la posición 2 mas 8 caracteres, si se omite la cantidad de caracteres devuelve hasta el final.
    echo "<br>Encontrar posición primera ocurrencia: ".mb_stripos($saludo, "la"); //si no encuentra devuelve false
    echo "<br>Encontrar posición primera ocurrencia: " . strpos($saludo, "la"); //si no encuentra devuelve cadena vacia
    echo "<br>Encontrar posición última ocurrencia: " . strrpos($saludo, "la"); //si no encuentra devuelve cadena vacia
    echo "<br>Voltea un string dado: ".strrev($saludo); //voltea o invierte una cadena
    echo "<hr>";
    //$string = "compos y compas";
    //echo preg_match("/er.s/", $string); // Devuelve 5: 6, f, ^, R y L
    //echo preg_match_all("//", $string); // Devuelve 8 (todos)
    $fecha_actual = date("d-m-Y"); //$fecha_actual se podría suprimir, por defecto es la actual
    echo date("d-m-Y",strtotime($fecha_actual."+ 1 day")); //sumo 1 día

    ?>
</body>
</html>