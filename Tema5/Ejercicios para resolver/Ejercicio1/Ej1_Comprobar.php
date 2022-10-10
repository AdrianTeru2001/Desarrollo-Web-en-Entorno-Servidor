<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Ojos</title>
</head>

<body>
    
    <?php
        $junto = $_REQUEST["array"]; //Recojo el array transformado en String
        $num = $_REQUEST["ojo"]; //Recojo el valor del ojo pulsado
        $array = unserialize($junto); //Paso paso el string del array en un array
        $array2 = []; //Inicializamos un arrary vacio
        for ($i=1; $i <= 100; $i++) { //Lo rellenamos segun este el ojo que hayamos pulsado
            if ($i==$num && $array[$i]==1) {
                $array2[$i] = 0;
            } else if ($i==$num && $array[$i]==0) {
                $array2[$i] = 1;
            } else {
                $array2[$i] = $array[$i];
            }
        }
        $junto = serialize($array2); //Pasamos a String el array
        header("Refresh:0; url=Ej1.php?array=$junto"); //Devolvemos el array transformado en String a la pagina principal
    ?>

</body>

</html>