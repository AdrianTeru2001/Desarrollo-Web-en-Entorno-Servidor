<!-- Ejercicio 7
Modifica el ejercicio del carrito de la compra que obtenía los productos de un fichero, para que ahora estén almacenados en una 
base de datos llamada tienda. Por tanto, la aplicación deberá recuperar todos los productos de la base de datos al inicio.
Debe añadirse la funcionalidad que permita añadir nuevos productos en la Base de Datos, así como eliminarlos. 
Incluir un “type file” que permita subir al servidor, el archivo de imagen correspondiente al producto nuevo que se está añadiendo. -->
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
            margin-right: 80px;
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
    </style>
    <title>Ejercicio 7</title>
</head>

<body>

    <?php 
    
        //Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "usuario", "usuario");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: ". $e->getMessage());
        }

        //Codigo que se utiliza al pulsar el botón de comprar un producto para añadir uno a la cantidad del producto en la base de datos
        if (isset($_GET["comprar"])) {
            $nombre = $_GET["comprar"];
            $consulta = $conexion->query("SELECT cantidad FROM carrito WHERE nombre='$nombre'");
            $prodC = $consulta->fetchObject();
            $cantidad = $prodC->cantidad+1;
            $update= "UPDATE carrito SET cantidad='$cantidad' WHERE nombre='$nombre'";
            $conexion->exec($update);   
            header("Location: Ej7.php"); 
        }

        //Codigo que se utiliza al pulsar el botón de eliminar un producto para vaciar el producto del carrito
        if (isset($_GET["eliminar"])) {
            $nombre = $_GET["eliminar"];
            $update= "UPDATE carrito SET cantidad=0 WHERE nombre='$nombre'";
            $conexion->exec($update);   
            header("Location: Ej7.php"); 
        }

        //Codigo que se utiliza al pulsar el botón de eliminar un producto para eliminar dicho producto de la tienda
        if (isset($_GET["eliminarProd"])) {
            $nombre = $_GET["eliminarProd"];
            $delete = "DELETE FROM productos WHERE nombre='$nombre'";
            $conexion->exec($delete);   
            $delete = "DELETE FROM carrito WHERE nombre='$nombre'";
            $conexion->exec($delete);   
            header("Location: Ej7.php"); 
        }

        //Codigo para poder registrar un producto nuevo
        if (isset($_POST["anadir"])) {
            $nombre = $_POST["nombre"];
            $consulta = $conexion->query("SELECT * FROM productos WHERE nombre='$nombre'");
            $prodBD = $consulta->fetchObject();
            if ($prodBD->nombre != $nombre) {
                $precio = $_POST["precio"];
                $imagen = "img/".$_FILES["imagen"]["name"];
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "$imagen");
                $insercion = "INSERT INTO productos VALUES ('$nombre','$precio','$imagen')";
                $conexion->exec($insercion); 
                $insercion = "INSERT INTO carrito VALUES ('$nombre','$precio','$imagen', 0)";
                $conexion->exec($insercion); 
                header("Location: Ej7.php"); 
            } else {
                header("Location: Ej7.php?existe=1");
            }
        }

        //Mensaje que sale cuando intentamos introducir un producto que ya existe en la base de datos
        if (isset($_GET["existe"])) {
            echo "<h1>El producto que quieres añadir ya existe en la tienda</h1>";
        }

        //Tabla donde mostramos los productos de la base de datos mediante un select (consulta)
        echo "<table>";
        echo "<tr><td colspan='4'><h1>Tienda On-Line Ancá Terué</h1></td></tr>";
        echo "<tr><td><h2>Nombre</h2></td><td><h2>Precio</h2></td><td><h2>Imagen</h2></td></tr>";
        $consulta = $conexion->query("SELECT * FROM productos"); 
        while ($producto = $consulta->fetchObject()) {
            echo "<tr>";
            echo "<td>".$producto->nombre."</td><td>".$producto->precio."</td><td><img src='".$producto->imagen."' alt='".$producto->nombre."'></td>";
            echo "<td>";
            echo "<form action='Ej7.php' method='get'>";
            echo "<input type='hidden' name='comprar' value='$producto->nombre'>";
            echo "<input type='submit' value='Comprar Producto'>";
            echo "</form>";
            echo "<br><br>";
            echo "<form action='Ej7.php' method='get'>";
            echo "<input type='hidden' name='eliminarProd' value='$producto->nombre'>";
            echo "<input type='submit' value='Eliminar Producto'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<form action='Ej7.php' method='post' enctype='multipart/form-data'>";
        echo "<td><input type='text' name='nombre' required></td>";
        echo "<td><input type='number' name='precio' required></td>";
        echo "<td><input type='file' name='imagen' required></td>";
        echo "<input type='hidden' name='anadir' value='1'>";
        echo "<td><input type='submit' value='Registrar Producto'></td>";
        echo "</form>";
        echo "</tr>";
        echo "</table>";

        //Tabla donde mostramos los productos del carrito de la base de datos mediante un select (consulta) con los totales de productos y precios
        $cantidad = 0;
        $total = 0;
        echo "<table>";
        echo "<tr class='nom'><td colspan='4'><h1>Carrito</h1></td></tr>";
        echo "<tr class='prop'><td><h2>Nombre</h2></td><td><h2>Precio</h2></td><td><h2>Imagen</h2></td><td><h2>Cantidad</h2></td></tr>";
        $consulta = $conexion->query("SELECT * FROM carrito"); 
        while ($carrito = $consulta->fetchObject()) {
            if ($carrito->cantidad>0) {
                $cantidad += $carrito->cantidad;
                $total += $carrito->precio*$carrito->cantidad;
                echo "<tr class='cli'>";
                echo "<td>".$carrito->nombre."</td><td>".$carrito->precio."</td><td><img src='".$carrito->imagen."' alt='".$carrito->nombre."'></td><td>".$carrito->cantidad."<br><br>";
                echo "<form action='Ej7.php' method='get'>";
                echo "<input type='hidden' name='eliminar' value='$carrito->nombre'>";
                echo "<input type='submit' value='Eliminar Producto'>";
                echo "</form>";
                echo "</tr>";    
            }
        }
        echo "<tr>";
        echo "<td><h2>Precio Total: </h2></td><td><h3>$total €</h3></td><td><h2>Productos Totales: </h2></td><td><h3>$cantidad productos</h3></td>";
        echo "</tr>";
        echo "</table>";

    ?>

</body>

</html>