<!-- Ejercicio 3
Modifica la tienda virtual realizada en el ejercicio 5 del tema 7, de tal forma que todos los 
datos de los artículos se guarden en una base de datos. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        table{
            border: 1px solid black;
            text-align: center;
            float: left;
        }
        td,tr{
            border: 1px solid black;
            padding: 10px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        img{
            width: 200px;
            height: 150px;
        }
        /* a:hover{
            font-size: 18px;
        } */
    </style>
    <title>Ejercicio 3</title>
</head>

<body>

    <!-- <h1>Tienda On-Line Ancá Terué</h1> -->

    <?php 
    
        //Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "usuario", "usuario");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: ". $e->getMessage());
        }

        //Tabla donde mostramos los productos de la base de datos mediante un select (consulta)
        echo "<table>";
        echo "<tr class='nom'><td colspan='4'><h1>Tienda On-Line Ancá Terué</h1></td></tr>";
        echo "<tr class='prop'><td><h2>Nombre</h2></td><td><h2>Precio</h2></td><td><h2>Imagen</h2></td></tr>";
        $consulta = $conexion->query("SELECT * FROM productos"); 
        while ($producto = $consulta->fetchObject()) {
            echo "<tr class='cli'>";
            echo "<td>".$producto->nombre."</td><td>".$producto->precio."</td><td><img src='".$producto->imagen."' alt='".$producto->nombre."'></td>";
            echo "<td>";
            echo "<form action='Ej3.php' method='get'>";
            echo "<input type='hidden' name='comprar' value='$producto->nombre'>";
            echo "<input type='submit' value='Comprar Producto'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

        if (isset($_GET["comprar"])) {

        }

        //Tabla donde mostramos los productos del carrito de la base de datos mediante un select (consulta)
        echo "<table>";
        echo "<tr class='nom'><td colspan='4'><h1>Carrito</h1></td></tr>";
        echo "<tr class='prop'><td><h2>Nombre</h2></td><td><h2>Precio</h2></td><td><h2>Imagen</h2></td><td><h2>Cantidad</h2></td></tr>";
        $consulta = $conexion->query("SELECT * FROM carrito"); 
        while ($carrito = $consulta->fetchObject()) {
            echo "<tr class='cli'>";
            echo "<td>".$carrito->nombre."</td><td>".$carrito->precio."</td><td><img src='".$carrito->imagen."' alt='".$carrito->nombre."'></td><td>".$producto->cantidad."</td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>

</body>

</html>