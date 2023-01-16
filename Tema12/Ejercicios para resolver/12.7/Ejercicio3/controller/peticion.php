<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peticiones</title>
</head>

<body>
    
    <?php
        
        session_start();

        require_once "../model/Cliente.php";

        if (!isset($_SESSION["inicio"])) {
            header("Location: ../view/formInicioSesion.php");
        }

        //Funciones
        function mostrarProd($productos){
            foreach ($productos as $prod) {
                echo "Codigo -> ".$prod->codigo."<br>";
                echo "Nombre -> ".$prod->nombre."<br>";
                echo "Precio -> ".$prod->precio."€<br>";
                echo "Imagen -> ".$prod->imagen."<br>";
                echo "Stock -> ".$prod->stock."<br>";
                echo "Descripción -> ".$prod->descripcion."<br><br>";
            }
        }

        //Según que valores llegue de la pagina principal, mostramos unos u otros productos
        if (isset($_GET["nombre"])) {
            $nombre = $_GET["nombre"];
            //Recogemos los productos
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio3/controller/consultaProd.php?nombre=".$nombre);
            $productos = json_decode($data); //Le hacemos el json_decode a los productos recogidos
            echo "<h1>Productos por Nombre:</h1>";
            mostrarProd($productos); //Función mostrar productos
            Cliente::sumarPeticion($_SESSION["inicio"]["usuario"]); //Con esto sumamos 1 a las peticiones del usuario que haya iniciado sesion
        } else if (isset($_GET["pMin"]) && isset($_GET["pMax"])) {
            $min = $_GET["pMin"];
            $max = $_GET["pMax"];
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio3/controller/consultaProd.php?pMin=".$min."&pMax=".$max);
            $productos = json_decode($data);
            echo "<h1>Productos por Precio:</h1>";
            mostrarProd($productos);
            Cliente::sumarPeticion($_SESSION["inicio"]["usuario"]);
        } else {
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio3/controller/consultaProd.php");
            $productos = json_decode($data);
            echo "<h1>Todos los Productos:</h1>";
            mostrarProd($productos);
            Cliente::sumarPeticion($_SESSION["inicio"]["usuario"]);
        }

    ?>

    <form action="index.php" method="get">
        <input type="submit" value="Volver a la Pagina Principal">
    </form>

</body>

</html>
