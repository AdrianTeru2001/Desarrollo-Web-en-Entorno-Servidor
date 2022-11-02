<!-- Ejercicio 2
Crear una página que simula una encuesta. Se realizará una pregunta, con dos botones para responder, 
cada vez que se pulse un botón se irán contabilizando (usa sesiones) los votos y actualizando una 
barra que muestre el número de votos de cada respuesta. Este resultado se irá almacenando también en una cookie,
de manera que si se cierra el navegador, al abrir la página de nuevo se mostrarán los resultados hasta 
el momento en que se cerró. Crear la cookie para 3 meses. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        form{
            float: left;
        }
        .form2{
            margin-left: 20px;
        }
    </style>
    <title>Ejercicio 2</title>
</head>

<body>
    
    <?php 
    
        if (isset($_COOKIE["siC"]) && isset($_COOKIE["noC"])) {
            //Pasamos a las sesiones el valor de las cookies
            $_SESSION["siS"] = intval($_COOKIE["siC"]);
            $_SESSION["noS"] = intval($_COOKIE["noC"]);
            if (isset($_GET["si"])) {
                $_SESSION["siS"]++;
                setcookie("siC", $_SESSION["siS"], time()+3*60*60*24*30); //Actualizamos la coockie si con el valor de la sesion si
                header("location: Ej2.php");
            } else if (isset($_GET["no"])) {
                $_SESSION["noS"]++;
                setcookie("noC", $_SESSION["noS"], time()+3*60*60*24*30); //Actualizamos la coockie no con el valor de la sesion no
                header("location: Ej2.php");
            }
        } else { //Si no están creadas las cookies, las creamos
            setcookie("siC", "0", time()+3*60*60*24*30);
            setcookie("noC", "0", time()+3*60*60*24*30);
            header("location: Ej2.php");
        }

    ?>

    <h1>¿Crees que los kebab son la mejor comida del universo?</h1>

    <?php 
    
        //Según los si y no que tengamos, mostramos X veces cada imagen al lado del respectivo si y no
        echo "<h3>SI &nbsp";
        for ($i=0; $i < $_SESSION["siS"]; $i++) { 
            echo " <img src='img/verde.png' width='20px'  height='20px'> ";
        }    
        echo "</h3>";
        echo "<h3>NO ";
        for ($i=0; $i < $_SESSION["noS"]; $i++) { 
            echo " <img src='img/rojo.png' width='20px'  height='20px'> ";
        } 
        echo "</h3>";
        echo "<br>";

    ?>

    <!-- Mediante dos formularios elegimos el si o el no -->
    <form action="Ej2.php" method="get" class="form1">
        <input type="hidden" name="si" value="si">
        <input type="submit" value="SI">
    </form>
    <form action="Ej2.php" method="get" class="form2">
        <input type="hidden" name="no" value="no">
        <input type="submit" value="NO">
    </form>

</body>

</html>