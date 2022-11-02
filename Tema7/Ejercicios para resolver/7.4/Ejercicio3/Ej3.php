<!-- Ejercicio 3
Realizar una tienda con un carrito de la compra más completo que el realizado en el boletín. 
En la página principal tendremos un listado compuesto por una tabla con 4 columnas, 
nombre del producto, precio, imagen y botón para añadir a la cesta, si se añade más de una vez 
se aumenta la cantidad del producto en la cesta. También se mostrará cuantos productos hay en 
la cesta en todo momento y un enlace para acceder a dicha cesta que mostrará otro listado de los
productos añadidos y su cantidad, junto a cada producto habrá un botón eliminar que permita quitar 
una unidad de ese producto y si se llega a 0 se elimina el producto de la cesta. 
Al final de la cesta se mostrará el importe total de todos los productos y un botón o enlace para
cerrar la cesta y volver a la página principal.
Por último, en la página principal al pulsar sobre la imagen de un producto se abrirá en otra página 
la imagen a tamaño original (algo más grande) junto con los datos del producto y el detalle del
mismo (una breve descripción).
Crear manualmente en código, un array de sesión con todos los productos la primera vez que se carga
la página en una sesión nueva (con 3 o 4 productos es suficiente). El array puede ser asociativo con
clave ‘nombre del producto’ y valor un array con los valores ‘precio, detalle’ y la imagen puede 
coincidir con el nombre del producto más la extensión
Los productos añadidos en la cesta deben almacenarse en una cookie por si se cierra el navegador
y se abre de nuevo se recuperen automáticamente los productos añadidos a la cesta. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        table{
            text-align: center;
        }
        tr, td, th{
            border: 1px solid black;
        }
    </style>
    <title>Ejercicio 3</title>
</head>

<body>

    <?php 
    
        session_start();
        if (isset($_COOKIE["totalD"])) {
            //Array de sesion con todos los productos
            $_SESSION["productos"] = [ 0 => ["Playstation 5", 500, "img/play5.jpg", "Playstation 5 4k Full HD con 825GB UHD con mando incluido, podrás jugar a tus juegos favoritos en esta nueva consola, y sobre todo con la retrocompatibilidad con las antiguas consolas de sony."], 
                1 => ["Camiseta Sevilla FC", 80, "img/camisetaSevilla.jpg", "Camiseta del Sevilla FC año 2022/2023 con la nueva marca Castore, tiene una gran calidad en su tela y un diseño bastante innovador."], 
                2 => ["Cascos Logitech G435", 60, "img/cascos.png", "Cascos Logitech G435 color negro y verde con una gran duración de bateria, un diseño ergonómico y una gran calidad de sonido que hace que sientas que estas 100% conectado a lo que escuchas."], 
                3 => ["Amazon Echo Dot", 30, "img/amazonEchoDot.jpg", "Amazon Echo Dot con inteligencia artificial alexa con el que podras pedirle todo lo que desees, desde musica, pasando por skills propios del dispositivo, hasta hacer la cesta de la compra, aprovecha todas sus ventajas."] ];
            $cont = 0;
            $contTotal = 0;
            $total = 0;
            if (isset($_GET["play"]) && isset($_GET["camiseta"]) && isset($_GET["cascos"]) && isset($_GET["echo"])) { //Comprobamos que existen todas las variables sobre añadir algun producto
                //Según que producto queramos añadir en la cesta
                //Sumamos 1 a las cookies de unidades del producto, sumamos 1 a las cookies del contador de productos comprados en total y
                //sumamos el precio del producto a la cookie que lleva el total de la compra
                //Por ultimo recargamos la pagina para que se puedan actualizar los cambios de las cookies
                if ($_GET["play"]=="true") {
                    $cont = intval($_COOKIE["unidadesPlay"])+1;
                    setcookie("unidadesPlay", $cont, time()+5*60);
                    $contTotal = intval($_COOKIE["contP"])+1;
                    setcookie("contP", $contTotal, time()+5*60);
                    $total = intval($_COOKIE["totalD"]) + 500;
                    setcookie("totalD", $total, time()+5*60);
                    header("location: Ej3.php");
                } else if ($_GET["camiseta"]=="true") {
                    $cont = intval($_COOKIE["unidadesCamiseta"])+1;
                    setcookie("unidadesCamiseta", $cont, time()+5*60);
                    $contTotal = intval($_COOKIE["contP"])+1;
                    setcookie("contP", $contTotal, time()+5*60);
                    $total = intval($_COOKIE["totalD"]) + 80;
                    setcookie("totalD", $total, time()+5*60);
                    header("location: Ej3.php");
                } else if ($_GET["cascos"]=="true") {
                    $cont = intval($_COOKIE["unidadesCascos"])+1;
                    setcookie("unidadesCascos", $cont, time()+5*60);
                    $contTotal = intval($_COOKIE["contP"])+1;
                    setcookie("contP", $contTotal, time()+5*60);
                    $total = intval($_COOKIE["totalD"]) + 60;
                    setcookie("totalD", $total, time()+5*60);
                    header("location: Ej3.php");
                } else if ($_GET["echo"]=="true") {
                    $cont = intval($_COOKIE["unidadesEcho"])+1;
                    setcookie("unidadesEcho", $cont, time()+5*60);
                    $contTotal = intval($_COOKIE["contP"])+1;
                    setcookie("contP", $contTotal, time()+5*60);
                    $total = intval($_COOKIE["totalD"]) + 30;
                    setcookie("totalD", $total, time()+5*60);
                    header("location: Ej3.php");
                }    
            }
        } else {
            //Creamos todas las coockies y sesiones que nos hagan falta
            $_SESSION["productos"] = [];
            setcookie("contP", "0", time()+5*60);
            setcookie("totalD", "0", time()+5*60);
            setcookie("unidadesPlay", "0", time()+5*60);
            setcookie("unidadesCamiseta", "0", time()+5*60);
            setcookie("unidadesCascos", "0", time()+5*60);
            setcookie("unidadesEcho", "0", time()+5*60);
            header("location: Ej3.php");
        }

    ?>

    <!-- Tabla donde tenemos los productos con su nombre, precio, imagen y botón de comprar, y al final un botón para ir a la cesta.
        El botón de comprar envía a la cesta qué producto vamos a comprar para añadirle 1 a la cantidad del producto.
        Si pulsamos la imagen de cada producto podemos ir a ver su descripción. -->
    <table>

        <!-- Nombre de la tienda y contador de productos en la cesta -->
        <tr style="background-color: lightskyblue;">
            <th colspan="3"><h2>Tienda On-Line Ancá Terué</h2></th>
            <th>CESTA<br>Productos:<?php if(isset($_COOKIE["contP"])){echo $_COOKIE["contP"];}else{echo 0;} ?></th>
        </tr>

        <tr style="background-color: lightskyblue;">
            <td>Producto</td>
            <td>Precio</td>
            <td>Imagen</td>
            <td></td>
        </tr>

        <!-- Nombre del producto, precio, imagen con enlace para ir a la descripción y botón de comprar producto (en todos los productos) -->

        <tr>
            <td><?php echo $_SESSION["productos"][0][0] ?></td>
            <td><?php echo $_SESSION["productos"][0][1],"€" ?></td>
            <td><a href="descProducto.php?descP=0"><img src=<?php echo $_SESSION["productos"][0][2] ?> alt="Playstation 5" width="200px" height="150px"></a></td>
            <td>
                <form action="Ej3.php" method="get">
                    <input type="hidden" name="play" value="true">
                    <input type="hidden" name="camiseta" value="false">
                    <input type="hidden" name="cascos" value="false">
                    <input type="hidden" name="echo" value="false">
                    <input type="submit" value="Comprar">
                </form>
            </td>
        </tr>

        <tr>
            <td><?php echo $_SESSION["productos"][1][0] ?></td>
            <td><?php echo $_SESSION["productos"][1][1],"€" ?></td>
            <td><a href="descProducto.php?descP=1"><img src=<?php echo $_SESSION["productos"][1][2] ?> alt="Camiseta Sevilla FC" width="200px" height="150px"></a></td>
            <td>
                <form action="Ej3.php" method="get">
                    <input type="hidden" name="play" value="false">
                    <input type="hidden" name="camiseta" value="true">
                    <input type="hidden" name="cascos" value="false">
                    <input type="hidden" name="echo" value="false">
                    <input type="submit" value="Comprar">
                </form>
            </td>
        </tr>

        <tr>
            <td><?php echo $_SESSION["productos"][2][0] ?></td>
            <td><?php echo $_SESSION["productos"][2][1],"€" ?></td>
            <td><a href="descProducto.php?descP=2"><img src=<?php echo $_SESSION["productos"][2][2] ?> alt="Cascos Logitech G435" width="200px" height="150px"></a></td>
            <td>
                <form action="Ej3.php" method="get">
                    <input type="hidden" name="play" value="false">
                    <input type="hidden" name="camiseta" value="false">
                    <input type="hidden" name="cascos" value="true">
                    <input type="hidden" name="echo" value="false">
                    <input type="submit" value="Comprar">
                </form>
            </td>
        </tr>

        <tr>
            <td><?php echo $_SESSION["productos"][3][0] ?></td>
            <td><?php echo $_SESSION["productos"][3][1],"€" ?></td>
            <td><a href="descProducto.php?descP=3"><img src=<?php echo $_SESSION["productos"][3][2] ?> alt="Amazon Echo Dot" width="200px" height="150px"></a></td>
            <td>
                <form action="Ej3.php" method="get">
                    <input type="hidden" name="play" value="false">
                    <input type="hidden" name="camiseta" value="false">
                    <input type="hidden" name="cascos" value="false">
                    <input type="hidden" name="echo" value="true">
                    <input type="submit" value="Comprar">
                </form>
            </td>
        </tr>

    </table>
    
    <br>
    <!-- Botón para ir a la cesta -->
    <form action="Ej3Cesta.php" method="get">
        <input type="submit" value="Ir a la cesta">
    </form>
    
</body>

</html>