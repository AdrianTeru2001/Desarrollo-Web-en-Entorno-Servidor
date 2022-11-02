<!-- Ejercicio 1
Crear una página principal con un botón 'Añadir color' para generar un color aleatorio que además
se establecerá como color de fondo de la página, cada vez que se pulsa irá generando un color
nuevo (actualizando el fondo), que se irán almacenando en un array de sesión. Habrá un segundo
botón 'Mostrar paleta creada' que dirige a una segunda página que mostrará una paleta con los colores generados.
Esta paleta no es más que una tabla con un máximo de 5 celdas por cada fila, y en cada celda se muestra 
un color de los generados. Debajo de la tabla tendremos 2 botones uno para volver a la página principal
y seguir añadiendo colores a la paleta y otro para destruir la sesión y generar una paleta nueva.
Además al pulsar en cada celda de la tabla el color de fondo de la página cambiará al color de la celda pulsada. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<!-- Le vamos añadiendo el color al fondo según vayamos generando los colores de la paleta -->
<body style="background-color: rgb(<?php if (isset($_GET["v1"])){echo $_GET["v1"];} else{echo "255";} ?>, <?php if (isset($_GET["v2"])){echo $_GET["v2"];} else{echo "255";} ?>, <?php if (isset($_GET["v3"])){echo $_GET["v3"];} else{echo "255";} ?>);">
    
    <?php 
    
        //Controlamos el borrado de la paleta de colores según a que boton le demos en la pagina de la paleta de colores
        session_start();
        if (isset($_GET["destruir"])) {
            if ($_GET["destruir"]=="true") {
                session_destroy();
                session_start(); //Cuando destruyamos la sesion de la paleta hay que volver a iniciar la sesion
            }
        }
        
        if (isset($_SESSION["colores"])) {
            if (isset($_GET["v1"]) && isset($_GET["v2"]) && isset($_GET["v3"])) {
                $num1 = $_GET["v1"];
                $num2 = $_GET["v2"];
                $num3 = $_GET["v3"];  
                $_SESSION["colores"][] = "rgb($num1,$num2,$num3)"; //Guardamos el color en formato RGB para ponerlo de fondo
            } 
        } else {
            $_SESSION["colores"] = [];
        }
    
    ?>

    <h1>Crea tu paleta de colores</h1>

    <!-- Se generan los 3 valores del color RGB aleatoriamente de entre 0 y 255 y los mandamos a la misma pagina -->
    <form action="Ej1.php" method="get">
        <input type="hidden" name="v1" value=<?php echo rand(0,255); ?>>
        <input type="hidden" name="v2" value=<?php echo rand(0,255); ?>>
        <input type="hidden" name="v3" value=<?php echo rand(0,255); ?>>
        <input type="submit" value="Añadir Color">
    </form>
    <br>
    <form action="Ej1Paleta.php" method="get">
        <input type="submit" value="Mostrar Paleta Creada">
    </form>

</body>

</html>