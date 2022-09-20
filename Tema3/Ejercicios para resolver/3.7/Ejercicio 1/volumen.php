<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volumen del Cilindro</title>
</head>

<body>
    <h2>Volumen del cilindro:</h2>
    <?php
        $radio = $_GET["d"]/2;
        echo (pi()*pow($radio,2))*$_GET["a"];
    ?>
</body>

</html>