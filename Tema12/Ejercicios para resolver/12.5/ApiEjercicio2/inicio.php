<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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

    /* Titulos */
    .titulo{
        width: 850px;
        height: 60px;
        line-height: 60px;
        border-radius: 10px;
        text-align: center;
        background-color: lightslategray;
        font-size: 50px;
    }
    h2{
        width: 350px;
        background-color: white;
        border-radius: 50px;
        text-align: center;
    }

    /* Botones */
    .boton{
        width: 180px;
        height: 30px;
        text-decoration: none;
        color: white;
        background-color: lightslategray;
        text-align: center;
        line-height: 30px;
        border-radius: 10px;
        font-size: 20px;
    }
    .boton:hover{
        box-shadow: 1px 1px 4px black;
    }
</style>

<body>

    <!-- Titulos -->
    <div class="titulo">GENERADOR DE RECETAS ONLINE</div>
    <h1>Elige como quieres buscar las recetas de cocina</h1>
    
    <!-- Opciones de generar recetas -->
    <h2>Generar Recetas Random</h2>
    <a href="random.php" class="boton">Generar recetas</a>
    <br>
    <h2>Buscar Recetas por Nombre</h2>
    <a href="cadena.php" class="boton">Generar recetas</a>

</body>

</html>