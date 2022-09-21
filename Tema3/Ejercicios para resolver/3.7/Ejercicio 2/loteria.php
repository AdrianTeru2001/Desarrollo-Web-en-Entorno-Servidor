<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,td{
            border: 4px solid blue;
            border-collapse: collapse;
        }
    </style>
    <title>Loteria Primitiva</title>
</head>

<body>
    <h1>Loteria Primitiva</h1>
    <table style="font-size: 20px;">
        <tr>
            <td>Números Generados</td>
            <td><?php echo rand(1,49) ?></td>
            <td><?php echo rand(1,49) ?></td>
            <td><?php echo rand(1,49) ?></td>
            <td><?php echo rand(1,49) ?></td>
            <td><?php echo rand(1,49) ?></td>
            <td><?php echo rand(1,49) ?></td>
            <td>Serie <?php echo rand(1,999) ?></td>
        </tr>
        <tr>
            <td>Tu cartón para el juego</td>
            <td><?php echo $_GET["n1"] ?></td>
            <td><?php echo $_GET["n2"] ?></td>
            <td><?php echo $_GET["n3"] ?></td>
            <td><?php echo $_GET["n4"] ?></td>
            <td><?php echo $_GET["n5"] ?></td>
            <td><?php echo $_GET["n6"] ?></td>
            <td>Serie <?php echo $_GET["s1"] ?></td>
        </tr>
    </table>
</body>

</html>