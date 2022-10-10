<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombres Aleatorio</title>
</head>

<body>
    
    <?php
        //Variables
        $numCont = $_GET["num"];
        $nombres = $_GET["names"];
        if ($numCont==0) { //Pasar a un array todos los nombres
            $nombresArray = explode(",",$nombres);    
        } else {
            $nombresArray = unserialize($nombres);
        }
        //Controlamos si en el array aun quedan elementos o no
        if (count($nombresArray)>0) {
            //En este foreach vamos quitando los espacios de delante y detras a los elementos y borrando los elementos que no tengan nada
            foreach ($nombresArray as $elemento) {
                $elemento = trim($elemento);
                if ($elemento=="") {
                    unset($elemento);
                }
            }
            //Con un rand vamos seleccionando a los alumnos de manera aleatoria y mostrandolos
            $random = rand(0, count($nombresArray)-1);
            echo "<h2>Alumno Seleccionado -> ",$nombresArray[$random],"</h2>";
            unset($nombresArray[$random]);  //Cuando se muestre un alumno se borra el elemento del array 
            $nombresArray = array_values($nombresArray); //Y ordenamos el array
            //Pasamos a string la variable para poder pasarla a la otra pagina
            $nombresMod = serialize($nombresArray);
            //Con el form pasamos el array y una variable, para controlar el ejercicio, a la misma pagina llamandola
            echo "<form action='#' method='get'>";
            echo "<input type='hidden' name='names' value='$nombresMod'>";
            echo "<input type='hidden' name='num' value=1>";
            echo "<input type='submit' value='Generar Otro Alumno'>";
            echo "</form><br>";
            //Botón para salir de la selección de alumnos para volver a la pagina principal
            echo "<form action='Ej_Aleatorio.php' method='get'>";
            echo "<input type='submit' value='Salir'>";
            echo "</form>";
        } else { //Si el array no contiene nada, decimos que no quedan alumnos y damos la opcion de volverlos a añadir
            echo "<h2>No quedan mas alumnos</h2>";
            echo "<form action='Ej_Aleatorio.php' method='get'>";
            echo "<input type='submit' value='Volver a añadir los alumnos'>";
            echo "</form>"; 
        }
    ?>   

</body>

</html>