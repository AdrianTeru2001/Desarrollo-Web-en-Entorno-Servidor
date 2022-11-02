<!-- Ejercicio 6
Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto. Para ello, cada uno de los productos 
del catálogo deberá tener un botón Detalle que, al ser accionado, debe llevar al usuario a la vista de detalle que
contendrá una descripción exhaustiva del producto en cuestión. Se podrán añadir productos al carrito tanto desde 
la vista de listado como desde la vista de detalle. -->
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
            margin-left: 300px;
        }
    </style>
    <title>Ejercicio 6</title>
</head>

<body>

    <?php 
    
        session_start(); //Iniciamos la sesion
        if (isset($_SESSION["total"])) {
            if (isset($_GET["play"]) && isset($_GET["camiseta"]) && isset($_GET["cascos"]) && isset($_GET["echo"])) { //Comprobamos que existen todas las variables sobre añadir o no algun producto
                //Según que variable esté a true, añadimos un producto u otro y sumamos su precio al total de la suma
                if ($_GET["play"]=="true") {
                    $_SESSION["unidadesPlay"] += 1;
                    $_SESSION["total"] += 500;
                } else if ($_GET["camiseta"]=="true") {
                    $_SESSION["unidadesCamiseta"] += 1;
                    $_SESSION["total"] += 80;
                } else if ($_GET["cascos"]=="true") {
                    $_SESSION["unidadesCascos"] += 1;
                    $_SESSION["total"] += 60;
                } else if ($_GET["echo"]=="true") {
                    $_SESSION["unidadesEcho"] += 1;
                    $_SESSION["total"] += 30;
                }    
            }
            //Controlamos que variable de borrar hemos llamado
            //Según que producto varamos a borrar, le restamos el precio de ese producto, multiplicado por la cantidad y pasamos la cantidad a 0
            if (isset($_GET["playBorrar"])) {
                if ($_GET["playBorrar"]=="true") {
                    $_SESSION["total"] -= 500*$_SESSION["unidadesPlay"];
                    $_SESSION["unidadesPlay"] = 0;
                }    
            }
            if (isset($_GET["camisetaBorrar"])) {
                if ($_GET["camisetaBorrar"]=="true") {
                    $_SESSION["total"] -= 80*$_SESSION["unidadesCamiseta"];
                    $_SESSION["unidadesCamiseta"] = 0;
                }    
            }
            if (isset($_GET["cascosBorrar"])) {
                if ($_GET["cascosBorrar"]=="true") {
                    $_SESSION["total"] -= 60*$_SESSION["unidadesCascos"];
                    $_SESSION["unidadesCascos"] = 0;
                }    
            }
            if (isset($_GET["echoBorrar"])) {
                if ($_GET["echoBorrar"]=="true") {
                    $_SESSION["total"] -= 30*$_SESSION["unidadesEcho"];
                    $_SESSION["unidadesEcho"] = 0;
                }    
            }
        } else {
            //Creamos todas las sesiones que nos hagan falta
            $_SESSION["total"] = 0;
            $_SESSION["unidadesPlay"] = 0;
            $_SESSION["unidadesCamiseta"] = 0;
            $_SESSION["unidadesCascos"] = 0;
            $_SESSION["unidadesEcho"] = 0;
        }

    ?>

    <h1>Tienda On-Line Ancá Terué</h1>

    <!-- Primera tabla donde tenemos los productos con su imagen, nombre, precio y botón de comprar
        el botón de comprar envía a la misma pagina qué producto vamos a comprar para añadirle 1 a la cantidad del producto -->
    <table class="tabla1">

        <tr>
            <th><h2>Productos</h2></th>
        </tr>

        <!-- Vamos controlando que al ver los detalles de los productos podamos seguir comprando, borrando o viendo la cesta de ese producto que vemos los detalles -->
        <?php 
        if (isset($_GET["detalles"])) {
            if ($_GET["detalles"]==1) {?>
                <tr>
                    <td>
                        <br>
                        <img src="img/play5.jpg" alt="Playstation 5" width="200px" height="150px"><br>
                        Playstation 5 <br>
                        Precio: 500€ <br>
                        Playstation 5 4k Full HD con 825GB UHD con mando incluido,<br>
                        podrás jugar a tus juegos favoritos en esta nueva consola,<br>
                        y sobre todo con la retrocompatibilidad con las antiguas consolas de sony.<br><br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="true">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="1">
                            <input type="submit" value="Comprar">
                        </form>
                        <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="0">
                            <input type="submit" value="Cerrar Detalles">
                        </form>
                        <br>
                    </td>
                </tr>        
        <?php ;} else if ($_GET["detalles"]==2) {?>
                <tr>
                    <td>
                        <br>
                        <img src="img/camisetaSevilla.jpg" alt="Camiseta Sevilla FC" width="200px" height="150px"><br>
                        Camiseta Sevilla FC <br>
                        Precio: 80€ <br>
                        Camiseta del Sevilla FC año 2022/2023 con la nueva marca Castore,<br>
                        tiene una gran calidad en su tela y un diseño bastante innovador.<br><br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="true">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="2">
                            <input type="submit" value="Comprar">
                        </form>
                        <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="0">
                            <input type="submit" value="Cerrar Detalles">
                        </form>
                        <br>
                    </td>
                </tr>        
        <?php ;} if ($_GET["detalles"]==3) {?>
                <tr>
                    <td>
                        <br>
                        <img src="img/cascos.png" alt="Cascos Logitech G435" width="200px" height="150px"><br>
                        Cascos Logitech G435 <br>
                        Precio: 60€ <br>
                        Cascos Logitech G435 color negro y verde con una gran duración de bateria,<br>
                        un diseño ergonómico y una gran calidad de sonido que hace que sientas<br>
                        que estas 100% conectado a lo que escuchas.<br><br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="true">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="3">
                            <input type="submit" value="Comprar">
                        </form>
                        <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="0">
                            <input type="submit" value="Cerrar Detalles">
                        </form>
                        <br>
                    </td>
                </tr>        
        <?php ;} if ($_GET["detalles"]==4) {?>
                <tr>
                    <td>
                        <br>
                        <img src="img/amazonEchoDot.jpg" alt="Amazon Echo Dot" width="200px" height="150px"><br>
                        Amazon Echo Dot <br>
                        Precio: 30€ <br>
                        Amazon Echo Dot con inteligencia artificial alexa con el que<br>
                        podras pedirle todo lo que desees, desde musica, pasando por skills<br>
                        propios del dispositivo, hasta hacer la cesta de la compra,<br>
                        aprovecha todas sus ventajas.<br><br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="true">
                            <input type="hidden" name="detalles" value="4">
                            <input type="submit" value="Comprar">
                        </form>
                        <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="0">
                            <input type="submit" value="Cerrar Detalles">
                        </form>
                        <br>
                    </td>
                </tr>        
        <?php ;} else if ($_GET["detalles"]==0) {?>
                <tr>
                    <td>
                        <br>
                        <img src="img/play5.jpg" alt="Playstation 5" width="200px" height="150px"><br>
                        Playstation 5 <br>
                        Precio: 500€ <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="true">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="submit" value="Comprar">
                        </form>
                        <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="1">
                            <input type="submit" value="Detalles">
                        </form>
                        <br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <img src="img/camisetaSevilla.jpg" alt="Camiseta Sevilla FC" width="200px" height="150px"><br>
                        Camiseta Sevilla FC <br>
                        Precio: 80€ <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="true">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="submit" value="Comprar">
                        </form>
                        <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="2">
                            <input type="submit" value="Detalles">
                        </form>
                        <br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <img src="img/cascos.png" alt="Cascos Logitech G435" width="200px" height="150px"><br>
                        Cascos Logitech G435 <br>
                        Precio: 60€ <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="true">
                            <input type="hidden" name="echo" value="false">
                            <input type="submit" value="Comprar">
                        </form>
                        <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="3">
                            <input type="submit" value="Detalles">
                        </form>
                        <br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <img src="img/amazonEchoDot.jpg" alt="Amazon Echo Dot" width="200px" height="150px"><br>
                        Amazon Echo Dot <br>
                        Precio: 30€ <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="true">
                            <input type="submit" value="Comprar">
                        </form>
                        <br>
                        <form action="Ej6.php" method="get">
                            <input type="hidden" name="play" value="false">
                            <input type="hidden" name="camiseta" value="false">
                            <input type="hidden" name="cascos" value="false">
                            <input type="hidden" name="echo" value="false">
                            <input type="hidden" name="detalles" value="4">
                            <input type="submit" value="Detalles">
                        </form>
                        <br>
                    </td>
                </tr>       
        <?php ;}
        } else {?>
            <tr>
                <td>
                    <br>
                    <img src="img/play5.jpg" alt="Playstation 5" width="200px" height="150px"><br>
                    Playstation 5 <br>
                    Precio: 500€ <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="play" value="true">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="false">
                        <input type="submit" value="Comprar">
                    </form>
                    <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="false">
                        <input type="hidden" name="detalles" value="1">
                        <input type="submit" value="Detalles">
                    </form>
                    <br>
                </td>
            </tr>

            <tr>
                <td>
                    <br>
                    <img src="img/camisetaSevilla.jpg" alt="Camiseta Sevilla FC" width="200px" height="150px"><br>
                    Camiseta Sevilla FC <br>
                    Precio: 80€ <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="true">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="false">
                        <input type="submit" value="Comprar">
                    </form>
                    <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="false">
                        <input type="hidden" name="detalles" value="2">
                        <input type="submit" value="Detalles">
                    </form>
                    <br>
                </td>
            </tr>

            <tr>
                <td>
                    <br>
                    <img src="img/cascos.png" alt="Cascos Logitech G435" width="200px" height="150px"><br>
                    Cascos Logitech G435 <br>
                    Precio: 60€ <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="true">
                        <input type="hidden" name="echo" value="false">
                        <input type="submit" value="Comprar">
                    </form>
                    <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="false">
                        <input type="hidden" name="detalles" value="3">
                        <input type="submit" value="Detalles">
                    </form>
                    <br>
                </td>
            </tr>

            <tr>
                <td>
                    <br>
                    <img src="img/amazonEchoDot.jpg" alt="Amazon Echo Dot" width="200px" height="150px"><br>
                    Amazon Echo Dot <br>
                    Precio: 30€ <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="true">
                        <input type="submit" value="Comprar">
                    </form>
                    <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="false">
                        <input type="hidden" name="detalles" value="4">
                        <input type="submit" value="Detalles">
                    </form>
                    <br>
                </td>
            </tr>
        <?php }
        ?>

    </table>

    <!-- Segunda tabla donde tenemos el carrito que contiene los productos que vamos comprando con su imagen, nombre, precio, unidades compradas,
        botón para eliminar el producto si ya no lo queremos y al final tendremos el total del dinero que nos estamos gastando en todos los productos del carrito -->
    <table class="tabla2">

        <tr>
            <th><h2>Carrito</h2></th>
        </tr>

        <?php if ($_SESSION["unidadesPlay"]>0) { ?>
            <tr>
                <td>
                    <br>
                    <img src="img/play5.jpg" alt="Playstation 5" width="200px" height="150px"><br>
                    Playstation 5 <br>
                    Precio: 500€ <br>
                    Unidades: <?php echo $_SESSION["unidadesPlay"] ?> <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="playBorrar" value="true">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
        
        <?php if ($_SESSION["unidadesCamiseta"]>0) { ?>
            <tr>
                <td>
                    <br><br><br>
                    <img src="img/camisetaSevilla.jpg" alt="Camiseta Sevilla FC" width="200px" height="150px"><br>
                    Camiseta Sevilla FC <br>
                    Precio: 80€ <br>
                    Unidades: <?php echo $_SESSION["unidadesCamiseta"] ?> <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="camisetaBorrar" value="true">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>

        <?php if ($_SESSION["unidadesCascos"]>0) { ?>
            <tr>
                <td>
                    <br><br><br>
                    <img src="img/cascos.png" alt="Cascos Logitech G435" width="200px" height="150px"><br>
                    Cascos Logitech G435 <br>
                    Precio: 60€ <br>
                    Unidades: <?php echo $_SESSION["unidadesCascos"] ?> <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="cascosBorrar" value="true">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
        
        <?php if ($_SESSION["unidadesEcho"]>0) { ?>
            <tr>
                <td>
                    <br><br><br>
                    <img src="img/amazonEchoDot.jpg" alt="Amazon Echo Dot" width="200px" height="150px"><br>
                    Amazon Echo Dot <br>
                    Precio: 30€ <br>
                    Unidades: <?php echo $_SESSION["unidadesEcho"] ?> <br>
                    <form action="Ej6.php" method="get">
                        <input type="hidden" name="echoBorrar" value="true">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>    
        <?php } ?>

        <tr>
            <td><br><h3>Total: <?php echo $_SESSION["total"] ?>€</h3></td>
        </tr>

    </table>

    
</body>

</html>