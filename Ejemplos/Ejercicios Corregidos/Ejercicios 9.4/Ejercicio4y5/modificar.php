<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
        table{
            text-align: center;
        }
    </style>
    <h2>datos actuales del producto</h2>
    <table border="2">
    <tr>
            <td><h3>codigo</h3></td>
            <td><h3>descripcion</h3></td>
            <td><h3>precio de compra</h3></td>
			<td><h3>precio de venta</h3></td>
			<td><h3>stock</h3></td>
            <td colspan="2"><h3>modificaciones</h3></td>
        </tr>
        <tr>
    <form action="modificar2.php" method="post">
        <td><input type="text" name="codigo" value="<?=$_POST["codigo"] ?>" readonly></td>
        <td><input type="text" name="descripcion" value="<?=$_POST["descripcion"] ?>"></td>
        <td><input type="number" name="precioC" value="<?=$_POST["precioC"] ?>"></td>
        <td><input type="number" name="precioV" value="<?=$_POST["precioV"] ?>"></td>
        <td><input type="number" name="stock" value="<?=$_POST["stock"] ?>"></td>
        <input type="hidden" name="codigoviejo" value="<?=$_POST["codigo"] ?>">
        <td colspan="2"><input type="submit" value="modificar" style="width:100%"></td> </td>
    </form>
</tr>
    </table>
</body>
</html>