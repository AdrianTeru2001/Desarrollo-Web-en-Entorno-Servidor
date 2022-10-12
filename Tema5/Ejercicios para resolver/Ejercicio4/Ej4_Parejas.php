<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Test de Parejas</title>
</head>

<body>
    
    <?php 

        //ArrayFinal Heterosexual
        if (isset($_REQUEST["hetero"])) {
            $parejasFinal = $_GET["hetero"];
            $arrayFinal = unserialize(base64_decode($parejasFinal));
        }
        //ArrayFinal Homosexual
        if (isset($_REQUEST["homo"])) {
            $parejasFinal = $_GET["homo"];
            $arrayFinal = unserialize(base64_decode($parejasFinal));
        }
        //ArrayFinal Bisexual
        if (isset($_REQUEST["bi"])) {
            $parejasFinal = $_GET["bi"];
            $arrayFinal = unserialize(base64_decode($parejasFinal));
        }

        if (isset($_REQUEST["hetero"]) || isset($_REQUEST["homo"]) || isset($_REQUEST["bi"])) {
            foreach ($arrayFinal as $elemento) {
                foreach ($elemento as $elemento2) {
                    echo $elemento2," - ";
                }
                echo "<br>";
            }
            echo "<br><br>";
            print_r($parejasFinal);
        }

        if (!$_REQUEST["oculto"]==""){
            $texto = $_GET["oculto"];
            $parejas = unserialize(base64_decode($texto));   
            //Array Heterosexual
            $hetero = [];
            for ($i=0; $i < count($parejas); $i++) { 
                for ($j=0; $j < 3; $j++) { 
                    if ($parejas[$i][2]=="Heterosexual" || $parejas[$i][2]=="Bisexual") {
                        $hetero[$i][$j] = $parejas[$i][$j];
                    }
                }
            }
            $heteroTexto = base64_encode(serialize($hetero));
            //Array Homosexual
            $homo = [];
            for ($i=0; $i < count($parejas); $i++) { 
                for ($j=0; $j < 3; $j++) { 
                    if ($parejas[$i][2]=="Homosexual") {
                        $homo[$i][$j] = $parejas[$i][$j];
                    }
                }
            }
            $homoTexto = base64_encode(serialize($homo));
            //Array Bisexual
            $bi = [];
            for ($i=0; $i < count($parejas); $i++) { 
                for ($j=0; $j < 3; $j++) { 
                    $bi[$i][$j] = $parejas[$i][$j];
                }
            }
            $biTexto = base64_encode(serialize($bi));
            //Botón Pareja Heterosexual
            echo "<form action='Ej4_Parejas.php' method='get'>";
            echo "<input type='hidden' name='oculto' value=$texto>";
            echo "<input type='hidden' name='hetero' value=$heteroTexto>";
            echo "<input type='submit' value='Generar Pareja Heterosexual'>";
            echo "</form>";
            //Botón Pareja Homosexual
            echo "<form action='Ej4_Parejas.php' method='get'>";
            echo "<input type='hidden' name='oculto' value=$texto>";
            echo "<input type='hidden' name='homo' value=$homoTexto>";
            echo "<input type='submit' value='Generar Pareja Homosexual'>";
            echo "</form>";
            //Botón Pareja Bisexual
            echo "<form action='Ej4_Parejas.php' method='get'>";
            echo "<input type='hidden' name='oculto' value=$texto>";
            echo "<input type='hidden' name='bi' value=$biTexto>";
            echo "<input type='submit' value='Generar Pareja Bisexual'>";
            echo "</form>";
            
        } else {
            echo "No hay ninguna pareja";
        }
  
    ?>

</body>

</html>