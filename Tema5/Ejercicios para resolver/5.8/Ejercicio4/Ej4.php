<!-- Ejercicio 4
Vamos a realizar una página para generar parejas aleatorias según su sexo y orientación sexual.
Para ello en una primera página pediremos de manera reiterada el nombre, sexo (h o m) y
orientación (heterosexual, homosexual o bisexual) de personas, que se irán almacenando en un array.
Se dispondrá además, de un botón para pasar a la segunda página que permite generar las parejas aleatorias 
con las personas introducidas. Esta segunda página debe contener tres botones para generar una pareja aleatoria de los siguientes tipos:
-Heterosexual: Obtendrá aleatoriamente una primera persona de cualquier sexo y orientación heterosexual, 
que unirá con una segunda persona de distinto sexo que sea heterosexual o bisexual.
-Homosexual: Obtendrá aleatoriamente una primera persona de cualquier sexo y orientación homosexual, que unirá con otra persona del mismo sexo y orientación.
-Bisexual: Obtendrá aleatoriamente una primera persona de cualquier sexto y orientación bisexual, 
que unirá con otra persona que sea compatible, el perfil incompatible sería homosexual de distinto sexo o heterosexual del mismo sexo. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{
            text-align: center;
        }
        fieldset{
            width: 500px;
            margin: auto;
        }
    </style>
    <title>Ejercicio 4 - Test de Parejas</title>
</head>

<body>
    
    <?php //Vamos cojiendo el array de la pagina donde controlamos todo el array
        if (isset($_REQUEST["array"])) {
            $junto = $_REQUEST["array"];
        } else {
            $junto = "";
        }
    ?>

    <h1>Cupido ha llegado a la web</h1>
    <form action="Ej4_Controlar.php" method="get"> <!-- Hacemos un formulario donde pedimos el nombre, el sexo y la orientación sexual de una persona -->
        <fieldset>
            <legend>Añadir personas a la Base de datos</legend>
            <br>
            <strong>NOMBRE</strong>
            <input type="text" name="nombre">
            <hr>
            <strong>SEXO</strong>
            <input type="radio" id="hombre" name="sexo" value="Hombre" required>
            <label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="Mujer">
            <label for="mujer">Mujer</label>
            <hr>
            <strong>ORIENTACIÓN</strong>
            <input type="radio" id="hetero" name="orientacion" value="Heterosexual" required>
            <label for="hetero">Heterosexual</label>
            <input type="radio" id="homo" name="orientacion" value="Homosexual">
            <label for="homo">Homosexual</label>
            <input type="radio" id="bis" name="orientacion" value="Bisexual">
            <label for="bis">Bisexual</label>
            <hr>
            <input type="hidden" name="oculto" value="<?php echo $junto ?>"> <!-- Pasamos el String del array de todas las personas a la pagina donde lo controlamos todo -->
            <input type="submit" value="AÑADIR PERSONA">
            <br><br>
        </fieldset>
    </form>
    <br><br>
    
    <form action="Ej4_Parejas.php" method="get"> <!-- Con este formulario podemos ir a la página donde generaremos las parejas -->
        <fieldset>
            <br>
            <legend>Pasar a generar parejas amorosas</legend>
            <input type="hidden" name="oculto" value="<?php echo $junto ?>"> <!-- Pasamos a la pagina de las parejas el String del array para poder tener todas las parejas -->
            <input type="submit" value="CUPIDO ENTRA EN ACCIÓN"> 
            <br><br>
        </fieldset>
    </form>

</body>

</html>