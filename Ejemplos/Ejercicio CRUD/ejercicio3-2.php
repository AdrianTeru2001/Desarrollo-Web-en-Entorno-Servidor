<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: black;
    }
    .contenido {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: white;
        padding: 30px;
    }

    .card {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    img {
        width: 600px;
        height: 600px;
        margin-top: 30px;
        border-radius: 50px;
        box-shadow: 0px 0px 10px 0px white;
    }

    span {
        margin-top: 15px;
        margin-bottom: 10px;
        font-size: 2rem;
    }

    button {
        padding: 5px;
        font-size: 1.2rem;
    }

    button:hover {
        cursor: pointer;
    }

    h1 {
        font-size: 3rem;
    }

    input {
        padding: 10px;
        margin-top: 10px;
    }

    select {
        padding: 10px;
        margin-top: 10px;
    }
</style>
<body>
    <?php session_start();
    if(!isset($_COOKIE["carrito"])){
        $carrito = [];
        $carrito = serialize($carrito);
        setcookie("carrito", $carrito, time()+1*24*3600);
    }
    if(isset($_GET["pro"])){
    ?>
    <div class="contenido">
    <h1>Vista detalle</h1>
    <?php 
        $productos = [ 0 => [5, "Un balon", "img/balon.jpg"] , 1 => [350, "Un televisor", "img/tv.jpg"] , 2 => [800, "Una play", "img/play.jpg"]];
        $precio = $productos[(int)$_GET["pro"]][0];
        $desc = $productos[(int)$_GET["pro"]][1];
        $img = $productos[(int)$_GET["pro"]][2];
        echo "<div class='card'>
        <img src='$img' alt=''>
        <span>$desc </span><br>
        <span>$precio €</span>
        <form action='ejercicio3.php' method='GET'>";
        echo "<select name='unidad' id='t'>";
        for ($j=1; $j <= 10; $j++) { 
            echo "<option value='$j'>$j</option>";
        }
        echo "</select>";
        $pro = (int)$_GET["pro"];
        echo "<input type='hidden' value='$pro' name='pro'>";
        echo "<br><input type='submit' value='Añadir'>";
        echo "</form>
        </div>";
    ?>
    
    </div>
    <?php 
    }
    else{
        echo "<h1 style='color:white; text-align:center;'>Error. La página que se intenta cargar no existe</h1>";
    }
    ?>
</body>
</html>