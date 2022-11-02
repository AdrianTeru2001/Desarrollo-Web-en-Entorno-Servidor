<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Paleta</title>
</head>

<!-- Le vamos añadiendo el color al fondo según vayamos generando los colores de la paleta -->
<body style="background-color:<?php if (isset($_GET["color"])){echo $_GET["color"];} else{echo "rgb(255,255,255)";} ?>;"> 
    
    <h1>Paleta de Colores Generada: </h1>

    <?php

        session_start(); 
        $cont = 0;
        //Creamos la tabla con un bucle, donde cada celda tiene el color de fondo de uno de los colores de la paleta y un enlace
        //que ocupará toda la celda que al pulsarlo se pondrá el color del fondo de la celda
        echo "<table> <tr>";
        for ($i=0; $i < count($_SESSION["colores"]); $i++) { 
            if ($cont==5) {
                echo "</tr><tr>";
                $cont = 0;
            }
            $col = $_SESSION["colores"][$i];
            $enlace = "<a href='Ej1Paleta.php?color=$col'><div style='width: 100px; height: 100px;'></div></a>";
            echo "<td style='width: 100px; height: 100px; background-color: ",$_SESSION['colores'][$i],";'>$enlace</td>";
            $cont++;
        }
        if ($cont>0 && $cont<5) {
            echo "</tr>";
        }
        echo "</table>";

    ?>

    <!-- Un botón para volver a la pagina principal para seguir añadiendo colores y otro para borrar la paleta y crear otra nueva -->
    <br>
    <form action="Ej1.php" method="get">
        <input type="submit" value="Volver a la página principal">
    </form>
    <br>
    <form action="Ej1.php" method="get">
        <input type="hidden" name="destruir" value="true">
        <input type="submit" value="Borrar la paleta para crear una nueva">
    </form>

</body>

</html>