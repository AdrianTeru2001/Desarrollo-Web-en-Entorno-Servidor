<!-- Ejercicio 3
Crear una clase cubo que contenga información sobre la capacidad y su contenido actual en litros. Se podrá consultar tanto
la capacidad como el contenido en cualquier momento. Dotar a la clase de la capacidad de verter el contenido de un 
cubo en otro (hay que tener en cuenta si el contenido del cubo origen cabe en el cubo destino, si no cabe, se verterá 
solo el contenido que quepa). Hacer una página principal para probar el funcionamiento con un par de cubos. -->
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

        //Cargamos la clase
        include_once "cubo.php";

        //Inicializamos los cubos
        $cubo1 = new cubo(10, 8);
        $cubo2 = new cubo(12, 5);

        //Mostramos los cubos
        echo "<h2>Mostramos los cubos recien creados: </h2>";
        $cubo1->mostrar();
        $cubo2->mostrar();

        //Vertemos el cubo1 en el cubo2
        $cubo1->verter($cubo2);

        //Mostramos los cubos de nuevo
        echo "<h2>Mostramos los cubos vertidos (cubo1 a cubo2): </h2>";
        $cubo1->mostrar();
        $cubo2->mostrar();

        //Vertemos el cubo2 en el cubo1
        $cubo2->verter($cubo1);

        //Mostramos los cubos de nuevo
        echo "<h2>Mostramos los cubos vertidos de nuevo (cubo2 a cubo1): </h2>";
        $cubo1->mostrar();
        $cubo2->mostrar();

        //Vertemos el cubo1 en el cubo2 de nuevo
        $cubo1->verter($cubo2);

        //Mostramos los cubos de nuevo
        echo "<h2>Mostramos los cubos vertidos finalmente (cubo1 a cubo2): </h2>";
        $cubo1->mostrar();
        $cubo2->mostrar();

    ?>

</body>

</html>