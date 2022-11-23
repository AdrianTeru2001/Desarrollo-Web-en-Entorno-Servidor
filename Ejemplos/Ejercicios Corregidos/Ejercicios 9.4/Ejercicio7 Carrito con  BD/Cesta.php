<?php
session_start();
if (!isset($_SESSION['enCesta'])) {
    header("location:carrito.php");
}

echo '<table border = "1"><tr><th colspan="4"><h3>PRODUCTOS EN TU CESTA</h3></th></tr>';
if ($_SESSION['total']>0) {
    foreach ($_SESSION['enCesta'] as $prod => $cantidad) {
        if ($cantidad > 0) {
            echo'<tr><td>'.$prod.'</td><td>'.$cantidad.'</td><td><img style="width:100px" src="img/'.$_SESSION['productos'][$prod][2].'"/><br>'
                .$prod.'<br>'.$_SESSION['productos'][$prod][0].' euros</td><td>';
            ?>
            <form action="QuitaCarro.php" method="get">
                <input type="hidden" name="quitapro" value="<?= $prod ?>">
                <input type="submit" value="Eliminar">
            </form>
            <?php
            echo '</td></tr>';
        }
    }
 }   

echo '<tr><td>Total</td><td>' . $_SESSION['cantidad'] . '</td><td>' . $_SESSION['total'] . '</td><td><a href="Carrito.php">Cerrar</a></td></tr></table>';
?>

