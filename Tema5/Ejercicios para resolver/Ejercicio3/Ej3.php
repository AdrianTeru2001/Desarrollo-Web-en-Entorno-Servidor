<!-- Ejercicio 3
Vamos a hacer el ejercicio de adivinar la imagen oculta del tema 3 más interesante. Para empezar, vamos a 
hacer el mosaico un poco más grande, de 10x10. Además la imagen no se va a dividir sino que formará parte del 
fondo de la tabla y para ocultar o mostrar cada parte del mosaico, el fondo de cada celda será transparente u opaco.
Cada vez que se pulse un cuadrado, la parte de la imagen correspondiente a ese cuadrado se mostrará de manera definitiva,
así que cada vez se irán mostrando más partes de la imagen. Por último, para rematar y hacerlo todavía más interesante, 
vamos a poner un límite en el número de cuadrados volteados, de modo que, si no se adivina la imagen antes 
de superar ese límite, se mostrará un mensaje indicando que ha perdido junto a la imagen completa. 
Si se acierta introduciendo el nombre correcto en la caja de texto antes de superar el límite, también se 
indicará con un mensaje junto a la imagen completa. Ayuda: La tabla con las partes visibles y no visibles de la imagen,
se encuentra en una única página que se recarga con cada pulsación, pero el resultado del juego tanto si ha
ganado como si ha perdido, se puede realizar en otra página distinta. Almacenar en un array la situación de 
cada celda (vista u oculta) y pasar el array con la función serialize para mayor comodidad. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css"> /* Estilos utilizados para la tabla y su contenido */
        td,tr{
            border: 0.5px solid;
        }
        div.oculto{
            width: 45px; 
            height: 45px; 
            margin: 0px; 
            display:block;
            background-color: grey;
            opacity: 1;
        }
        div.mostrar{
            width: 45px; 
            height: 45px; 
            margin: 0px; 
            display:block;
            background-color: grey;
            opacity: 0;
        }
    </style>
    <title>Ejercicio 3 - Imagen Oculta</title>
</head>

<body>

    <?php
        //Comprobamos cuantos intentos lleva
        if (isset($_REQUEST["intentos"])) {
            $contIntentos = $_REQUEST["intentos"];
        } else {
            $contIntentos = 10;
        }
        if ($contIntentos>0) { //Si aun le quedan intentos
            echo "<h1>Adivina la imagen escondida tras los cuadrados</h1>";
            echo "<h4>Pulsa en cada cuadrado para ver la imágen que esconde, puedes descubrir hasta 10 cuadrados, escribe su nombre y comprueba si has acertado</h4>";
            echo "<h3>Te quedan ",$contIntentos," intentos</h3>"; //Mostramos cuantos intentos le quedan
            //Hacemos una tabla con la imagen de gollum de fondo y sin espacios entre cuadros
            echo "<table cellpadding='0' cellspacing='0' style='background:url(../imagenes/gollum.jpg) no-repeat'>";
                $cont = 1;
                if (!isset($_REQUEST["array"])) { //Si el array de los cuadros ocultos no existe lo creamos con todos los valores a 0 y lo pasamos a String en otra variable
                    $ocultos = array_fill(1,100, 0);
                    $junto = serialize($ocultos);
                } else { //Si está creado, lo recojemos de la otra página y lo pasamos a String en otra variable
                    $junto = $_REQUEST["array"];
                    $ocultos = unserialize($junto);
                }
                for ($i=0; $i < 10; $i++) { //Creamos los enlaces con los cuadros ocultos que al pulsarlo le mandemos a la otra página el numero del cuadro oculto y el array con los ocultos
                    echo "<tr>";
                    for ($j=0; $j < 10; $j++) {
                        echo "<td><a href='Ej3_Comprobar.php?oculto=",$cont,"&array=",$junto,"&intentos=",$contIntentos,"'>",($ocultos[$cont]==0) ? "<div class='oculto'></div>" : "<div class='mostrar'></div>","</a></td>";
                        $cont++;
                    }
                    echo "</tr>";
                }
            echo "</table><br>";  
            //Hacemos un formularios donde pasamos a la pagina final el nombre que hemos introducido y los valores 'oculto', 'array' e 'intentos' 
            echo "<form action='Ej3_Ganador.php?' method='get'>";
            echo "<input type='hidden' name='oculto' value=$cont>";
            echo "<input type='hidden' name='array' value=$junto>";
            echo "<input type='hidden' name='intentos' value=$contIntentos>";
            echo "<input type='submit' value='Comprobar'>";
            echo "<input type='text' name='nombre'>";
            echo "</form>";
        } else { //Si hemos gastado todos los intentos nos muestra un mensaje de que hemos perdido y la imagen de gollum
            echo "<h2>Te has quedado sin intentos... Has Perdido!!!!!!</h2>";
            echo "<img src='../imagenes/gollum.jpg'>"; 
        }
        
    ?>

</body>

</html>