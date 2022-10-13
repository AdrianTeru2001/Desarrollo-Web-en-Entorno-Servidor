<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{
            text-align: center;
        }
        .boton{
            width: 300px;
            height: 40px;
        }
        a{
            text-decoration: none;
        }
    </style>
    <title>Ejercicio 4 - Test de Parejas</title>
</head>

<body>

    <?php 
        if (!$_REQUEST["oculto"]==""){ //Si el String del array no está vacio
            echo "<h1>Generador de Parejas</h1>";
            //ArrayFinal Heterosexual
            if (isset($_REQUEST["hetero"])) { //Si la pagina recibe un array de heterosexuales
                $parejasFinal = $_GET["hetero"];
                $arrayFinal = unserialize(base64_decode($parejasFinal)); //Cojemos el array
                $num = count($arrayFinal); //Vemos cuantos elementos tiene el array
                if ($num<=1) { //Si tiene uno o menos elementos
                    echo "<h2>No hay suficientes Heterosexuales para hacer las parejas</h2>";
                } else { //Si tiene mas de un elemento
                    $cont=0;
                    while ($cont<1) { //Cojemos una persona Heterosexual
                        $numAle = rand(0, count($arrayFinal)-1);
                        if ($arrayFinal[$numAle][2]=="Heterosexual") {
                            $pareja1[] = $arrayFinal[$numAle];
                            $cont=1;
                        }
                    }
                    $cont=0;
                    $cont2=0;
                    while ($cont<1) { //Cojemos a la segunda persona para hacer la pareja
                        $numAle = rand(0, count($arrayFinal)-1);
                        if ($arrayFinal[$numAle][0]!=$pareja1[0][0]) { //Controlamos que sea una persona valida para hacer una pareja heterosexual
                            if ($arrayFinal[$numAle][1]!=$pareja1[0][1]) {
                                if ($arrayFinal[$numAle][2]=="Heterosexual" || $arrayFinal[$numAle][2]=="Bisexual") {
                                    $pareja2[] = $arrayFinal[$numAle];
                                    $cont=1;
                                    $cont2=0;
                                } else {
                                    $cont2++;
                                }
                            } else {
                                $cont2++;
                            }
                        }
                        if ($cont2==$num) {
                            $cont=1;
                        }   
                    }
                    if ($cont2==$num) { //Controlamos si no se pueden hacer las parejas heterosexuales
                        echo "<h2>No se pueden hacer parejas heterosexuales con las personas introducidas</h2>";
                    } else { //En caso de poder, mostramos la pareja
                        echo "<h2>Pareja Heterosexual: ";
                        echo $pareja1[0][0]," y ",$pareja2[0][0],"</h2>";  
                    }  
                }
            }
            //ArrayFinal Homosexual
            if (isset($_REQUEST["homo"])) { //Si la pagina recibe un array de homosexuales
                $parejasFinal = $_GET["homo"];
                $arrayFinal = unserialize(base64_decode($parejasFinal)); //Cojemos el array
                $num = count($arrayFinal); //Vemos cuantos elementos tiene el array
                if ($num<=1) { //Si tiene uno o menos elementos
                    echo "<h2>No hay suficientes Homosexuales para hacer las parejas</h2>";
                } else { //Si tiene mas de un elemento
                    $cont=0;
                    while ($cont<1) { //Cojemos una persona Homosexual
                        $numAle = rand(0, count($arrayFinal)-1);
                        if ($arrayFinal[$numAle][2]=="Homosexual") {
                            $pareja1[] = $arrayFinal[$numAle];
                            $cont=1;
                        }
                    }
                    $cont=0;
                    $cont2=0;
                    while ($cont<1) { //Cojemos a la segunda persona para hacer la pareja
                        $numAle = rand(0, count($arrayFinal)-1);
                        if ($arrayFinal[$numAle][0]!=$pareja1[0][0]) { //Controlamos que sea una persona valida para hacer una pareja homosexual
                            if ($arrayFinal[$numAle][1]==$pareja1[0][1]) {
                                if ($arrayFinal[$numAle][2]==$pareja1[0][2]) {
                                    $pareja2[] = $arrayFinal[$numAle];
                                    $cont=1;
                                    $cont2=0;
                                } else {
                                    $cont2++;
                                }
                            } else {
                                $cont2++;
                            }
                        }
                        if ($cont2==$num) {
                            $cont=1;
                        }
                    }
                    if ($cont2==$num) { //Controlamos si no se pueden hacer las parejas homosexuales
                        echo "<h2>No se pueden hacer parejas homosexuales con las personas introducidas</h2>";
                    } else { //En caso de poder, mostramos la pareja
                        echo "<h2>Pareja Homosexual: ";
                        echo $pareja1[0][0]," y ",$pareja2[0][0],"</h2>"; 
                    }
                }
            }
            //ArrayFinal Bisexual
            if (isset($_REQUEST["bi"])) { //Si la pagina recibe un array de bisexuales
                $parejasFinal = $_GET["bi"];
                $arrayFinal = unserialize(base64_decode($parejasFinal)); //Cojemos el array
                $num = count($arrayFinal); //Vemos cuantos elementos tiene el array
                if ($num<=1) { //Si tiene uno o menos elementos
                    echo "<h2>No hay suficientes Bisexuales para hacer las parejas</h2>";
                } else { //Si tiene mas de un elemento
                    $cont=0;
                    while ($cont<1) { //Cojemos una persona Bisexual
                        $numAle = rand(0, count($arrayFinal)-1);
                        if ($arrayFinal[$numAle][2]=="Bisexual") {
                            $pareja1[] = $arrayFinal[$numAle];
                            $cont=1;
                        }
                    }
                    $cont=0;
                    $cont2=0;
                    while ($cont<1) { //Cojemos a la segunda persona para hacer la pareja
                        $numAle = rand(0, count($arrayFinal)-1);
                        if ($arrayFinal[$numAle][0]!=$pareja1[0][0]) { //Controlamos que sea una persona valida para hacer una pareja bisexual
                            if ($arrayFinal[$numAle][1]!=$pareja1[0][1] && ($arrayFinal[$numAle][2]=="Heterosexual" || $arrayFinal[$numAle][2]=="Bisexual")) {
                                $pareja2[] = $arrayFinal[$numAle];
                                $cont=1;
                                $cont2=0;
                            } else if ($arrayFinal[$numAle][1]==$pareja1[0][1] && ($arrayFinal[$numAle][2]=="Homosexual" || $arrayFinal[$numAle][2]=="Bisexual")) {
                                $pareja2[] = $arrayFinal[$numAle];
                                $cont=1;
                                $cont2=0;
                            } else {
                                $cont2++;
                            }
                        }
                        if ($cont2==($num*$num)+1) {
                            $cont=1;
                        }    
                    }
                    if ($cont2==($num*$num)+1) { //Controlamos si no se pueden hacer las parejas bisexuales
                        echo "<h2>No se pueden hacer parejas bisexuales con las personas introducidas</h2>";
                    } else { //En caso de poder, mostramos la pareja
                        echo "<h2>Pareja Bisexual: ";
                        echo $pareja1[0][0]," y ",$pareja2[0][0],"</h2>";  
                    } 
                }
            }
            if (!isset($_REQUEST["hetero"]) && !isset($_REQUEST["homo"]) && !isset($_REQUEST["bi"])) { //Si aun no se ha generado ninguna pareja
                echo "<h2>Pulse el botón de la pareja que quieras generar</h2>";
            }


            $texto = $_GET["oculto"]; //Cojemos el array en String
            $parejas = unserialize(base64_decode($texto)); //Transformamos el String a array
            //Array Heterosexual
            $indice = 0;
            $hetero = [];
            for ($i=0; $i < count($parejas); $i++) {  //Con un bucle anidado vamos guardando los heterosexuales en un array de hetero
                for ($j=0; $j < 3; $j++) { 
                    if ($parejas[$i][2]=="Heterosexual" || $parejas[$i][2]=="Bisexual") {
                        $hetero[$indice][$j] = $parejas[$i][$j];
                    }
                }
                if (isset($hetero[$indice])) {
                    $indice++;
                }
                
            }
            $heteroTexto = base64_encode(serialize($hetero)); //Pasamos el array a String
            //Array Homosexual
            $indice = 0;
            $homo = [];
            for ($i=0; $i < count($parejas); $i++) {  //Con un bucle anidado vamos guardando los homosexuales en un array de homo
                for ($j=0; $j < 3; $j++) { 
                    if ($parejas[$i][2]=="Homosexual") {
                        $homo[$indice][$j] = $parejas[$i][$j];
                    }
                }
                if (isset($homo[$indice])) {
                    $indice++;
                }
            }
            $homoTexto = base64_encode(serialize($homo)); //Pasamos el array a String
            //Array Bisexual
            $bi = [];
            for ($i=0; $i < count($parejas); $i++) { //Con un bucle anidado vamos guardando los bisexuales en un array de bi
                for ($j=0; $j < 3; $j++) { 
                    $bi[$i][$j] = $parejas[$i][$j]; 
                }
            }
            $biTexto = base64_encode(serialize($bi));//Pasamos el array a String


            //Pasamos los array como String a la página de generar parejas
            //Botón Pareja Heterosexual
            echo "<form action='Ej4_Parejas.php' method='get'>";
            echo "<input type='hidden' name='oculto' value=$texto>";
            echo "<input type='hidden' name='hetero' value=$heteroTexto>";
            echo "<input type='submit' class='boton' value='Generar Pareja Heterosexual'>";
            echo "</form> <br>";
            //Botón Pareja Homosexual
            echo "<form action='Ej4_Parejas.php' method='get'>";
            echo "<input type='hidden' name='oculto' value=$texto>";
            echo "<input type='hidden' name='homo' value=$homoTexto>";
            echo "<input type='submit' class='boton' value='Generar Pareja Homosexual'>";
            echo "</form> <br>";
            //Botón Pareja Bisexual
            echo "<form action='Ej4_Parejas.php' method='get'>";
            echo "<input type='hidden' name='oculto' value=$texto>";
            echo "<input type='hidden' name='bi' value=$biTexto>";
            echo "<input type='submit' class='boton' value='Generar Pareja Bisexual'>";
            echo "</form> <br>";
            echo "<a href='Ej4.php'>Volver a introducir los nombres</a>";
        } else { //Si no se ha introducido ninguna persona
            echo "<h1>No hay ninguna persona</h1>";
            echo "<a href='Ej4.php'>Volver para introducir los nombres</a>";
        }
    ?>

</body>

</html>