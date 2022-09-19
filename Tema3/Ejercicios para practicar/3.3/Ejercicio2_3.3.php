<!-- Ejercicio 2
Modifica el programa anterior para que muestre tu dirección y tu número de teléfono.
Cada dato se debe mostrar en una línea diferente. Mezcla de alguna forma las salidas por pantalla, utilizando tanto HTML como PHP. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
        $nombre = "Adrián Teruel Reina";
        $direccion = "C/Gorrion Nº39";
        $telefono = "685705629";
        echo "Nombre -> ", $nombre, "<br>Dirección -> ", $direccion, "<br>Número de telefono -> ", $telefono;
    ?>
</body>

</html>