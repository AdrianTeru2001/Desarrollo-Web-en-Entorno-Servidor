<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Practica</title>
</head>

<body>
    
    <?php 

        $array = unserialize($_GET["array"]);
        $num1 = $_GET["valor1"];
        $num2 = $_GET["valor2"];
        
        echo "<h2>Valores Generados</h2>";
        $cont = 0;
        for ($i=0; $i < count($array); $i++) { 
            if ($cont<19) {
                echo $array[$i],"  ";
                $cont++;
            } else if ($cont==19) {
                echo $array[$i];
                $cont++;
            } 
            if ($cont==20) {
                echo "<br>";
                $cont = 0;
            }
        }

        echo "<br>";
        for ($i=0; $i < count($array); $i++) { 
            if ($array[$i]==$num1) {
                $array[$i] = $num2;
            }
        }

        echo "<h2>Valores Cambiados</h2>";
        $cont = 0;
        for ($i=0; $i < count($array); $i++) { 
            
            if ($cont<19) {
                if ($array[$i]==$num2) {
                    echo "<span style ='color:red;'>",$array[$i],"</span> ";
                    $cont++;
                } else {
                    echo $array[$i]," ";
                    $cont++;
                }
            } else if ($cont==19) {
                if ($array[$i]==$num2) {
                    echo "<span style ='color:red;'>",$array[$i],"</span> ";
                    $cont++;
                } else {
                    echo $array[$i]," ";
                    $cont++;
                }
            } 
            if ($cont==20) {
                echo "<br>";
                $cont = 0;
            }
        }

    ?>

</body>

</html>