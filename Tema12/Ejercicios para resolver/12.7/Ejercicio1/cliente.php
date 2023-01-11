<!-- Ejercicio 1
Crea un servicio web para pasar de euros a pesetas y de pesetas a euros. Si se pasa por la URL una cantidad en euros, 
el programa lo debe convertir en pesetas y viceversa. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>

    <!-- Pedimos los datos mediante un formulario -->
    <form action="cliente.php" method="get">
        Moneda: 
        <select name="moneda">
            <option value="euros">Euros</option>
            <option value="pesetas">Pesetas</option>
        </select>
        <br>
        Cantidad: <input type="number" name="cant" step="any">
        <input type="submit" value="Convertir">
    </form>
    <hr>

    <?php 
    
        if (isset($_GET["cant"])) { //Vemos si hemos mandado la cantidad
            error_reporting(E_ALL ^ E_WARNING);
            $cantidad = $_GET["cant"];
            $moneda = $_GET["moneda"];
            $parametros = '?moneda='.$moneda.'&cant='.$cantidad;
            //Recojemos los datos de parte del servidor
            $json = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio1/servidor.php".$parametros);
            $conversion = json_decode($json); //Lo decodificamos de json
            //Mostramos todos los datos
            if ($conversion->codigo == 0) {
                echo "Son ".round($conversion->resultado, 2)." $conversion->moneda";
            } else {
                echo "Error número: ".$conversion->codigo;
                echo "<br>Descripción: ".$conversion->mensaje;
            }
        }

    ?>

</body>

</html>