<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
</head>

<body>
    
    <?php

        if (isset($_GET["crear"])) {
            $url = "http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Ejemplos/Practicar%20Examen/Practicar%20Examen%20Tema%2012/servidor.php";
            $datos = ["nombre" => $_GET["nombre"], "crear" => 0];
            $opciones = [
                "http" => [
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                    "method" => "POST",
                    "content" => http_build_query($datos),
                ],
            ];
            $contexto = stream_context_create($opciones);
            $data = file_get_contents($url, false, $contexto);
            echo "<pre>". print_r(json_decode($data)) ."</pre>";
            echo "<br><br>";
            echo "<a href='cliente.php'><h3>VOLVER</h3></a>";

            /* $nombre = $_GET["nombre"];
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Ejemplos/Practicar%20Examen/Practicar%20Examen%20Tema%2012/servidor.php?nombre=$nombre&crear=0");
            echo "<pre>". print_r(json_decode($data)) ."</pre>";
            echo "<br><br>";
            echo "<a href='cliente.php'><h3>VOLVER</h3></a>"; */
        }

    ?>

</body>

</html>