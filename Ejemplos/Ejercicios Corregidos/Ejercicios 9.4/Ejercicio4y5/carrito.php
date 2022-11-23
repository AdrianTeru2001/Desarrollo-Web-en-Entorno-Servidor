<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
         table{
            text-align: center;
        }
    </style>
</head>
<body>

<?php

if (isset($_SESSION["carrito"])) {
   
    ?> 
     <table border="1">
            <tr>
                <td colspan="3"><h3>CARRITO</h3></td> 
            </tr>
            <tr>
                <td><h3>codigo</h3></td>
                <td><h3>descripcion</h3></td>
                <td><h3>precio</h3></td>
           
            </tr>   
    <?php 
    foreach ($_SESSION["carrito"] as $carro) {
        $registro=extraerRegistro($carro);
        ?>
        <tr>
            <td><?= $registro->codigo ?></td>
            <td ><?= $registro->descripcion ?></td>
            <td><?= $registro->precio_venta ?></td>
        </tr>
<?php 
    }
    
}else{
    header('Location: ejercicio2.php');
}

function extraerRegistro($codigo){
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $productos_consulta = $conexion->query("select * from productos where codigo=".$codigo);
    $registro = $productos_consulta->fetchObject();
    return $registro;
    $conexion=null;
}

?>    
<tr><td colspan="3">   
    <form action="pagar.php" method="post">
        <input type="submit" name="pagar" value="Procesar pedido">
    </form>
</td></tr></table>
<a href="ejercicio2.php"><h3>Volver a página principal</h3></a>
</body>
</html>