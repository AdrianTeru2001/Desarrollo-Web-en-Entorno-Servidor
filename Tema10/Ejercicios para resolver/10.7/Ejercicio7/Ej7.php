<!-- Ejercicio 7
Crea la clase DadoPoker. Las caras de un dado de poker tienen las siguientes figuras: As, K, Q, J, 7 y 8 . Crea el método tira() que 
no hace otra cosa que tirar el dado, es decir, genera un valor aleatorio para el objeto al que se le aplica el método. 
Crea también el método nombreFigura(), que diga cuál es la figura que ha salido en la última tirada del dado en cuestión. 
Crea, por último, el método getTiradasTotales() que debe mostrar el número total de tiradas entre todos los dados. 
Realiza una aplicación que permita tirar un cubilete con cinco dados de poker. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    
    <?php 
    
        //Incluimos la clase DadoPoker
        include_once "DadoPoker.php";

        //Creamos los dados
        $dado1 = new DadoPoker();
        $dado2 = new DadoPoker();
        $dado3 = new DadoPoker();
        $dado4 = new DadoPoker();
        $dado5 = new DadoPoker();

        //Tiramos los dados
        echo "<h3>Tiramos los dados de poker</h3>";
        $dado1->tira();
        $dado2->tira();
        $dado3->tira();
        $dado4->tira();
        $dado5->tira();

        //Mostramos lo que nos ha salido en los dados
        echo "<h3>Mostramos los dados: </h3>";
        $dado1->nombreFigura();
        echo "<br>";
        $dado2->nombreFigura();
        echo "<br>";
        $dado3->nombreFigura();
        echo "<br>";
        $dado4->nombreFigura();
        echo "<br>";
        $dado5->nombreFigura();

        //Mostramos el número total de tiradas de dado
        echo "<h3>Número total de tiradas de dado -> ",$dado1->getTiradasTotales()," </h3>";

    ?>

</body>

</html>