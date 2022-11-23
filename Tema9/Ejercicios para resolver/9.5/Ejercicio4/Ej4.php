<!-- Ejercicio 4
Crea el programa GESTISIMAL (GESTIón SIMplifcada de ALmacén) para llevar el control de los artículos de un almacén.
De cada artículo se debe saber el código, la descripción, el precio de compra, el precio de venta y el stock (número de unidades). 
La entrada y salida de mercancía supone respectivamente el incremento y decremento de stock de un determinado artículo. 
Hay que controlar que no se pueda sacar más mercancía de la que hay en el almacén. El programa debe tener, al menos, las siguientes 
funcionalidades: listado, alta, baja, modificación, entrada de mercancía y salida de mercancía. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            text-align: center;
            background-color: rgb(235, 235, 235);
        }
        table, td{
            border-bottom: 2px solid black;
            border-collapse: collapse;
        }
        table{
            margin: auto;
        }
        td{
            height: 50px;
            width: 80px;
            padding: 10px;
        }
        .bor{
            background-color: rgb(217, 83, 76);
            border-radius: 10px;
            padding: 8px;
        }
        .mod{
            background-color: rgb(241, 175, 74);
            border-radius: 10px;
            padding: 8px;
        }
        .eys{
            background-color: rgb(60, 120, 169);
            border-radius: 10px;
            padding: 8px;
        }
        .nom{
            background-color: gray;
        }
        .prop{
            background-color: lightgrey;
        }
        .cli{
            background-color: whitesmoke;
        }
        .bor:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
        }
        .mod:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
        }
        .eys:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
        }
    </style>
    <title>Ejercicio 4</title>
</head>

<body>
    
    <?php 
    
        //Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "usuario", "usuario");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: ". $e->getMessage());
        }

        //Añadir articulos a la base de datos
        if (isset($_GET["anadir"])) {
            $codigo = $_GET["cod"];
            $consulta = $conexion->query("SELECT * FROM articulos WHERE codigo='$codigo'");
            if ($consulta->rowCount()>0) {
                header("Location: Ej4.php?existe=1"); 
            } else {
                $descripcion = $_GET["desc"];
                $precioC = $_GET["pC"];
                $precioV = $_GET["pV"];
                $margen = $precioV-$precioC;
                $stock = $_GET["stock"];
                $insercion = "INSERT INTO articulos VALUES ('$codigo','$descripcion','$precioC','$precioV','$margen','$stock')";
                $conexion->exec($insercion); 
                header("Location: Ej4.php");   
            }
             
        }

        //Salta el mensaje si el artículo que se va a introducir ya existe en la base de datos
        if (isset($_GET["existe"])) {
            echo "<h2>El Cliente ya existe en la base de datos</h2> <br><br>";
        }

        //Borrar articulos de la base de datos
        if (isset($_GET["eliminar"])) {
            $codigo = $_GET["eliminar"];
            $delete = "DELETE FROM articulos WHERE codigo='$codigo'";
            $conexion->exec($delete);
        }

        //Modificar clientes de la base de datos
        if (isset($_GET["modificado"])) {
            $codigo = $_GET["cod"];
            $consulta = $conexion->query("SELECT * FROM articulos WHERE codigo='$codigo'"); 
            $articulo = $consulta->fetchObject();
            if ($_GET["desc"]=="") {
                $descripcion = $articulo->descripcion;
            } else {
               $descripcion = $_GET["desc"]; 
            }
            if ($_GET["pC"]=="") {
                $precioC = $articulo->precioC;
            } else {
                $precioC = $_GET["pC"];
            }
            if ($_GET["pV"]=="") {
                $precioV = $articulo->precioV;
            } else {
                $precioV = $_GET["pV"];
            }
            if ($_GET["stock"]=="") {
                $stock = $articulo->stock;
            } else {
                $stock = $_GET["stock"];
            }
            $margen = $precioV-$precioC;
            $update= "UPDATE articulos SET descripcion='$descripcion', precioC='$precioC', precioV='$precioV', margen='$margen', stock='$stock' WHERE codigo='$codigo'";
            $conexion->exec($update);   
            header("Location: Ej4.php"); 
        }

        //Código para dar entrada a mas cantidad de un artículo
        if (isset($_GET["entrada"])) {
            $codigo = $_GET["articulo"];
            $stock = $_GET["stock"];
            $num = $_GET["num"];
            $newStock = $stock+$num;
            $update= "UPDATE articulos SET stock='$newStock' WHERE codigo='$codigo'";
            $conexion->exec($update);   
            header("Location: Ej4.php"); 
        }

        //Código para dar salida a una cantidad de un artículo
        if (isset($_GET["salida"])) {
            $codigo = $_GET["articulo"];
            $stock = $_GET["stock"];
            $num = $_GET["num"];
            if ($num>$stock) {
                header("Location: Ej4_Salida.php?salida=$codigo&stock=$stock&mayor=1"); 
            } else {
                $newStock = $stock-$num;
                $update= "UPDATE articulos SET stock='$newStock' WHERE codigo='$codigo'";
                $conexion->exec($update);   
                header("Location: Ej4.php"); 
            }
            
        }

        //Mensaje para decir que no puede retroceder de pagina si esta en la primera ni avanzar si está en la ultima
        if (isset($_GET["noMenos"])) {
            echo "<h2>No se puede retroceder una pagina mas, estás en la primera página</h2>";
        }
        if (isset($_GET["noMas"])) {
            echo "<h2>No se puede avanzar una pagina mas, estás en la última página</h2>";
        }

        //Tabla donde mostramos los artículos de la base de datos mediante un select (consulta)
        echo "<table>";
        echo "<tr class='nom'><td colspan='10'><h1>GESTISIMAL</h1></td></tr>";
        echo "<tr class='prop'><td><h3>Código</h3></td><td><h3>Descripción</h3></td><td><h3>Precio de Compra</h3></td><td><h3>Precio de Venta</h3></td><td><h3>Margen</h3></td><td><h3>Stock</h3></td><td colspan=4></td></tr>";
        $consulta2 = $conexion->query("SELECT * FROM articulos");
        $cont = 0;
        while ($articulos2 = $consulta2->fetchObject()) {
            $cont++;
        }
        //Vamos controlando en que pagina estamos y cuantos artículos mostramos
        $paginas = ceil($cont/5);
        if (isset($_GET["numero"])) {
            $num = $_GET["numero"];
            if ($num<1) {
                header("Location: Ej4.php?noMenos=1&numero=1"); 
            } else if ($num>$paginas) {
                header("Location: Ej4.php?noMas=1&numero=$paginas"); 
            } else {
                if ($num==1) {
                    $consulta = $conexion->query("SELECT * FROM articulos LIMIT 5 ");
                } else if ($num==$paginas) {
                    $limit1 = (($num-1)*5);
                    $consulta = $conexion->query("SELECT * FROM articulos LIMIT $limit1,5 ");
                } else {
                    $limit1 = (($num-1)*5);
                    $consulta = $conexion->query("SELECT * FROM articulos LIMIT $limit1,5 ");
                }
            }
        } else {
            $consulta = $conexion->query("SELECT * FROM articulos LIMIT 5 ");
        }
        $num = isset($_GET["numero"])? $_GET["numero"]:1; 
        //Mostramos todos los artículos
        while ($articulos = $consulta->fetchObject()) {
            echo "<tr class='cli'>";
            echo "<td>".$articulos->codigo."</td><td>".$articulos->descripcion."</td><td>".$articulos->precioC."</td><td>".$articulos->precioV."</td><td>".$articulos->margen."</td><td>".$articulos->stock."</td>";
            echo "<td>";
            echo "<form action='Ej4.php' method='get'>";
            echo "<input type='hidden' name='numero' value='$num'>";
            echo "<input type='hidden' name='eliminar' value='$articulos->codigo'>";
            echo "<input type='submit' class='bor' value='Eliminar'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form action='Ej4_Modificar.php' method='get'>";
            echo "<input type='hidden' name='numero' value='$num'>";
            echo "<input type='hidden' name='modificar' value='$articulos->codigo'>";
            echo "<input type='submit' class='mod' value='Modificar'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form action='Ej4_Entrada.php' method='get'>";
            echo "<input type='hidden' name='numero' value='$num'>";
            echo "<input type='hidden' name='entrada' value='$articulos->codigo'>";
            echo "<input type='hidden' name='stock' value='$articulos->stock'>";
            echo "<input type='submit' class='eys' value='Entrada'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form action='Ej4_Salida.php' method='get'>";
            echo "<input type='hidden' name='numero' value='$num'>";
            echo "<input type='hidden' name='salida' value='$articulos->codigo'>";
            echo "<input type='hidden' name='stock' value='$articulos->stock'>";
            echo "<input type='submit' class='eys' value='Salida'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        //Avanzar y retroceder de pagina
        echo "<tr class='prop'>";
        echo "<td colspan=3>Página $num de $paginas</td>";
        echo "<td><form action='Ej4.php'><input type='hidden' name='numero' value='1'><input type='submit' value='Primera'></form></td>";
        echo "<td><form action='Ej4.php'><input type='hidden' name='numero' value='",($num-1),"'><input type='submit' value='Anterior'></form></td>";
        echo "<td><form action='Ej4.php'><input type='hidden' name='numero' value='",($num+1),"'><input type='submit' value='Siguiente'></form></td>";
        echo "<td><form action='Ej4.php'><input type='hidden' name='numero' value='$paginas'><input type='submit' value='Última'></form></td>";
        echo "<td colspan=3></td>";
        echo "</tr>";
        echo "</table>";

    ?>

    <br><br>

    <!-- Formulario para añadir un artículo -->
    <table>
        <tr class="nom"><td colspan=6><h2>Añadir Artículo</h2></td></tr>
        <tr class="prop">
            <form action="Ej4.php" method="get">
                <td>Código: <input type="text" name="cod" required></td>
                <td>Descripción: <input type="text" name="desc" required></td>
                <td>Precio de compra: <input type="text" name="pC" required></td>
                <td>Precio de venta: <input type="text" name="pV" required></td>
                <td>Stock: <input type="text" name="stock" required></td>
                <input type="hidden" name="anadir" value="1">
                <td><input type="submit" class='mod' value="Nuevo Artículo"></td>
            </form>
        </tr>
    </table>

</body>

</html>