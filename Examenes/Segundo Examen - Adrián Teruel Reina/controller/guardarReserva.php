<?php
    require_once "../model/Cita.php";

    //Añadir Producto a la base de datos
    echo var_dump($_GET["fecha"]);
    $citaAux = new Cita($_GET["paciente"], $_GET["medico"], $_GET["fecha"], $_GET["hora"]);
    $citaAux->insert();
    header("Location: ../controller/index.php");