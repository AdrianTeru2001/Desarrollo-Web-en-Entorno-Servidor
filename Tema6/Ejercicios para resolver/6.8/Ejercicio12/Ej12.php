<!-- Ejercicio 12.
Escribir un programa que dado un texto de un telegrama que termina en punto:
a. contar la cantidad de palabras que posean más de 10 letras
b. reportar la cantidad de veces que aparece cada vocal
c. reportar el porcentaje de espacios en blanco.
d. Nota: Las palabras están separadas por un espacio en blanco. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
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

                //Contar cuantas palabras tienen mas de 10 letras
                $contmas10 = 0;
                $arrayPalabras = explode(" ", $textoModificado); //Pasamos a un array palabra por palabra
                for ($i=0; $i < count($arrayPalabras); $i++) { 
                    if (strlen($arrayPalabras[$i])>10) { //Si la palbra tiene mas de 10 letras
                        $contmas10++; //Sumamos 1 al contador de palabras
                    }
                }
                echo "Cantidad de palabras que poseen mas de 10 letas -> ",$contmas10,"<br><br>";

                //Contar cantidad de veces que aparece cada vocal
                $contA = 0;
                $contE = 0;
                $contI = 0;
                $contO = 0;
                $contU = 0;
                for ($i=0; $i < count($arrayCaracteres); $i++) { 
                    switch (strtolower($arrayCaracteres[$i])) { //Con un switch comprobamos si el caracter introducido es una vocal, y si es, sumamos 1 al contador de dicha vocal
                        case 'a':
                            $contA++;
                            break;
                        case 'e':
                            $contE++;
                            break;
                        case 'i':
                            $contI++;
                            break;
                        case 'o':
                            $contO++;
                            break;
                        case 'u':
                            $contU++;
                            break;
                        
                        default:
                            break;
                    }
                }
                echo "Cantidad de veces que aparecen cada vocal: <br>";
                echo "A -> ",$contA,"<br>";
                echo "E -> ",$contE,"<br>";
                echo "I -> ",$contI,"<br>";
                echo "O -> ",$contO,"<br>";
                echo "U -> ",$contU,"<br><br>";

                //Contar porcentaje de espacios en blanco
                $contBlanco = 0;
                for ($i=0; $i < count($arrayCaracteres); $i++) { 
                    if ($arrayCaracteres[$i]==" ") { //Si el caracter es un espacio en blanco
                        $contBlanco++; //Sumamos 1 al contador de espacios en blanco
                    }
                }
                $espaciosTotal = round(($contBlanco/(count($arrayPalabras)+$contBlanco))*100,2); //Hacemos el porcentaje de espacios en blanco segun catacteres tenga el texto
                echo "Porcentaje de espacios en blanco -> ",$espaciosTotal," % <br><br>";  

            } else { //Si el texto no acaba en punto, le decimos que el texto tiene que acabar en punto
                echo "El texto tiene que acabar en punto";
            }
            
        } else { //Si no se ha introducido el texto, decimos que lo introduzca
            echo "Introduce un texto que acabe en punto";
        }
        
    ?>

    <form action="Ej12.php" method="get"> <!-- Mandamos el numero romano a esta misma página -->
        <br><textarea name="texto" rows="10" cols="50"></textarea><br>
        <input type="submit" value="Comprobar Palabra">
    </form>

</body>

</html>