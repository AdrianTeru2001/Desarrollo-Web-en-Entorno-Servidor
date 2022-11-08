<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $intentos = (isset($_REQUEST['intentos']))?$_REQUEST['intentos']:0;
    ?>
    <h1>Averigua la imagen escondida detrás del mosaico</h1>
    <p>Pulsa en cada cuadrado para ver la imágen que esconde, y cuando tengas claro de que imagen se trata con el menor número posible de consultas, escribe su nombre y comprueba si has acertado.</p>
    <table border=1 cellspacing=0 cellpadding=0 bordercolor="red">
        <tr><td><a href="Ejercicio3-2.php?num=1&intentos=<?=$intentos?>"><img src="oculto.jpg"></a></td>
            <td><a href="Ejercicio3-2.php?num=2&intentos=<?=$intentos?>"><img src="oculto.jpg"></a></td>
            <td><a href="Ejercicio3-2.php?num=3&intentos=<?=$intentos?>"><img src="oculto.jpg"></a></td></tr>
        <tr><td><a href="Ejercicio3-2.php?num=4&intentos=<?=$intentos?>"><img src="oculto.jpg"></a></td>
            <td><a href="Ejercicio3-2.php?num=5&intentos=<?=$intentos?>"><img src="oculto.jpg"></a></td>
            <td><a href="Ejercicio3-2.php?num=6&intentos=<?=$intentos?>"><img src="oculto.jpg"></a></td></tr>
        <tr><td><a href="Ejercicio3-2.php?num=7&intentos=<?=$intentos?>"><img src="oculto.jpg"></a></td>
            <td><a href="Ejercicio3-2.php?num=8&intentos=<?=$intentos?>"><img src="oculto.jpg"></a></td>
            <td><a href="Ejercicio3-2.php?num=9&intentos=<?=$intentos?>"><img src="oculto.jpg"></a></td></tr>
    </table>
    <br><br>
    <?php echo "<h3>Numero de intentos: ".$intentos."</h3>"; ?> 
    <form action="Ejercicio3-2.php" method="post">
        <input type="text" name="palabra" placeholder="Inténtalo" required>
        <input type="hidden" name="intentos" value="<?=$intentos?>">
        <input type="submit" value="comprobar">
    </form>
</body>
</html>