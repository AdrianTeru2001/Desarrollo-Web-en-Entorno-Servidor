<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="estilos.css" type="text/css">
</head>
<body>
    <?php 
    

    try {
        $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"]=[];
    }
    if (!isset($_SESSION["pagina"])) {
        $_SESSION["pagina"]=1;
    }
    
    if (!isset($_SESSION["cantidad"])) {
        $_SESSION["cantidad"]=0;
    }

    $productos_consulta = $conexion->query("select * from productos");
    $tamano_pagina = 5;
    $num_total_registros = $productos_consulta->rowCount();
    $total_paginas = ceil($num_total_registros / $tamano_pagina);

    if (isset($_GET["pagina"])) {
        $_SESSION['pagina']=$_GET["pagina"];
        $pagina = $_GET["pagina"];
        $inicio = ($pagina - 1) * $tamano_pagina;
    } else {
        $pagina =  $_SESSION['pagina'];
        $inicio = ($pagina - 1) * $tamano_pagina;
    }

    $productos_consulta2 = $conexion->query("select * from productos limit " . $inicio . "," . $tamano_pagina);

    ?>
        <table border="1">
        <tr>
            <td colspan="11">Almacen GESTISIMAL</td> 
        </tr>
        <tr>
            <td colspan="6"></td>
            <td colspan="3"><a href="carrito.php">Carrito: <?php echo $_SESSION["cantidad"]; ?> productos</a></td>
            <td colspan="2"><form action="pagar.php" method="post">
                            <input type="submit" name= "pagar" value="Procesar Pedido">
                            </form>
            </td>
        </tr>
        <tr>
            <td><h3>código</h3></td>
            <td><h3>descripción</h3></td>
            <td><h3>precio de compra</h3></td>
            <td><h3>precio de venta</h3></td>
            <td><h3>margen</h3></td>
            <td><h3>stock</h3></td>
            <td colspan="5"><h3>modificaciones</h3></td>
        </tr>
        
        <?php 

        while ($registro = $productos_consulta2->fetchObject()) {
            ?>
                <tr>
                <td><?= $registro->codigo ?></td>
                <td ><?= $registro->descripcion ?></td>
                <td><?= $registro->precio_compra ?></td>
                <td><?= $registro->precio_venta ?></td>
                <td> <?php echo $registro->precio_venta - $registro->precio_compra ?> </td>
                <td><?= $registro->stock ?></td>
                <td>
                    <form action="modificar.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                        <input type="hidden" name="descripcion" value="<?= $registro->descripcion ?>">
                        <input type="hidden" name="precioC" value="<?= $registro->precio_compra ?>">
                        <input type="hidden" name="precioV" value="<?= $registro->precio_venta ?>">
                        <input type="hidden" name="stock" value="<?= $registro->stock ?>">
                        <input type="submit" value="modificar"></td>
                    </form>
                </td>
                <td>
                    <form action="borrar.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                        <input type="submit" value="borrar">
                    </form>
                </td>
                <td>
                    <form action="entrada.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                        <input type="hidden" name="stock" value="<?= $registro->stock ?>">
                        <input type="submit" value="entrada">
                    </form>
                </td>
                <td>
                    <form action="salida.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                        <input type="hidden" name="stock" value="<?= $registro->stock ?>">
                        <input type="submit" value="salida">
                    </form>
                </td>
                <td>
                    <form action="venta.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $registro->codigo ?>">
                        <input type="submit" value="Comprar">
                    </form>
                </td>
                </tr>
            <?php
        }
        ?>
        <tr>
            <form action="añadir.php" method="post">
                
                <td><input type="text" name="codigo"></td>
                <td><input type="text" name="descripcion"></td>
                <td><input type="number" name="precioC"></td>
                <td><input type="number" name="precioV"></td>
                <td></td>
                <td><input type="number" name="stock"></td>
                <td colspan="5"><input type="submit" value="añadir" style=" width:100%"></td>
            </form>

        </tr>
        
    </table>
    <br>
    <table border="1">
    <tr>
        <td>Pagina <?= $pagina ?> de <?= $total_paginas ?></td>
        <td><a href='ejercicio2.php?pagina=1'>INICIO</a></td>
    <?php  
        if ($pagina>1) {
            $pagAnt=$pagina-1;
            echo "<td><a href='ejercicio2.php?pagina=".$pagAnt."'>ANTERIOR</a></td>"; 
        }else{
            echo "<td><a>ANTERIOR</a></td>";
        }
        if ($pagina<$total_paginas) {
            $pagSig=$pagina+1;
            echo "<td><a href='ejercicio2.php?pagina=".$pagSig."'>SIGUIENTE</a></td>"; 
        }else{
            echo "<td><a>SIGUIENTE</a></td>";
        }
    ?>
        <td><a href='ejercicio2.php?pagina=<?=$total_paginas ?>'>FIN</a></td>
        </tr>
    </table>	
</body>
</html>