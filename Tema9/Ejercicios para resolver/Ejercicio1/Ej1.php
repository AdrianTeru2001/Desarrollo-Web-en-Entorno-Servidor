<!-- Ejercicio 1
Crea una aplicación web que permita hacer listado, alta, baja y modificación sobre la tabla cliente de la base de datos banco.
• Para realizar el listado bastará un SELECT, tal y como se ha visto en los ejemplos.
• El alta se realizará mediante un formulario donde se especificarán todos los campos del nuevo registro. Luego esos datos se enviarán a una página que ejecutará INSERT.
• Para realizar una baja, se mostrará un botón que ejecutará DELETE.
• La modificación se realiza mediante UPDATE.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            text-align: center;
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
            background-color: red;
            border-radius: 10px;
            padding: 8px;
        }
        .mod{
            background-color: lightskyblue;
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
    </style>
    <title>Ejercicio 1</title>
</head>

<body>
    
    <?php 
    
        //Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "usuario", "usuario");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: ". $e->getMessage());
        }

        //Añadir clientes a la base de datos
        if (isset($_GET["anadir"])) {
            $dni = $_GET["dni"];
            $consulta = $conexion->query("SELECT * FROM cliente WHERE dni='$dni'");
            if ($consulta->rowCount()>0) {
                header("Location: Ej1.php?existe=1"); 
            } else {
                $nombre = $_GET["nombre"];
                $direccion = $_GET["direccion"];
                $telefono = $_GET["telefono"];
                $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$dni','$nombre','$direccion','$telefono')";
                $conexion->exec($insercion); 
                header("Location: Ej1.php");   
            }
             
        }

        //Borrar clientes de la base de datos
        if (isset($_GET["borrar"])) {
            $dni = $_GET["borrar"];
            $delete = "DELETE FROM cliente WHERE dni='$dni'";
            $conexion->exec($delete);
        }

        //Modificar clientes de la base de datos
        if (isset($_GET["modificado"])) {
            $dni = $_GET["dni"];
            $nombre = $_GET["nombre"];
            $direccion = $_GET["direccion"];
            $telefono = $_GET["telefono"];
            $update= "UPDATE cliente SET nombre='$nombre', direccion='$direccion', telefono='$telefono' WHERE dni='$dni'";
            $conexion->exec($update);   
            header("Location: Ej1.php"); 
        }
        
        //Tabla donde mostramos los clientes de la base de datos mediante un select (consulta)
        echo "<table>";
        echo "<tr class='nom'><td colspan='6'><h1>Clientes</h1></td></tr>";
        echo "<tr class='prop'><td><h2>DNI</h2></td><td><h2>Nombre</h2></td><td><h2>Dirección</h2></td><td><h2>Teléfono</h2></td><td colspan=2></td></tr>";
        $consulta = $conexion->query("SELECT * FROM cliente");
        while ($cliente = $consulta->fetchObject()) {
            echo "<tr class='cli'>";
            echo "<td>".$cliente->dni."</td><td>".$cliente->nombre."</td><td>".$cliente->direccion."</td><td>".$cliente->telefono."</td>";
            echo "<td>";
            echo "<form action='Ej1.php' method='get'>";
            echo "<input type='hidden' name='modificar' value='$cliente->dni'>";
            echo "<input type='submit' class='mod' value='Modificar Cliente'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form action='Ej1.php' method='get'>";
            echo "<input type='hidden' name='borrar' value='$cliente->dni'>";
            echo "<input type='submit' class='bor' value='Borrar Cliente'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>

    <br><br>

    <!-- Formulario para añadir un cliente -->
    <table>
        <tr class="nom"><td colspan=5><h2>Insertar Cliente</h2></td></tr>
        <tr class="prop">
            <form action="Ej1.php" method="get">
                <td>DNI: <input type="text" name="dni" required></td>
                <td>Nombre: <input type="text" name="nombre" required></td>
                <td>Dirección: <input type="text" name="direccion" required></td>
                <td>Telefono: <input type="text" name="telefono" required></td>
                <input type="hidden" name="anadir" value="1">
                <td><input type="submit" class='mod' value="Ingresar cliente"></td>
            </form>
        </tr>
    </table>

    <br><br>

    <!-- Si se introduce un dni que ya existe avisamos al usuario -->
    <?php 
        if (isset($_GET["existe"])) {
            echo "<h2>El Cliente ya existe en la base de datos</h2> <br><br>";
        }
    ?>

    <!-- Si pulsamos en modificar usuario se mostrará este formulario para modificarlo -->
    <?php if (isset($_GET["modificar"])) { ?>
        <table>
            <tr class="nom"><td colspan=5><h2>Modificar Cliente</h2></td></tr>
            <tr class="prop">
                <form action="Ej1.php" method="get">
                    <td>DNI: <input type="text" name="dni" value="<?php echo $_GET["modificar"] ?>" readonly></td>
                    <td>Nombre: <input type="text" name="nombre" required></td>
                    <td>Dirección: <input type="text" name="direccion" required></td>
                    <td>Telefono: <input type="text" name="telefono" required></td>
                    <input type="hidden" name="modificado" value="1">
                    <td><input type="submit" class='mod' value="Modificar cliente"></td>
                </form>
            </tr>
        </table>
    <?php } ?>

</body>

</html>