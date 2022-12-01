<?php
session_start();
require_once 'Producto.php';
// El siguiente bloque comentado controla si hay más en cesta que en stock, pero la aplicación no permite que ocurra eso
// foreach ($_SESSION['productos'] as $prod => $cantidad) {
//     $producto=unserialize($_SESSION['catalogo'][$prod]);
//     if ($producto->getStock()<$cantidad) {
//         echo "<script>alert (\"producto: ".$producto->getNombre().", sin stock, disponibles: ".$producto->getStock()." unidades\");</script>";
//         if ($producto->getStock()>0) {
//             $diferencia=$cantidad-$producto->getStock(); //cantidad que falta
//             $_SESSION['productos'][$prod]-=$diferencia;
//             $_SESSION['cantidad']-=$diferencia;
//             $_SESSION['total']-=$diferencia*$producto->getPrecio();
//         }else{
//             $_SESSION['cantidad']-=$cantidad;
//             $_SESSION['total']-=$cantidad*$producto->getPrecio();
//             unset($_SESSION['productos'][$prod]);
//         }
//     }
// }
// setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
// setcookie('total', $_SESSION['total'], time() + 24 * 3600);
// setcookie('productos', serialize($_SESSION['productos']), time() + 24 * 3600);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="StyleSheet" href="estilo/estilos.css" type="text/css">
      <title>
        Tienda de informatica
      </title>
    </meta>
  </head>
  <body>
    <div class="contenedor">
<table border = "1"><tr><th colspan="6"><h3>PRODUCTOS EN TU CESTA</h3></th></tr>
<tr><td>Codigo</td><td>Producto</td><td>Cantidad</td><td>Precio</td><td>Importe</td></tr>
<?php 
    foreach ($_SESSION['productos'] as $prod => $cantidad) {
            $producto=unserialize($_SESSION['catalogo'][$prod]);
            echo'<tr><td>'.$prod.'</td><td><img style="width:100px" src="estilo/'.$producto->getImagen().'"></td><td>'.$cantidad.'</td><td>'.$producto->getPrecio().' euros</td><td>'.$producto->getPrecio()*$cantidad.' euros</td><td>';
            ?>
            <form action="QuitaCarro.php" method="get">
                <input type="hidden" name="quitapro" value="<?= $prod ?>">
                <input type="submit" value="Eliminar">
            </form>
            </td></tr>
    <?php  
    }
    ?>
    <tr><td colspan="2">Total</td><td><?=$_SESSION['cantidad']?></td><td></td><td> <?=$_SESSION['total']?>euros</td><td></td></tr>
    <tr><td colspan="3"><a href="Carrito.php">Cerrar</a></td><td colspan="3"><a href="comprar.php">Finalizar Compra</a></td></tr>
</table>
</div>
  </body>
</html>
