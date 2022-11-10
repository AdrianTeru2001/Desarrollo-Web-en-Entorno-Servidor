<!-- Ejercicio 8.
Crear una página que permita generar un archivo de texto con las líneas que se vallan escribiendo a través 
de un formulario de manera indefinida, hasta que se pulse un botón terminar, y a continuación mostrar el
contenido del fichero completo en la página. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    
    <?php 

        //Si mandamos texto a la página, metemos el texto mandado en el fichero
        if (isset($_GET["texto"])) {
            $ruta = "textoEjercicio.txt";
            $fp = fopen($ruta, "a");
            fwrite($fp, $_GET["texto"].PHP_EOL);
            echo "ESCRIBIENDO en el fichero ".$ruta.".....";
            fclose($fp);
        }

        //Mostrar contenido del fichero cuando pulsemos el boton de mostrar
        if (isset($_GET["mostrar"])) {
            $ruta = "textoEjercicio.txt";
            $fp = fopen($ruta, "r");
            while (!feof($fp)) {
                $linea = fgets($fp);
                echo $linea,"<br>";
            }
            fclose($fp);
        }

    ?>
    <br>
    <?php 
        //Mientras no se muestre el fichero vamos mostrando el textarea y los botones de enviar y mostrar
        if (!isset($_GET["mostrar"])) { ?>
            <form action="#" method="get">
                <textarea name="texto" cols="40" rows="10"></textarea><br>
                <input type="submit" value="Enviar">
            </form>
            <br>
            <form action="#" method="get">
                <input type="hidden" name="mostrar">
                <input type="submit" value="Terminar">
            </form>
       <?php } else { ?>
            <form action="#" method="get">
                <input type="submit" value="Volver a introducir palabras">
            </form>
       <?php } ?>

</body>

</html>