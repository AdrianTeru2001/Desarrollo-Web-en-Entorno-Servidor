<!-- Ejercicio 4
Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre 
por pantalla separados por espacios. El programa pedirá entonces por teclado dos 
valores y a continuación cambiará todas las ocurrencias del primer valor por el segundo 
en la lista generada anteriormente. Los números que se han cambiado deben aparecer
resaltados de un color diferente. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Practica</title>
</head>

<body>

    <h2>Valores generados</h2>

    <?php 
        $cont = 0;
        for ($i=0; $i < 100; $i++) { 
            $num[$i] = rand(0,20);
            if ($cont<19) {
                echo $num[$i],"  ";
                $cont++;
            } else if ($cont==19) {
                echo $num[$i];
                $cont++;
            } 
            if ($cont==20) {
                echo "<br>";
                $cont = 0;
            }
        }
        echo "<br>";
        $arrayNum = serialize($num);
    ?>
    
    <form action="Ej4_Numeros.php" method="get">
        Valor cambiado -> <input type="number" min="0" max="20" name="valor1"><br>
        Valor para cambiar -> <input type="number" min="0" max="20" name="valor2"><br>
        <input type="hidden" name="array" value="<?php echo $arrayNum ?>"><br>
        <input type="submit" name="enviar" value="Enviar números">
    </form>

</body>

</html>