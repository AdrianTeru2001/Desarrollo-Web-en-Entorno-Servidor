<!-- Ejercicio 6.
Dado un párrafo con dos frases (separadas por un punto), contar cuántas palabras tiene cada frase. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 - Contar palabra de cada frase</title>
</head>

<body>
    
    <?php 
        $frase = "  Hola   me  llamo  Adrian   .   Mis   apellidos son teruel reina  ";
        $fraseDividida = explode(".",$frase); //Dividimos la frase por el punto
        $frase1 = explode(" ", trim($fraseDividida[0])); //Pasamos las palabras de la primera frase a un array quitando los espacios del principio y del final
        $frase2 = explode(" ", trim($fraseDividida[1])); //Pasamos las palabras de la segunda frase a un array quitando los espacios del principio y del final

        echo "Frase 1 -> ",$fraseDividida[0],"<br>";
        echo "Frase 2 -> ",$fraseDividida[1],"<br><br>";
        
        for ($i=0; $i < count($frase1); $i++) { //Controlamos que en la primera frase no hayan espacios en blanco innecesarios
            if ($frase1[$i]=="") {
                unset($frase1[$i]);
                $frase1 = array_values($frase1);
                $i=-1;
            }
        }
        for ($i=0; $i < count($frase2); $i++) { //Controlamos que en la segunda frase no hayan espacios en blanco innecesarios
            if ($frase2[$i]=="") {
                unset($frase2[$i]);
                $frase2 = array_values($frase2);
                $i=-1;
            }
        }

        //Contamos cuantas palabras tienen ambas frases
        $cont1 = count($frase1);
        $cont2 = count($frase2);

        echo "La primera frase tiene ",$cont1," palabras y laa segunda frase tiene ",$cont2," palabras."; //Mostramos cuantas palabras tiene cada frase
    ?>

</body>

</html>