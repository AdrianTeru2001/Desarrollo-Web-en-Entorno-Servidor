<?php

    /* Para actualizar clientes */
    $url = "http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Examenes/Tercer%20Examen%20-%20Adri%C3%A1n%20Teruel%20Reina/servidor.php";
    $datos = ["dni" => $_POST["dni"], "dniGestor" => $_POST["dniGestor"]];
    $opciones = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "PUT",
            "content" => http_build_query($datos),
        ],
    ];
    $contexto = stream_context_create($opciones);
    $data = file_get_contents($url, false, $contexto);
    echo "<pre>"; print_r(json_decode($data)); echo "</pre>";
    echo "<br><br>";
    echo "<a href='index.php'><h3>VOLVER</h3></a>";