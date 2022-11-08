<!-- Ejercicio 7
Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color) de una página. 
Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<!-- Aqui cambiamos el color del fondo cuando introduzcamos el color -->
<body style="background-color:<?php if (isset($_COOKIE["color"])){echo $_COOKIE["color"];} else{echo "#ffffff";} ?>;">
    
    <?php 
    
        if (isset($_GET["color"])) {
            $color = $_GET["color"]; //Cojemos el color del formulario
            setcookie("color", $color, time()+60*60); //Y lo metemos en la cookie 
            header("location: Ej7.php");
        }
    
    ?>

    <h1>Los kebab son la mejor comida del universo!!!!!</h1>
    <!-- Formulario para pedir el color del fondo de pantalla -->
    <form action="#" method="get">
        <input type="color" name="color"><br><br>
        <input type="submit" value="Cambiar Color del Fondo">
    </form>

</body>

</html>