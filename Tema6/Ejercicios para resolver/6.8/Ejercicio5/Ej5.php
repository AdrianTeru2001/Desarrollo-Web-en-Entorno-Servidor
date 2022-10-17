<!-- Ejercicio 5.
Intercambiar un string dado, hasta volverlo a su forma original:
ejemplo: Hola, ahol, laho, olah, hola (stop). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Rotar String</title>
</head>

<body>

    <?php 
        $palabra = "Hola"; //Ponemos en una variable que palabra queremos rotar
        $caracteres = str_split($palabra); //Pasar los caracteres a un array de caracteres
        echo "Rotando la palabra ",$palabra,": <br><br>";
        echo $palabra,", ";
        for ($i=0; $i < count($caracteres); $i++) { //Contamos las vueltas que hay que darle a la palabra
            $letra = $caracteres[count($caracteres)-1]; //En una variable pasamos la última letra que tengamos en ese momento
            for ($j=count($caracteres)-1; $j >= 0; $j--) { //Damos la vuelta a la palabra
                if ($j==0) {
                    $caracteres[0] = $letra; //En la primera posición ponemos la letra que guardamos antes
                } else {
                    $caracteres[$j] = $caracteres[$j-1]; //Ponemos en una posición la letra que esté en una posición menor
                }
            } 
            //Mostramos la palabra
            if ($i==count($caracteres)-1) { 
                foreach ($caracteres as $elemento) {
                    echo $elemento;
                }
                echo " (stop).";
            } else {
                foreach ($caracteres as $elemento) {
                    echo $elemento;
                }
                echo ", ";
            }
        }
    ?>

</body>

</html>