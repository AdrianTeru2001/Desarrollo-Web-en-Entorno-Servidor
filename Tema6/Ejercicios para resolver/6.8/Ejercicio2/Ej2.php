<!-- Ejercicio 2.
Cambiar todas las vocales de la frase “Tengo una hormiguita en la patita, que me 
esta haciendo cosquillitas y no me puedo aguantar” por otra vocal pedida al usuario. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Cambiar Vocales</title>
</head>

<body>
    
    <?php 
        $frase = "Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar";
        echo "Frase original -> ",$frase,"<br><br>";
        if (isset($_GET["vocal"])) {
            $vocal = $_GET["vocal"]; //Cojemos la vocal y la metemos en una variable
            echo "Frase Modificada -> ",str_replace(["a","e","i","o","u"],$vocal,$frase); //Con la función str_replace() cambiamos la vocal que introduzcamos por todas las vocales de la frase
        } else {
            echo "Introduzca la vocal para modificar la frase";
        }
        echo "<br><br>";
    ?>
    <form action="Ej2.php" method="get"> <!-- Mandamos la vocal a esta misma página -->
        Introduzca una vocal para cambiarla en la frase <input type="text" name="vocal" required>
        <input type="submit" value="Cambiar Vocal">
    </form>

</body>

</html>