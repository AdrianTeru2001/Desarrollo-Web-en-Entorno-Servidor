<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Imagen Oculta</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["nombre"])) { //Si hemos introducido el nombre
            $nombre = $_GET["nombre"]; //Lo guardamos en una variable
            if (strtolower($nombre)=="gollum") { ?> <!-- Si tiene contenido y ha acertado, se dice que ha acertado y se le muestra la foto entera -->
                <h1><?php echo "Enhorabuena Has ganado, era ",$nombre,"."; ?></h1><br>
                <img src="../imagenes/gollum.jpg">
                <?php 
            } else { ?> <!-- Si tiene contenido pero no ha acertado, se le dice que ha fallado y se le da la opcion de jugar otra vez -->
                <?php 
                    $contIntentos = $_REQUEST["intentos"]; //Recojo el número de intentos que lleva el usuario
                    $junto = $_REQUEST["array"]; //Recojo el array transformado en String
                    $num = $_REQUEST["oculto"]; //Recojo el valor de la imagen oculta pulsada pulsado
                    $array = unserialize($junto); //Paso paso el string del array en un array
                    $array2 = []; //Inicializamos un arrary vacio
                    for ($i=1; $i <= 100; $i++) { //Lo rellenamos segun este la imagen oculta que hayamos pulsado
                        if ($i==$num && $array[$i]==0) {
                            $array2[$i] = 1;
                        } else {
                            $array2[$i] = $array[$i];
                        }
                    }
                    $junto = serialize($array2); //Pasamos el array a String
                    echo "<h1>Has fallado, no era $nombre.</h1><br>";
                    echo "<h3><a href='Ej3.php?array=$junto&intentos=$contIntentos'>Volver para intentarlo de nuevo</a></h3>"; //Pasamos todos los valores a la página principal
            }
        }
    ?>

</body>

</html>