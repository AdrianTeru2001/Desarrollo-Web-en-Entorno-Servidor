<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Acceso a la Página</title>
</head>

<body>
    
    <?php 
        include "controlAcceso.php"; //Incluimos la biblioteca con las funciones que utilizaremos

        //Cojemos todos los datos necesarios de la otra página
        $perfil = $_GET["perfil"];
        $fila = $_GET["fila"];
        $columna = $_GET["columna"];
        $numColumna = $_GET["numColumna"];
        $valor = $_GET["respuesta"];

        $matriz = dameTarjeta($perfil); //Generamos la matriz con la función "dameTarjeta()"
        $bandera = compruebaClave($matriz, $fila, $numColumna, $valor); //Comprobamos si hemos añadido el valor correcto o no con la función "compruebaClave()"
        
        //Mostramos todos los datos que pide el ejercicio
        echo "FILA: ",$fila-1,"<br>";
        echo "COLUMNA: ",$numColumna-1,"<br>";
        echo "VALOR: ",$valor,"<br>";
        echo "TARJETA: ",$matriz[$fila-1][$numColumna-1],"<br>";
        if ($bandera) { //Si el valor introducido es correcto, damos paso a la página web
            echo "Acceso Permitido <br>";
            echo "<a href='https://www.3djuegos.com/'><input type='button' value='CONTINUAR'></a>";
        } else { //Si el valor es incorrecto, mandamos de nuevo a la página principal para introducir la nueva clave
            echo "Clave incorrecta. Acceso Restringido <br>";
            echo "<a href='Ej2.php'><input type='button' value='VOLVER'></a>";
        }
    ?>

</body>

</html>