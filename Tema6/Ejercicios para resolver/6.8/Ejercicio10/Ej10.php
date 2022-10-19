<!-- Ejercicio 10.
Escribir un programa que pida un nombre (con sus apellidos) y escriba en pantalla 
tanto el nombre con las primeras letras en mayúsculas como las iniciales de dicho nombre. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10 - Nombre</title>
</head>

<body>
    
    <?php 
        if (isset($_GET["nombre"])) { //Si el nombre se ha introducido
            $iniciales = "";
            $nombre = trim($_GET["nombre"]); //Pasamos el nombre a una variable
            $arrayNombre = explode(" ",$nombre); //Dividimos el nombre y lo metemos en un array
            for ($i=0; $i < count($arrayNombre); $i++) { 
                if ($arrayNombre[$i]=="") { //Si un elemento del array está vacio
                    unset($arrayNombre[$i]); //Lo eliminamos
                    $arrayNombre = array_values($arrayNombre); //Ordenamos el array
                    $i=-1; //Empezamos de nuevo el bucle
                }
            }
            echo "Nombre introducido -> ",$nombre,"<br><br>";
            echo "Nombre corregido -> ";
            for ($i=0; $i < count($arrayNombre); $i++) { 
                echo ucfirst($arrayNombre[$i])," "; //Ponemos en mayuscula la primera letra de cada palabra del nombre y lo mostramos
                $iniciales = $iniciales.strtoupper(substr($arrayNombre[$i],0,1)); //Guardamos en una variable cada inicial del nombre
            }
            echo $iniciales; //Mostramos las variables
        } else { //Si no se ha introducido el nombre decimos que se tiene que introducir
            echo "Introduce un nombre completo para invertirla";
        }
        echo "<br><br>";
    ?>

    <form action="Ej10.php" method="get"> <!-- Mandamos el nombre a esta misma página -->
        Introduzca un nombre completo <input type="text" name="nombre" required>
        <input type="submit" value="Comprobar Palabra">
    </form>

</body>

</html>