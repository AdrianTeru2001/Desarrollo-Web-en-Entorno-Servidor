<!-- Ejercicio 11.
Escribir una clase que lea n caracteres que forman un número romano y que imprima:
a. si la entrada fue correcta, un string que represente el equivalente decimal
b. si la entrada fue errónea, un mensaje de error.
Nota: La entrada será correcta si contiene solo los caracteres M:1000, D:500, C:100, L:50, X:10, I:1. 
No se tendrá en cuenta el orden solo se sumará el valor de cada letra. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11 - Número Romano</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["numero"])) { //Si el numero romano se ha introducido
            $bandera = true; //Inicializamos una bandera a true
            $numeroDecimal = 0; //Inicializamos las variables que nos vayan a hacer falta
            $numeroString = "";
            $numero = trim($_GET["numero"]); //Pasamos el numero romano a una variable
            $arrayCaracter = str_split($numero); //Dividimos el numero romano y lo metemos en un array
            for ($i=0; $i < count($arrayCaracter); $i++) { //Comprobamos en el if si los valores introducidos son los validos
                if (strtoupper($arrayCaracter[$i])!="M" && strtoupper($arrayCaracter[$i])!="D" && strtoupper($arrayCaracter[$i])!="C" && strtoupper($arrayCaracter[$i])!="L" && strtoupper($arrayCaracter[$i])!="X" && strtoupper($arrayCaracter[$i])!="I") {
                    $bandera = false; //En caso de que algun valor no sea el valido, ponemos la bandera a false
                    $i = count($arrayCaracter); //Y forzamos la finalización del array
                } else {
                    switch (strtoupper($arrayCaracter[$i])) { //Con un switch vemos que valor hemos introducido, cuanto vale y lo sumamos al total
                        case 'M':
                            $numeroDecimal = $numeroDecimal+1000;
                            break;
                        case 'D':
                            $numeroDecimal = $numeroDecimal+500;
                            break;
                        case 'C':
                            $numeroDecimal = $numeroDecimal+100;
                            break;
                        case 'L':
                            $numeroDecimal = $numeroDecimal+50;
                            break;
                        case 'X':
                            $numeroDecimal = $numeroDecimal+10;
                            break;
                        case 'I':
                            $numeroDecimal = $numeroDecimal+1;
                            break;
                        
                        default:
                            break;
                    }    
                }
                
            }
            if ($bandera) { //Si la bandera está a true
                $numeroString = strval($numeroDecimal); //Pasamos el número a string
                echo "Número romano -> ",$numero,"<br><br>"; //Imprimimos el número romano
                echo "Número decimal -> ",$numeroString,"<br><br>"; //Imprimimos el número decimal
            } else { //Si está a false, imprimimos un mensaje de error
                echo "Error!!! Introduce bien el número romano";
            }
        } else { //Si no se ha introducido el numero romano decimos que se tiene que introducir
            echo "Introduce un número romano";
        }
        echo "<br><br>";
    ?>

    <form action="Ej11.php" method="get"> <!-- Mandamos el numero romano a esta misma página -->
        Introduzca un número romano (Todo junto y con las letras indicadas) <input type="text" name="numero" required>
        <input type="submit" value="Comprobar Palabra">
    </form>

</body>

</html>