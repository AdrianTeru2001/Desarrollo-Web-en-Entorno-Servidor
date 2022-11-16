<!-- Ejercicio 2
Modifica el programa anterior añadiendo las siguientes mejoras:
• El listado debe aparecer paginado en caso de que haya muchos clientes.
• Al hacer un alta, se debe comprobar que no exista ningún cliente con el DNI introducido en el formulario.
• La opción de borrado debe pedir confirmación.
• Cuando se realice la modificación de los datos de un cliente, los campos que no se han cambiado deberán 
permanecer inalterados en la base de datos. -->
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
        .bor:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;

        }
        .mod:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
        }
    </style>
    <title>Ejercicio 2</title>
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
                header("Location: Ej2.php?existe=1"); 
            } else {
                $nombre = $_GET["nombre"];
                $direccion = $_GET["direccion"];
                $telefono = $_GET["telefono"];
                $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$dni','$nombre','$direccion','$telefono')";
                $conexion->exec($insercion); 
                header("Location: Ej2.php");   
            }
             
        }

        //Borrar clientes de la base de datos
        if (isset($_GET["borrado"])) {
            $dni = $_GET["borrado"];
            header("Location: Ej2Borrado.php?dni=$dni"); 
        }
        if (isset($_GET["borrar"])) {
            $dni = $_GET["borrar"];
            $delete = "DELETE FROM cliente WHERE dni='$dni'";
            $conexion->exec($delete);
        }

        //Modificar clientes de la base de datos
        if (isset($_GET["modificado"])) {
            $dni = $_GET["dni"];
            $consulta = $conexion->query("SELECT * FROM cliente WHERE dni='$dni'"); 
            $cliente = $consulta->fetchObject();
            if ($_GET["nombre"]=="") {
                $nombre = $cliente->nombre;
            } else {
               $nombre = $_GET["nombre"]; 
            }
            if ($_GET["direccion"]=="") {
                $direccion = $cliente->direccion;
            } else {
                $direccion = $_GET["direccion"];
            }
            if ($_GET["telefono"]=="") {
                $telefono = $cliente->telefono;
            } else {
                $telefono = $_GET["telefono"];
            }
            $update= "UPDATE cliente SET nombre='$nombre', direccion='$direccion', telefono='$telefono' WHERE dni='$dni'";
            $conexion->exec($update);   
            header("Location: Ej2.php"); 
        }
        
        //Tabla donde mostramos los clientes de la base de datos mediante un select (consulta)
        echo "<table>";
        echo "<tr class='nom'><td colspan='6'><h1>Clientes</h1></td></tr>";
        echo "<tr class='prop'><td><h2>DNI</h2></td><td><h2>Nombre</h2></td><td><h2>Dirección</h2></td><td><h2>Teléfono</h2></td><td colspan=2></td></tr>";
        if (!isset($_GET["clientes"])) {
            $consulta = $conexion->query("SELECT * FROM cliente LIMIT 5 "); 
        } else if ($_GET["clientes"]=="todos") {
            $consulta = $conexion->query("SELECT * FROM cliente"); 
        } else {
            $num = $_GET["clientes"];
            $consulta = $conexion->query("SELECT * FROM cliente LIMIT $num "); 
        }
        $num = isset($_GET["clientes"])? $_GET["clientes"]:5;
        while ($cliente = $consulta->fetchObject()) {
            echo "<tr class='cli'>";
            echo "<td>".$cliente->dni."</td><td>".$cliente->nombre."</td><td>".$cliente->direccion."</td><td>".$cliente->telefono."</td>";
            echo "<td>";
            echo "<form action='Ej2.php' method='get'>";
            echo "<input type='hidden' name='clientes' value='$num'>";
            echo "<input type='hidden' name='modificar' value='$cliente->dni'>";
            echo "<input type='submit' class='mod' value='Modificar Cliente'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form action='Ej2.php' method='get'>";
            echo "<input type='hidden' name='clientes' value='$num'>";
            echo "<input type='hidden' name='borrado' value='$cliente->dni'>";
            echo "<input type='submit' class='bor' value='Borrar Cliente'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>

    <br><br>

    <!-- Formulario para elegir cuantos clientes mostrar -->
    <form action="Ej2.php" method="get">
        Usuarios a mostrar: 
        <select name="clientes">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="todos">Todos</option>
        </select>
        <input type="submit" value="Mostrar">
    </form>

    <br><br>

    <!-- Formulario para añadir un cliente -->
    <table>
        <tr class="nom"><td colspan=5><h2>Insertar Cliente</h2></td></tr>
        <tr class="prop">
            <?php $num = isset($_GET["clientes"])? $_GET["clientes"]:5; ?>
            <form action="Ej2.php" method="get">
                <td>DNI: <input type="text" name="dni" required></td>
                <td>Nombre: <input type="text" name="nombre" required></td>
                <td>Dirección: <input type="text" name="direccion" required></td>
                <td>Telefono: <input type="text" name="telefono" required></td>
                <input type="hidden" name="clientes" value="<?php echo $num; ?>">
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
                <?php $num = isset($_GET["clientes"])? $_GET["clientes"]:5; ?>
                <form action="Ej2.php" method="get">
                    <td>DNI: <input type="text" name="dni" value="<?php echo $_GET["modificar"] ?>" readonly></td>
                    <td>Nombre: <input type="text" name="nombre"></td>
                    <td>Dirección: <input type="text" name="direccion"></td>
                    <td>Telefono: <input type="text" name="telefono"></td>
                    <input type="hidden" name="clientes" value="<?php echo $num; ?>">
                    <input type="hidden" name="modificado" value="1">
                    <td><input type="submit" class='mod' value="Modificar cliente"></td>
                </form>
            </tr>
        </table>
    <?php } ?>

</body>

</html>