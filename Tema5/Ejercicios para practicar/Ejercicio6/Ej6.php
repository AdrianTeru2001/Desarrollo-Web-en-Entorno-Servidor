<!-- Ejercicio 6
Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los pares de un color
y los impares de otro. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 Practica</title>
</head>

<body>

    <?php 
        if (!isset($_REQUEST)) {
            print_r($_Get["n1"]);
        } else {
            echo "<form action='#' method='get'>";
                for ($i=0; $i < 8; $i++) { 
                    echo "Número ",$i+1," -> <input type='text' name='n",$i+1,"'><br>";
                }
                echo "<input type='submit' name='enviar' value='Enviar números'>";
            echo "</form>";
        }
    ?>

    

</body>

</html>