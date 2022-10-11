<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Imagen Oculta</title>
</head>

<body>
    
    <?php
        $contIntentos = $_GET["intentos"]; //Recojo los intentos que lleva el usuario
        $junto = $_GET["array"]; //Recojo el array transformado en String
        $num = $_GET["oculto"]; //Recojo el valor de la imagen oculta pulsada pulsado
        $array = unserialize($junto); //Paso paso el string del array en un array
        $array2 = []; //Inicializamos un arrary vacio
        for ($i=1; $i <= 100; $i++) { //Lo rellenamos segun este la imagen oculta que hayamos pulsado
            if ($i==$num && $array[$i]==0) {
                $array2[$i] = 1;
            } else {
                $array2[$i] = $array[$i];
            }
        }
        $contIntentos--;
        $junto = serialize($array2); //Pasamos a String el array
        header("Refresh:0; url=Ej3.php?array=$junto&intentos=$contIntentos"); //Devolvemos el array transformado en String y el número de intentos a la pagina principal
    ?>  

</body>

</html>