<!-- Ejercicio 3.
Contar cuantas palabras tiene una frase introducida por el usuario, ten en cuenta que 
el usuario puede poner varios espacios seguidos, incluso al principio o al final. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Contar Palabras</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["frase"])) {
            $frase = trim($_GET["frase"]); //Recogemos la frase, la metemos en una variable y le quitamos los espacios del principio y del final
            $array = explode(" ",$frase); //Dividimos el contenido de la frase por espacios y las pasamos a un array
            echo "Frase -> '",$frase,"'";
            echo "<br><br>";
            for ($i=0; $i < count($array); $i++) { 
                if ($array[$i]=="") { //Si un elemento del array está vacio
                    unset($array[$i]); //Lo eliminamos
                    $array = array_values($array); //Ordenamos el array
                    $i=-1; //Empezamos de nuevo el bucle
                }
            }
            $cont = count($array); //Contamos cuantas palabras tiene la palabra
            echo "La frase tiene ",$cont," palabras";
        } else {
            echo "Introduce la frase para contar las palabras";
        }
        echo "<br><br>";
    ?>

    <form action="Ej3.php" method="get"> <!-- Mandamos la frase a esta misma página -->
        Introduzca una frase <input type="text" name="frase" required>
        <input type="submit" value="Contar Palabras">
    </form>

</body>

</html>