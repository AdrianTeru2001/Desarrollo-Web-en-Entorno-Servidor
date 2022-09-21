<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            background-color: lightcoral;
        }
        table, td{
            border: 4px solid blue;
            border-collapse: collapse;
        }
    </style>
    <title>Tienda Disca</title>
</head>

<body>
    <?php 
        $producto = $_GET["producto"];
        $tienda1 = $_GET["t1"];
        $tienda2 = $_GET["t2"];
        $tienda3 = $_GET["t3"];
        $media = ($tienda1+$tienda2+$tienda3)/3;
        $dif1 = $media-$tienda1;
        $dif2 = $media-$tienda2;
        $dif3 = $media-$tienda3;
    ?>
    <table style="text-align: center; font-size: 50px;">
        <tr>
            <td colspan="4"><h2>Calculos de Precios de <?php echo $producto ?></h2></td>
        </tr>
        <tr>
            <td></td>
            <td>Tienda 1</td>
            <td>Tienda 2</td>
            <td>Tienda 3</td>
        </tr>
        <tr>
            <td>Precios</td>
            <td><?php echo $tienda1, "€" ?></td>
            <td><?php echo $tienda2, "€" ?></td>
            <td><?php echo $tienda3, "€" ?></td>
        </tr>
        <tr>
            <td>Precio Medio</td>
            <td colspan="3"><?php echo $media, "€" ?></td>
        </tr>
        <tr>
            <td>Diferencias</td>
            <td><?php echo $dif1, "€" ?></td>
            <td><?php echo $dif2, "€"?></td>
            <td><?php echo $dif3, "€"?></td>
        </tr>
    </table>
</body>

</html>