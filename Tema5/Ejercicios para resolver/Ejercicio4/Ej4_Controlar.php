<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Test de Parejas</title>
</head>

<body>
    
    <?php 

        $array = $_REQUEST;
        array_pop($array);
        if ($_GET["oculto"]=="") {
            $parejas = [];
        } else {
            $texto = $_GET["oculto"];
            $parejas = unserialize(base64_decode($texto));
        }
        $array2 = [];
        foreach ($array as $elemento) {
            $array2[] = $elemento;
        }
        echo "<br><br>";
        $parejas[] = $array2;
        $junto = base64_encode(serialize($parejas));
        echo $junto;
        header("Refresh:0; url=Ej4.php?array=$junto");

    ?>

</body>

</html>