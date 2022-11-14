<!-- Ejercicio 2.
Diseñar una página que muestre un cuadro ‘select’ con todas las fechas disponibles en el fichero del ejercicio anterior, 
de manera que al seleccionar y enviar una fecha, se cargue en un array de sesión las mascotas almacenadas en la fecha 
seleccionada y las muestre en una tabla.
La opción de elegir una fecha siempre estará disponible para poder mostrar las mascotas de la fecha que interese, es decir 
que se puede ir cambiando de fecha y se actualizan los datos de la tabla.
Nota: al leer una línea de un fichero se añaden espacios al principio o al final, así que para hacer comparaciones debes 
asegurarte de quitar esos espacios. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        table{
            border: 1px solid black;
            text-align: center;
        }
        td,tr{
            border: 1px solid black;
        }
    </style>
    <title>Ejercicio 2</title>
</head>

<body>
    
    <?php 

        $contFecha = -1;
        $fp = fopen("../Ejercicio1/mascotas.txt", "r");
        while (!feof($fp)) {
            $linea = trim(fgets($fp));
            if ($linea !== "") {
                if (strpos($linea, "#") !== false) { //Si la palabra contiene una almohadilla
                    $contFecha++;
                    $_SESSION["fechas"][$contFecha] = str_replace("#", "", $linea); //Guardamos la fecha sin las almohadillas
                } else {
                    $anim = explode("-", $linea); //Pasamos la cadena a un array dividido por guion "-"
                    $_SESSION["animales"][$anim[0]] = [$anim[1], $anim[2], $_SESSION["fechas"][$contFecha]]; //Pasamos los datos de los animales a un array
                }    
            }
            
        }
        fclose($fp);

    ?>

    La fecha de hoy es <?php echo date("d-m-Y", time()); ?>
    <?php 
        //Creamos la tabla pasandole solo los animales de la fecha que hemos elejido
        if (isset($_GET["fechas"])) {
            echo "<table>";
            echo "<tr><td colspan='3'><strong>FECHA: #",$_GET["fechas"],"#</strong></td></tr>";
            echo "<tr><td><strong>Nombre</strong></td><td><strong>Animal</strong></td><td><strong>Edad</strong></td></tr>";
            $nomAnimales = array_keys($_SESSION["animales"]);
            for ($i=0; $i < count($_SESSION["animales"]); $i++) { 
                if ($_SESSION['animales'][$nomAnimales[$i]][2] == $_GET["fechas"]) {
                    echo "<tr>";
                    echo "<td>",$nomAnimales[$i],"</td>";
                    echo "<td>",$_SESSION['animales'][$nomAnimales[$i]][0],"</td>";
                    echo "<td>",$_SESSION['animales'][$nomAnimales[$i]][1],"</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
    ?>

    <br><br>
    
    <?php
        if (isset($_SESSION["fechas"])) {
            echo "<form action='Ej2.php' method='get'>";
            echo "Fecha de inscripción mascotas: <select name='fechas'>";
            for ($i=0; $i < count($_SESSION["fechas"]); $i++) { 
                echo "<option value='",$_SESSION["fechas"][$i],"'>",$_SESSION["fechas"][$i],"</option>";
            }
            echo "</select>\n";
            echo "<input type='submit' value='Cargar MASCOTAS'>";
            echo "</form>";
        } else {
            echo "No existen fechas con animales en el fichero";
        }
    ?>
</body>

</html>