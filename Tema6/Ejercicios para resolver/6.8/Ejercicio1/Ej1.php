<!-- Ejercicio 1.
Imprimir carácter por carácter un string dado, cada uno en una línea distinta. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Imprime Caracter</title>
</head>

<body>
    
    <?php 
        $cadena = "Hola me llamo Adrian";
        /* $caracteres = str_split($cadena); */ //Pasamos los caracteres de la cadena a un array de caracteres

        for ($i=0; $i < strlen($cadena) /* count($caracteres) */; $i++) { //Mostramos en un bucle los caracteres
            echo $cadena[$i],"<br>";
        }
    ?>

</body>

</html>