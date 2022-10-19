<!-- Ejercicio 13.
Escribir un programa que dado un texto que finaliza en punto, se pide:
a. la posición inicial de la palabra más larga y su longitud
b. cuantas palabras con una longitud entre 8 y 16 caracteres poseen más de tres veces la vocal “a”
Nota:
1.- Las palabras pueden estar separadas por uno o más espacios en blanco.
2.- Puede haber varios espacios en blanco antes de la primera palabra y también después de la última.
3.- Se considera que una palabra finaliza cuando se encuentra un espacio en blanco o un signo de puntuación. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>

<body>
    
    <?php 
    
        if (isset($_GET["texto"])) {

            $texto = $_GET["texto"]; //Recogemos el texto en una variable
            $arrayCaracteres = str_split($texto); //Pasar la frase a un array de caracteres

            if ($arrayCaracteres[count($arrayCaracteres)-1]==".") {

                echo "Texto -> ",$texto,"<br><br>";
                //Quitar signos de puntuación y caracteres vacios
                for ($i=0; $i < count($arrayCaracteres); $i++) { //Vamos viendo si el caracter es "." "," ":" ";" o está vacío
                    if ($arrayCaracteres[$i]=="" || ord($arrayCaracteres[$i])==44 || ord($arrayCaracteres[$i])==46 || ord($arrayCaracteres[$i])==58 || ord($arrayCaracteres[$i])==59) {
                        unset($arrayCaracteres[$i]); //En caso de serlo, se elimina
                        $arrayCaracteres = array_values($arrayCaracteres); //Se ordena el array
                        $i=-1; //Se vuelve a empezar el bucle
                    }
                }

                //Obtener texto sin signos de puntuación
                $textoModificado = "";
                for ($i=0; $i < count($arrayCaracteres); $i++) {  
                    $textoModificado = $textoModificado.$arrayCaracteres[$i]; //Pasamos los caracteres a texto, ya sin signos de puntuación
                }

                $arrayPalabras = explode(" ", $textoModificado); //Pasamos a un array palabra por palabra

                //Conseguir la posición inicial y la longitud de la palabra mas larga
                $longPalabra = 0;
                for ($i=0; $i < count($arrayPalabras); $i++) { 
                    if (strlen($arrayPalabras[$i])>$longPalabra) { //Si la palabra del array es mas larga que la de la variable
                        $longPalabra = strlen($arrayPalabras[$i]); //Se pasa le cambia la longitud a la variable
                        $palabraLarga = $arrayPalabras[$i]; //Y se cambia la palabra mas larga anterior por la nueva
                    }
                }
                $posPalabraLarga = mb_stripos($texto, $palabraLarga); //Se ve ne que posición del texto se encuentra la palabra
                echo "La palabra mas larga es <strong>",$palabraLarga,"</strong> se encuentra en la posicion ",$posPalabraLarga," y tiene una longitud de ",$longPalabra," carácteres.<br><br>";

                //Conseguir cuantas palabras con longitud entre 8 y 18 carácteres poseen más de tres veces la vocal “a”
                $contPalabras = 0;
                for ($i=0; $i < count($arrayPalabras); $i++) { 
                    if (strlen($arrayPalabras[$i])>=8 && strlen($arrayPalabras[$i])<=18) { //Si la palabra tiene entre 8 y 18 caracteres
                        $arrayPal = str_split($arrayPalabras[$i]); //Pasamos los caracteres de la palabra a un array
                        $conta = 0;
                        for ($j=0; $j < count($arrayPal); $j++) { 
                            if (strtolower($arrayPal[$j])=="a") { //Comparamos todos los caracteres y si alguno es una "a", sumamos 1 al contador de las "a"
                                $conta++;
                            }
                        }
                        if ($conta>3) { //Si la palabra tiene mas de 3 "a"
                            $contPalabras++; //Sumamos 1 al contador de las palabras que tienen mas de 3 "a"
                        }
                    }
                }
                echo "Hay un total de ",$contPalabras," palabras con longitud de entre 8 y 18 carácteres y que contienen mas de tres veces la vocal 'a'<br><br>";
            
            } else { //Si el texto no acaba en punto, le decimos que el texto tiene que acabar en punto
                echo "El texto tiene que acabar en punto";
            }
            
        } else { //Si no se ha introducido el texto, decimos que lo introduzca
            echo "Introduce un texto que acabe en punto";
        }

    ?>
    
    <form action="Ej13.php" method="get"> <!-- Mandamos el numero romano a esta misma página -->
        <br><textarea name="texto" rows="10" cols="50"></textarea><br>
        <input type="submit" value="Comprobar Palabra">
    </form>

</body>

</html>