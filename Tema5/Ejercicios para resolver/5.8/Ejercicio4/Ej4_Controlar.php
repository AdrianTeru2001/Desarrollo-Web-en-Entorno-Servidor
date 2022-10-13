<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Test de Parejas</title>
</head>

<body>
    
    <?php 
        $array = $_REQUEST; //Cojemos los datos de la persona y los pasamos a una variable
        array_pop($array); //Borramos el ultimo valor que es el del array
        if ($_GET["oculto"]=="") {
            $parejas = [];
        } else {
            $texto = $_GET["oculto"]; //Cojemos el String del array y lo pasamos a una variable
            $parejas = unserialize(base64_decode($texto)); //Convertimos ese string de array a un array
        }
        $array2 = [];
        foreach ($array as $elemento) { //Pasamos los datos de la nueva persona a un array diferente
            $array2[] = $elemento;
        }
        $parejas[] = $array2; //Añadimos la ultima persona al array donde tenemos a todas las personas
        $junto = base64_encode(serialize($parejas)); //Lo pasamos todo a String
        header("Refresh:0; url=Ej4.php?array=$junto"); //Le mandamos el String de array a la página donde metemos los datos de las personas
    ?>

</body>

</html>