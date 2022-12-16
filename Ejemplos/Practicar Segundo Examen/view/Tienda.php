<!-- Tienda -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>

<body>

    <!-- Tabla Tienda -->
    <table class="tabla1">

        <tr>
            <td colspan="5"><h1>Productos</h1></td>
        </tr>

        <tr>
            <td><h2>Codigo</h2></td>
            <td><h2>Nombre</h2></td>
            <td><h2>Precio</h2></td>
            <td><h2>Stock</h2></td>
            <td></td>
        </tr>

    <?php foreach ($productos["productos"] as $prod){ ?>
            <tr>
                <td><h3><?= $prod->getCodigo() ?></h3></td>
                <td><h3><?= $prod->getNombre() ?></h3></td>
                <td><h3><?= $prod->getPrecio() ?></h3></td>
                <td><h3><?= $prod->getStock() ?></h3></td>
                <td><a href="../view/formAnadirCarrito.php?cod=<?= $prod->getCodigo() ?>&nom=<?= $prod->getNombre() ?>&stock=<?= $prod->getStock() ?>"><div class="boton botonC">Añadir al Carrito</div></a>
                    <a href="../view/formReponerProd.php?cod=<?= $prod->getCodigo() ?>&nom=<?= $prod->getNombre() ?>&stock=<?= $prod->getStock() ?>"><div class="boton botonR">Reponer Producto</div></a>
                    <a href="../view/confirmarBorrarProd.php?cod=<?= $prod->getCodigo() ?>&nom=<?= $prod->getNombre() ?>"><div class="boton botonB">Borrar Producto</div></a></td>
            </tr>
    <?php } ?>

        <tr>
            <td colspan="5"><a href="../view/formAnadirProd.php"><div class="boton botonA">Añadir Producto</div></a></td>
        </tr>

    </table>

        
    <!-- Tabla Carrito -->
    <table class="tabla2">

        <tr>
            <td colspan="5"><h1>Carrito</h1></td>
        </tr>

        <tr>
            <td><h2>Codigo</h2></td>
            <td><h2>Nombre</h2></td>
            <td><h2>Precio</h2></td>
            <td><h2>Cantidad Elegida</h2></td>
            <td></td>
        </tr>

    <?php 
        session_start();

        if (isset($_SESSION["carrito"])) {
            $carr = $_SESSION["carrito"];
            $claves = array_keys($carr);
            foreach ($productos["productos"] as $prod){ 
                if (in_array($prod->getCodigo(), $claves) ) {?>
                    <tr>
                        <td><h3><?= $prod->getCodigo() ?></h3></td>
                        <td><h3><?= $prod->getNombre() ?></h3></td>
                        <td><h3><?= $prod->getPrecio() ?></h3></td>
                        <td><h3><?= $carr[$prod->getCodigo()] ?></h3></td>
                        <td><a href="../controller/borrarProdCarrito.php?cod=<?= $prod->getCodigo() ?>"><div class="boton botonB">Quitar Producto</div></a></td></td>
                    </tr>
               <?php }
            }     
        }?>

        <tr>
            <td colspan="5"><a href="../controller/comprarCarrito.php"><div class="boton botonA">Comprar Carrito</div></a></td>
        </tr>

    </table>
    
</body>

</html>