<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-$num">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Recetas Según Nombre</title>
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
        margin-top: 20px;
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
    .control{
        width: 150px;
        height: 100px;
        display: flex;
        justify-content: space-around;
    }
    .enlace{
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-decoration: none;
        color: white;
        text-align: center;
        margin-top: 10px;
        font-size: 30px;
    }
    .boton{
        background-color: lightslategray;
        border-radius: 10px;
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
    <h1>Ingrese un nombre para generar otras recetas:</h1>
    <form action="cadena.php">
        <strong>Nombre:</strong> <input type="text" name="cadena">
        <input type="submit" value="Generar">
    </form>
    <a href="inicio.php" class="botonVolver">Volver al Inicio</a>

    <?php

        if (isset($_GET["cadena"])) {
            //Hacemos la peticion de datos al servidor de la api y le hacemos el json_decode
            $nombre = $_GET["cadena"];
            $datos = file_get_contents("https://www.themealdb.com/api/json/v1/1/search.php?s=$nombre");
            $receta = json_decode($datos);
            if ($receta->meals!=null) {
                if (!isset($_GET["num"])) {
                    $num = 0;
                } else {
                    $num = $_GET["num"];
                }
                //Si retrocedemos o avanzamos en la recetas mas de la cuenta, advertimos que no se puede
                if ($num<0) {
                    $num = 0;
                    echo "<h2>No puedes retroceder más</h2>";
                } else if ($num>=count($receta->meals)) {
                    $num = count($receta->meals)-1;
                    echo "<h2>No puedes avanzar más</h2>";
                }
                //Vamos controlando si hay mas de una receta
                if (count($receta->meals)==1) { //Si solo hay una receta no ponemos botones
                    $num = 0;
                } else if (count($receta->meals)>1){ //Si hay mas de una receta, ponemos dos botones para avanzar o retroceder en las recetas
                    $atras = $num - 1;
                    echo "<div class='control'><a href='cadena.php?cadena=$nombre&num=$atras' class='enlace'><div class='boton'><</div></a>";
                    $avanzar = $num + 1;
                    echo "<a href='cadena.php?cadena=$nombre&num=$avanzar' class='enlace'><div class='boton'>></div></a></div>";
                }
                //Vamos estructurando el contenido para mostrar la imagen, los ingredientes y las instrucciones de la receta
                echo "<div class='container'><div class='comida'><img src='".$receta->meals[$num]->strMealThumb."' alt='".$receta->meals[$num]->strMeal."'><br>";
                echo "<h1>".$receta->meals[$num]->strMeal."</h1></div>";
                echo "<div class='ingred'><h1>Ingredientes:</h1>";
                for ($i=1; $i <= 20; $i++) { 
                    $ingrediente = "strIngredient".$i;
                    if ($receta->meals[$num]->$ingrediente!=null && $receta->meals[$num]->$ingrediente!="") {
                        echo "<strong>".$receta->meals[$num]->$ingrediente."</strong><br>";
                    }
                }
                echo "</div><div class='instruc'><h1>Instrucciones: </h1>".$receta->meals[$num]->strInstructions."</div></div>";
            } else {
                echo "<h2>No existen recetas con ese nombre</h2>";
            }
            
        }
        
    ?>

</body>

</html>