<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llamada - Ejercicio 5</title>
</head>

<body>
    
    <?php 
        //Recogemos los datos y mostramos a que piso y bloque ha llamado
        $bloque = $_REQUEST["bloque"];
        $piso = $_REQUEST["piso"];
        echo "<h1>Usted ha llamado al piso ",$piso," del bloque ",$bloque,"</h1>"
    ?>

</body>

</html>