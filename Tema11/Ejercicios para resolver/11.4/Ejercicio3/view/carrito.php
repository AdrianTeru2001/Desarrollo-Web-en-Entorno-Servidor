<!-- Carrito Ejercicio 3 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>

<body>

    <h1>Tienda</h1>
    <a href="../view/formProducto.php"><div class="boton">Nuevo Producto</div></a>

    <div class="container">
        <div class="productosTienda">
        <h1 class="carritoH1">Productos</h1>
            <?php 
                foreach ($productos["productos"] as $producto) {
                    ?>
                        <div class="productos">
                            <h2><?= $producto->getNombre() ?></h2>
                            <h3>Precio -> <?= $producto->getPrecio() ?></h3>
                            <h3>Stock -> <?= $producto->getStock() ?></h3>
                            <a href="../view/formAnadir.php?id=<?= $producto->getId() ?>&nom=<?= $producto->getNombre() ?>&stock=<?= $producto->getStock() ?>"><div class="botonP">Añadir al carrito</div></a>
                            <a href="../controller/borrarProducto.php?id=<?= $producto->getId() ?>"><div class="botonP">Borrar</div></a>
                            <a href="../view/formReponer.php?id=<?= $producto->getId() ?>&nom=<?= $producto->getNombre() ?>"><div class="botonP">Reponer</div></a>
                        </div>
                    <?php
                }
            ?>
        </div>

        <div class="carrito">
            <h1 class="carritoH1">Carrito</h1>
            <?php 
            foreach ($carrito["produCarr"] as $productoCarr) {
                ?>
                    <div class="productos">
                        <h2><?= $productoCarr->getNombre() ?></h2>
                        <h3>Cantidad -> <?= $productoCarr->getStock() ?></h3>
                        <a href="../controller/borrarCarrito.php?id=<?= $productoCarr->getId() ?>"><div class="botonP">Borrar</div></a>
                    </div>
                <?php
            }
            ?>
        </div>
    </div>

    <a href="../controller/venderProductos.php"><div class="botonC">Comprar</div></a>


</body>

</html>