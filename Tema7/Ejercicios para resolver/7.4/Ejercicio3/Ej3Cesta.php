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
    <title>Ejercicio 3 - Cesta</title>
</head>

<body>
    
    <?php 
    
        session_start();
        //Si pulsamos el botón de vaciar, se vaciaran todas las cookies de los productos y totales
        if (isset($_GET["vaciar"])) {
            if ($_GET["vaciar"] == "vaciar") {
                setcookie("contP", "0", time()+5*60);
                setcookie("totalD", "0", time()+5*60);
                setcookie("unidadesPlay", "0", time()+5*60);
                setcookie("unidadesCamiseta", "0", time()+5*60);
                setcookie("unidadesCascos", "0", time()+5*60);
                setcookie("unidadesEcho", "0", time()+5*60);
                header("location: Ej3Cesta.php");
            }
        }    

        //Si pulsamos el botón de eliminar vamos controlando, según que botón de que producto pulsemos, que se elimine uno del producto elejido
        if (isset($_GET["eliminar"])) {
            if ($_GET["eliminar"]=="eliminar") {
                $cont = 0;
                $contTotal = 0;
                $total = 0;
                if (isset($_GET["play"]) && isset($_GET["camiseta"]) && isset($_GET["cascos"]) && isset($_GET["echo"])) { //Comprobamos que existen todas las variables sobre eliminar algun producto
                    //Según que producto queramos eliminar en la cesta
                    //Restamos 1 a las cookies de unidades del producto, restamos 1 a las cookies del contador de productos comprados en total y
                    //restamos el precio del producto a la cookie que lleva el total de la compra
                    //Por ultimo recargamos la pagina para que se puedan actualizar los cambios de las cookies
                    if ($_GET["play"]=="true") {
                        $cont = intval($_COOKIE["unidadesPlay"])-1;
                        setcookie("unidadesPlay", $cont, time()+5*60);
                        $contTotal = intval($_COOKIE["contP"])-1;
                        setcookie("contP", $contTotal, time()+5*60);
                        $total = intval($_COOKIE["totalD"]) - 500;
                        setcookie("totalD", $total, time()+5*60);
                        header("location: Ej3Cesta.php");
                    } else if ($_GET["camiseta"]=="true") {
                        $cont = intval($_COOKIE["unidadesCamiseta"])-1;
                        setcookie("unidadesCamiseta", $cont, time()+5*60);
                        $contTotal = intval($_COOKIE["contP"])-1;
                        setcookie("contP", $contTotal, time()+5*60);
                        $total = intval($_COOKIE["totalD"]) - 80;
                        setcookie("totalD", $total, time()+5*60);
                        header("location: Ej3Cesta.php");
                    } else if ($_GET["cascos"]=="true") {
                        $cont = intval($_COOKIE["unidadesCascos"])-1;
                        setcookie("unidadesCascos", $cont, time()+5*60);
                        $contTotal = intval($_COOKIE["contP"])-1;
                        setcookie("contP", $contTotal, time()+5*60);
                        $total = intval($_COOKIE["totalD"]) - 60;
                        setcookie("totalD", $total, time()+5*60);
                        header("location: Ej3Cesta.php");
                    } else if ($_GET["echo"]=="true") {
                        $cont = intval($_COOKIE["unidadesEcho"])-1;
                        setcookie("unidadesEcho", $cont, time()+5*60);
                        $contTotal = intval($_COOKIE["contP"])-1;
                        setcookie("contP", $contTotal, time()+5*60);
                        $total = intval($_COOKIE["totalD"]) - 30;
                        setcookie("totalD", $total, time()+5*60);
                        header("location: Ej3Cesta.php");
                    }    
                }    
            }
            
        }

        //Si las cookies no existen o han expirado, las creamos de nuevo
        if (!isset($_COOKIE["totalD"])) {
            setcookie("contP", "0", time()+5*60);
            setcookie("totalD", "0", time()+5*60);
            setcookie("unidadesPlay", "0", time()+5*60);
            setcookie("unidadesCamiseta", "0", time()+5*60);
            setcookie("unidadesCascos", "0", time()+5*60);
            setcookie("unidadesEcho", "0", time()+5*60);
            header("location: Ej3.php");
        }

    ?>

    <!-- Tabla donde tenemos la cesta que contiene los productos que vamos comprando con su nombre, cantidad, imagen y precio y botón de eliminar unidad del producto,
        y al final tendremos el total de productos comprados, el precio total, botón para vaciar la cesta y botón para volver a la página principal -->
    <table>

        <tr style="background-color: lightskyblue;">
            <th colspan="4"><h2>PRODUCTOS EN TU CESTA</h2></th>
        </tr>

        <tr style="background-color: lightskyblue;">
            <td>Producto</td>
            <td>Cantidad</td>
            <td>Precio</td>
            <td></td>
        </tr>

        <!-- Nombre del producto, cantidad, imagen con enlace para ir a la descripción y precio y botón de eliminar unidad del producto (en todos los productos) -->

        <?php if ($_COOKIE["unidadesPlay"]>0) { ?>
            <tr>
                <td><?php echo $_SESSION["productos"][0][0] ?></td>
                <td><?php echo $_COOKIE["unidadesPlay"] ?></td>
                <td><a href="descProducto.php?descP=0"><img src=<?php echo $_SESSION["productos"][0][2] ?> alt="Playstation 5" width="200px" height="150px"></a><br><?php echo $_SESSION["productos"][0][1],"€" ?></td>
                <td>
                    <form action="Ej3Cesta.php" method="get">
                        <input type="hidden" name="eliminar" value="eliminar">
                        <input type="hidden" name="play" value="true">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="false">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
        
        <?php if ($_COOKIE["unidadesCamiseta"]>0) { ?>
            <tr>
                <td><?php echo $_SESSION["productos"][1][0] ?></td>
                <td><?php echo $_COOKIE["unidadesCamiseta"] ?></td>
                <td><a href="descProducto.php?descP=1"><img src=<?php echo $_SESSION["productos"][1][2] ?> alt="Camiseta Sevilla FC" width="200px" height="150px"></a><br><?php echo $_SESSION["productos"][1][1],"€" ?></td>
                <td>
                    <form action="Ej3Cesta.php" method="get">
                        <input type="hidden" name="eliminar" value="eliminar">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="true">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="false">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>

        <?php if ($_COOKIE["unidadesCascos"]>0) { ?>
            <tr>
                <td><?php echo $_SESSION["productos"][2][0] ?></td>
                <td><?php echo $_COOKIE["unidadesCascos"] ?></td>
                <td><a href="descProducto.php?descP=2"><img src=<?php echo $_SESSION["productos"][2][2] ?> alt="Cascos Logitech G435" width="200px" height="150px"></a><br><?php echo $_SESSION["productos"][2][1],"€" ?></td>
                <td>
                    <form action="Ej3Cesta.php" method="get">
                        <input type="hidden" name="eliminar" value="eliminar">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="true">
                        <input type="hidden" name="echo" value="false">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
        
        <?php if ($_COOKIE["unidadesEcho"]>0) { ?>
            <tr>
                <td><?php echo $_SESSION["productos"][3][0] ?></td>
                <td><?php echo $_COOKIE["unidadesEcho"] ?></td>
                <td><a href="descProducto.php?descP=3"><img src=<?php echo $_SESSION["productos"][3][2] ?> alt="Amazon Echo Dot" width="200px" height="150px"></a><br><?php echo $_SESSION["productos"][3][1],"€" ?></td>
                <td>
                    <form action="Ej3Cesta.php" method="get">
                        <input type="hidden" name="eliminar" value="eliminar">
                        <input type="hidden" name="play" value="false">
                        <input type="hidden" name="camiseta" value="false">
                        <input type="hidden" name="cascos" value="false">
                        <input type="hidden" name="echo" value="true">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>    
        <?php } ?>

        <!-- Total de las cantidades compradas del producto y total del precio de todos los productos -->
        <tr>
            <td>Total</td>
            <td><?php echo $_COOKIE["contP"] ?></td>
            <td><?php echo $_COOKIE["totalD"],"€" ?></td>
            <!-- Botón para vaciar la cesta -->
            <td>
                <form action="Ej3Cesta.php" method="get">
                    <input type="hidden" name="vaciar" value="vaciar">
                    <input type="submit" value="VACIAR CESTA">
                </form>
            </td>
        </tr>

    </table>
    
    <br>
    <!-- Botón para ir a la página principal -->
    <form action="Ej3.php" method="get">
        <input type="hidden" name="play" value="false">
        <input type="hidden" name="camiseta" value="false">
        <input type="hidden" name="cascos" value="false">
        <input type="hidden" name="echo" value="false">
        <input type="submit" value="Volver a la tienda">
    </form>

</body>

</html>