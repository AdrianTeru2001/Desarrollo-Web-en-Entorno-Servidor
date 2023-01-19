<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Recetas Random</title>
</head>

<style>
    /* Estilos generales */
    *{
        background-color: lightgray;
    }
    body{
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    /* Contenedor con el contenido de la receta */
    .container{
        width: 60%;
        height: 60%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: 1fr 40%;
    }
    img{
        width: 600px;
        height: 600px;
        margin-top: 50px;
    }
    .comida{ /* Imagen y nombre de la comida */
        text-align: center;
        grid-column: 1/2;
        grid-row: 1/2;
    }
    .ingred{ /* Ingredientes */
        margin: auto;
        text-align: center;
        grid-column: 2/3;
        grid-row: 1/2;
    }
    .instruc{ /* Instrucciones */
        text-align: center;
        grid-column: 1/3;
        grid-row: 2/3;
    }

    /* Botones para el control de la pagina */
    .boton{
        width: 250px;
        height: 40px;
        text-decoration: none;
        color: white;
        background-color: lightslategray;
        text-align: center;
        line-height: 40px;
        border-radius: 10px;
        font-size: 20px;
    }
    .boton:hover{
        box-shadow: 1px 1px 4px black;
    }
    .botonVolver{
        width: 120px;
        height: 20px;
        margin-top: 20px;
        margin-bottom: 4px;
        text-decoration: none;
        color: white;
        background-color: lightslategray;
        text-align: center;
        line-height: 20px;
        border-radius: 10px;
        font-size: 15px;
    }
    .botonVolver:hover{
        box-shadow: 1px 1px 4px black;
    }
</style>

<body>

    <!-- Titulo y botones -->
    <h1>Pulse el botón para generar una receta de cocina</h1>
    <a href="random.php?generar" class="boton">Generar receta de cocina</a>
    <a href="inicio.php" class="botonVolver">Volver al Inicio</a>

    <?php

        if (isset($_GET["generar"])) {
            //Hacemos la peticion de datos al servidor de la api y le hacemos el json_decode
            $datos = file_get_contents("https://www.themealdb.com/api/json/v1/1/random.php");
            $receta = json_decode($datos);
            //Vamos estructurando el contenido para mostrar la imagen, los ingredientes y las instrucciones de la receta
            echo "<div class='container'><div class='comida'><img src='".$receta->meals[0]->strMealThumb."' alt='".$receta->meals[0]->strMeal."'><br>";
            echo "<h1>".$receta->meals[0]->strMeal."</h1></div>";
            echo "<div class='ingred'><h1>Ingredientes:</h1>";
            for ($i=1; $i <= 20; $i++) { 
                $ingrediente = "strIngredient".$i;
                if ($receta->meals[0]->$ingrediente!=null && $receta->meals[0]->$ingrediente!="") {
                    echo "<strong>".$receta->meals[0]->$ingrediente."</strong><br>";
                }
            }
            echo "</div><div class='instruc'><h1>Instrucciones: </h1>".$receta->meals[0]->strInstructions."</div></div>";
        }
        
    ?>

</body>

</html>