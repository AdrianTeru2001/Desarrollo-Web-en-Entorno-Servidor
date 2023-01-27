<?php 

//? Metodo GET para recuperar los articulos
if(isset($_GET["titulo"])){
    $titulo = $_GET["titulo"];
    $likes = $_GET["likes"];
    $data = file_get_contents("http://localhost/PHP/PHP/SimulacroExamen/api/articulosNormales.php?titulo=$titulo&likes=$likes");
    $data = json_decode($data);
    print_r($data);
    echo "<a href='cliente.php'>Volver</a>";
}

//? Envio por POST para recuperar articulos premium
if(isset($_GET["token"])){
    $url = "http://localhost/PHP/PHP/SimulacroExamen/api/articulospremium.php";
    $datos = ["token" => $_GET["token"], "texto" => $_GET["texto"]];
    $opciones = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($datos), # Agregar el contenido del formulario definido anteriormente en $datos
        ],
    ];
    $contexto = stream_context_create($opciones);
    $data = file_get_contents($url, false, $contexto);
    $data = json_decode($data);
    print_r($data);
    echo "<a href='cliente.php'>Volver</a>";
}

//? Envio por PUT para crear cuentas    
if(isset($_GET["nombre"])){
    $url = "http://localhost/PHP/PHP/SimulacroExamen/api/crearCuenta.php";
    $datos = ["nombre" => $_GET["nombre"]];
    $opciones = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "PUT",
            "content" => http_build_query($datos),
        ],
    ];
    $contexto = stream_context_create($opciones);
    $data = file_get_contents($url, false, $contexto);
    $data = json_decode($data);
    print_r($data);
    echo "<a href='cliente.php'>Volver</a>";
}

//? Envio por POST par activar cuentas
if(isset($_GET["token2"])){
    $url = "http://localhost/PHP/PHP/SimulacroExamen/api/activarCuenta.php";
    $datos = ["token" => $_GET["token2"]];
    $opciones = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($datos),
        ],
    ];
    $contexto = stream_context_create($opciones);
    $data = file_get_contents($url, false, $contexto);
    $data = json_decode($data);
    print_r($data);
    echo "<a href='cliente.php'>Volver</a>";
}

?>