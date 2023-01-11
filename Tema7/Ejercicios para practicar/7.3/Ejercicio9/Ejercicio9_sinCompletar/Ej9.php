<!-- Ejercicio 9
Amplía el ejercicio 6 de tal forma que los productos que se pueden elegir para comprar, se almacenen en cookies. 
La aplicación debe ofrecer, por tanto, las opciones de alta, baja y modificación de productos. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        .tabla1{
            float: left;
        }
        .tabla2{
            margin-left: 700px;
        }
    </style>
    <title>Ejercicio 9</title>
</head>

<body>

    <?php 

        if (!isset($_COOKIE["productosS"])) {
            $productos = array(
                0 => array("nom" => "Playstation 5", "precio" => 500, "img" => "img/play5.jpg", "unid" => 0, "desc" => "Playstation 5 4k Full HD con 825GB UHD con mando incluido."),
                1 => array("nom" => "Camiseta Sevilla FC", "precio" => 80, "img" => "img/camisetaSevilla.jpg", "unid" => 0, "desc" => "Camiseta del Sevilla FC año 2022/2023 con la nueva marca Castore."),
                2 => array("nom" => "Cascos Logitech G435", "precio" => 60, "img" => "img/cascos.png", "unid" => 0, "desc" => "Cascos Logitech G435 color negro y verde con una gran duración de bateria."),
                3 => array("nom" => "Amazon Echo Dot", "precio" => 30, "img" => "img/amazonEchoDot.jpg", "unid" => 0, "desc" => "Amazon Echo Dot con inteligencia artificial alexa."),
            );    
            $productosString = serialize($productos);
            setcookie("productosS", $productosString, time()+24*60*60*60);
            header("location: Ej9.php");
        }

        if (isset($_GET["comp"])) {
            $productosC = unserialize($_COOKIE["productosS"]);
            $produc = $_GET["comp"];
            $productosC[$produc]["unid"] += 1;
            echo "<br>",$productosC[$produc]["unid"],"<br>";
            $productosString = serialize($productosC);
            setcookie("productosS", $productosString, time()+24*60*60*60);
            header("location: Ej9.php");
        }

        /* setcookie("productosS", " "); */

        /* $productosC = unserialize($_COOKIE["productosS"]);
        echo var_dump($productosC);
        echo "<br>",$productosC[0]['unid']; */

    ?>

    <h1>Tienda On-Line Ancá Terué</h1>

    <table class="tabla1">

        <tr>
            <th><h2>Productos</h2></th>
        </tr>
        
        <?php 
        
            if (isset($_COOKIE["productosS"])) {
                $productos = unserialize($_COOKIE["productosS"]);
                for ($i=0; $i < count($productos); $i++) { 
                    echo "<tr><td><br>";
                    echo "<img src='",$productos[$i]['img'],"' alt='",$productos[$i]['nom'],"' width='200px' height'150px'><br>";
                    echo $productos[$i]['nom'],"<br>";
                    echo "Precio: ",$productos[$i]['precio'],"€<br>";
                    echo $productos[$i]['desc'],"<br>";
                    echo "<form action='Ej9.php' method='get'>";
                    echo "<input type='hidden' name='comp' value='$i'>";
                    echo "<input type='submit' value='Comprar'>";
                    echo "</form><br>";
                    echo "<form action='Ej9_Detalles.php' method='get'>";
                    echo "<input type='hidden' name='det' value='$i'>";
                    echo "<input type='submit' value='Detalles'>";
                    echo "</form>";
                    echo "<br></td></tr>";
                }
            }
        
        ?>

    </table>

    <table class="tabla2">

        <tr>
            <th><h2>Carrito</h2></th>
        </tr>

        <?php 
        
            if (isset($_COOKIE["productosS"])) {
                $productos = unserialize($_COOKIE["productosS"]);
                for ($i=0; $i < count($productos); $i++) {
                    if ($productos[$i]['unid']>0) {
                        echo "<tr><td><br>";
                        echo "<img src='",$productos[$i]['img'],"' alt='",$productos[$i]['nom'],"' width='200px' height'150px'><br>";
                        echo $productos[$i]['nom'],"<br>";
                        echo "Precio: ",$productos[$i]['precio'],"€<br>";
                        echo "Unidades: ",$productos[$i]['unid'],"<br>";
                        echo "<form action='Ej9.php?comp=$i' method='get'>";
                        echo "<input type='submit' value='Comprar'>";
                        echo "</form><br>";
                        echo "<form action='Ej9_Detalles.php' method='get'>";
                        echo "<input type='hidden' name='det' value='$i'>";
                        echo "<input type='submit' value='Detalles'>";
                        echo "</form>";
                        echo "<br></td></tr>";    
                    } 
                    
                }
            }
        
        ?>

    </table>

</body>

</html>