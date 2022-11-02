<!-- Ejercicio 5
Crea una tienda on-line sencilla con un catálogo de productos y un carrito de la compra. 
Un catálogo de cuatro o cinco productos será suficiente. De cada producto se debe conocer al menos 
la descripción y el precio. Todos los productos deben tener una imagen que los identifique.
Al lado de cada producto del catálogo deberá aparecer un botón Comprar que permita añadirlo al carrito.
Si el usuario hace clic en el botón Comprar de un producto que ya estaba en el carrito, 
se deberá incrementar el número de unidades de dicho producto. Para cada producto que aparece en el carrito,
habrá un botón Eliminar por si el usuario se arrepiente y quiere quitar un producto concreto del carrito de la compra.
A continuación se muestra una captura de pantalla de una posible solución. -->
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
    </style>
    <title>Ejercicio 5</title>
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

        <tr>
            <td>
                <br>
                <img src="img/play5.jpg" alt="Playstation 5" width="200px" height="150px"><br>
                Playstation 5 <br>
                Precio: 500€ <br>
                <form action="Ej5.php" method="get">
                    <input type="hidden" name="play" value="true">
                    <input type="hidden" name="camiseta" value="false">
                    <input type="hidden" name="cascos" value="false">
                    <input type="hidden" name="echo" value="false">
                    <input type="submit" value="Comprar">
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
                <form action="Ej5.php" method="get">
                    <input type="hidden" name="play" value="false">
                    <input type="hidden" name="camiseta" value="true">
                    <input type="hidden" name="cascos" value="false">
                    <input type="hidden" name="echo" value="false">
                    <input type="submit" value="Comprar">
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
                <form action="Ej5.php" method="get">
                    <input type="hidden" name="play" value="false">
                    <input type="hidden" name="camiseta" value="false">
                    <input type="hidden" name="cascos" value="true">
                    <input type="hidden" name="echo" value="false">
                    <input type="submit" value="Comprar">
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
                <form action="Ej5.php" method="get">
                    <input type="hidden" name="play" value="false">
                    <input type="hidden" name="camiseta" value="false">
                    <input type="hidden" name="cascos" value="false">
                    <input type="hidden" name="echo" value="true">
                    <input type="submit" value="Comprar">
                </form>
                <br>
            </td>
        </tr>

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
                    <form action="Ej5.php" method="get">
                        <input type="hidden" name="playBorrar" value="true">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
        
        <?php if ($_SESSION["unidadesCamiseta"]>0) { ?>
            <tr>
                <td>
                    <br>
                    <img src="img/camisetaSevilla.jpg" alt="Camiseta Sevilla FC" width="200px" height="150px"><br>
                    Camiseta Sevilla FC <br>
                    Precio: 80€ <br>
                    Unidades: <?php echo $_SESSION["unidadesCamiseta"] ?> <br>
                    <form action="Ej5.php" method="get">
                        <input type="hidden" name="camisetaBorrar" value="true">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>

        <?php if ($_SESSION["unidadesCascos"]>0) { ?>
            <tr>
                <td>
                    <br>
                    <img src="img/cascos.png" alt="Cascos Logitech G435" width="200px" height="150px"><br>
                    Cascos Logitech G435 <br>
                    Precio: 60€ <br>
                    Unidades: <?php echo $_SESSION["unidadesCascos"] ?> <br>
                    <form action="Ej5.php" method="get">
                        <input type="hidden" name="cascosBorrar" value="true">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
        
        <?php if ($_SESSION["unidadesEcho"]>0) { ?>
            <tr>
                <td>
                    <br>
                    <img src="img/amazonEchoDot.jpg" alt="Amazon Echo Dot" width="200px" height="150px"><br>
                    Amazon Echo Dot <br>
                    Precio: 30€ <br>
                    Unidades: <?php echo $_SESSION["unidadesEcho"] ?> <br>
                    <form action="Ej5.php" method="get">
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