<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articulos Premium</title>
</head>

<body>
    
    <?php

        if (isset($_GET["premium"])) {
            $token = $_GET["token"];
            $texto = $_GET["texto"];
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Ejemplos/Practicar%20Examen/Practicar%20Examen%20Tema%2012/servidor.php?token=$token&texto=$texto&premium=0");
            echo "<pre>". print_r(json_decode($data)) ."</pre>";
            echo "<br><br>";
            echo "<a href='cliente.php'><h3>VOLVER</h3></a>";
        }

    ?>

</body>

</html>