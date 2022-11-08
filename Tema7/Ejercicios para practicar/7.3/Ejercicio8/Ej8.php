<!-- Ejercicio 8
Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario.
El programa pedirá que el usuario teclee la traducción al español de cada una de las palabras
y comprobará si son correctas. Al final, el programa deberá mostrar cuántas respuestas son 
válidas y cuántas erróneas. La aplicación debe tener una opción para introducir los pares de 
palabras (inglés - español) que se deben guardar en cookies; de esta forma, si de vez en cuando se
dan de alta nuevas palabras, la aplicación puede llegar a contar con un número considerable de 
entradas en el mini-diccionario. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    
    <h1>Traducir Palabras al Español</h1>

    <?php 
    
        //Generamos el diccionario de palabras en caso de que no exista
        if (!isset($_COOKIE["diccionario"])) {
            $dic = ["Hello" => "Hola", "Dog" => "Perro", "House" => "Casa", "Ball" => "Pelota", "Car" => "Coche", 
                "Cat" => "Gato", "Chocolate" => "Chocolate", "Plane" => "Avion", "Earth" => "Tierra", "Fish" => "Pescado"];
            $dicString = serialize($dic);
            setcookie("diccionario", $dicString, time()+24*60*60*60);
            header("location: Ej8.php");
        }

        //Generamos las 5 palabras aleatorias para el ejercicio
        if (isset($_GET["generar"])) {
            $dicString2 = $_COOKIE["diccionario"];
            $dic2 = unserialize($dicString2);
            $claves = array_keys($dic2);
            $clavesString = serialize($claves);
            $usados = [];
            for ($i=0; $i < 5; $i++) { 
                $cont = 1;
                while ($cont!=0) {
                    $cont = 1;
                    $ale = rand(0,count($claves)-1);
                    for ($i=0; $i < count($usados); $i++) { 
                        if ($ale == $usados[$i]) {
                            $cont++;
                        }
                    }  
                    if ($cont==1) {
                        $cont = 0;
                    }  
                }
                $usados[] = $ale;
            }
            $usadosString = serialize($usados);
            setcookie("usadosS", $usadosString, time()+24*60*60*60);
            setcookie("clavesS", $clavesString, time()+24*60*60*60);
            header("location: Ej8.php?mostrar=");
        }

        //Mostramos las 5 palabras aleatorias y creamos las 5 cajas de texto para introducir sus traducciones
        if (isset($_GET["mostrar"])) {
            $dic = unserialize($_COOKIE["diccionario"]);
            $usados = unserialize($_COOKIE["usadosS"]);
            $claves = unserialize($_COOKIE["clavesS"]);
            echo "<h3>Escribe las traducciones de las palabras al español</h3>";
            echo "<form action='Ej8.php' method='get'>";
            for ($i=0; $i < count($usados); $i++) { 
                echo $claves[$usados[$i]]," -> ";
                echo "<input type='text' name='p$i' required><br>";
            }
            echo "<br><input type='submit' value='Enviar Palabras'><br><br>";
            echo "</form>";
        }

        //Comprobar que las palabras introducidas sea correctas
        if (isset($_GET["p0"])) {
            $dic = unserialize($_COOKIE["diccionario"]);
            $usados = unserialize($_COOKIE["usadosS"]);
            $claves = unserialize($_COOKIE["clavesS"]);
            $cont = 0;
            for ($i=0; $i < count($usados); $i++) { 
                if (strtolower($dic[$claves[$usados[$i]]])==strtolower($_GET["p$i"])) {
                    echo "(",$dic[$claves[$usados[$i]]]," = ",$_GET["p$i"],") CORRECTO<br>";
                    $cont++;
                } else {
                    echo "(",$dic[$claves[$usados[$i]]]," X ",$_GET["p$i"],") INCORRECTO<br>";
                }
            }
            if ($cont==5) {
                echo "<br>Enhorabuena, Has acertado todas las palabras <br><br>";
            } else {
                echo "<br>Has acertado ",$cont," palabras y has fallado ",(5-$cont)," palabras <br><br>";
            }
        }

        //Añadir palabras al diccionario
        if (isset($_GET["anadir"])) {
            echo "<h3>Escribe la palabra que quieras traducir en ingles y en español</h3>";
            echo "<form action='Ej8.php' method='get'>";
            echo "Palabra en Inglés -> <input type='text' name='pIngles' required><br>";
            echo "Traducción al Español -> <input type='text' name='pEspanol' required><br><br>";
            echo "<input type='submit' value='Añadir Palabra'><br><br>";
            echo "</form>";
        }

        if (isset($_GET["pEspanol"])) {
            $dic = unserialize($_COOKIE["diccionario"]);
            if (isset($dic[$_GET["pIngles"]])) {
                echo "La palabra que quieres añadir ya existe en el diccionario";
            } else {
                $dic[$_GET["pIngles"]] = $_GET["pEspanol"];
                $dicString = serialize($dic);
                setcookie("diccionario", $dicString, time()+24*60*60*60);  
                header("location: Ej8.php?anadida=");  
            }
        }

        if (isset($_GET["anadida"])) {
            echo "Palabra añadida correctamente al diccionario<br><br>";
        }

    ?>

    <form action="Ej8.php" method="get">
        <input type="hidden" name="generar">
        <input type="submit" value="Generar 5 palabras">
    </form>
    <br>
    <form action="Ej8.php" method="get">
        <input type="hidden" name="anadir">
        <input type="submit" value="Añadir Palabra">
    </form>

</body>

</html>