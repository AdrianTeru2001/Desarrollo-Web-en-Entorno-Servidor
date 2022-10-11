<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Comida Rápida</title>
</head>

<body>
    
    <?php 

        $array = $_REQUEST; //Guardamos todo lo que traemos de la pagina principal en un array
        array_pop($array); //Eliminamos el ultimo elemento porque es el String de array
        if ($_GET["oculto"]=="") { //Si la variable oculto esta vacia declaramos la el array $comida
            $comida = [];
        } else { //Si no está vacia, metemos en la variable texto el String de array y lo transformamos en array en la variable $comida
            $texto = $_GET["oculto"];
            $comida = unserialize(base64_decode($texto));
        }
        //En otro array pasamos los elementos del array donde tenemos el nuevo pedido
        $array2 = [];
        foreach ($array as $elemento) {
            $array2[] = $elemento;
        }
        $comida[] = $array2; //Metemos el nuevo pedido como un elemento de un array que tenga todos los pedidos
        $junto = base64_encode(serialize($comida)); //Pasamos a String el array con todos los pedidos
        header("Refresh:0; url=Ej2.php?array=$junto"); //Pasamos el String del array con los pedidos a la pagina principal

    ?>

</body>

</html>