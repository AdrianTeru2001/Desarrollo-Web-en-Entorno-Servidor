<?php

    /* Para ver a los clientes de un empleado */
    $dni = $_POST["dni"];
    $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Examenes/Tercer%20Examen%20-%20Adri%C3%A1n%20Teruel%20Reina/servidor.php?dni=$dni");
    echo "<pre>"; print_r(json_decode($data)); echo "</pre>";
    echo "<br><br>";
    echo "<a href='index.php'><h3>VOLVER</h3></a>";