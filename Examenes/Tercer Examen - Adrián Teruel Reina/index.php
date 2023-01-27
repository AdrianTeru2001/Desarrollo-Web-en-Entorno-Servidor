<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body style="text-align: center;">
    
    <!-- Formularios para hacer las peticiones -->
    <h1>Formulario de Peticiones para la API BANCO</h1>
    <hr>

    <h2>Clientes de un empleado</h2>
    <form action="verClientesEmpleado.php" method="post">
        DNI del empleado: <input type="text" name="dni"><br><br>
        <input type="submit" value="Consultar">
    </form>
    <br><hr>

    <h2>Añadir nuevo cliente</h2>
    <form action="anadirCliente.php" method="post">
        DNI: <input type="text" name="dni">
        Nombre: <input type="text" name="nombre">
        Dirección: <input type="text" name="direccion">
        Telefono: <input type="text" name="telefono">
        DNI de su gestor: <input type="text" name="dniGestor"><br><br>
        <input type="submit" value="Añadir">
    </form>
    <br><hr>

    <h2>Actualizar gestor del cliente</h2>
    <form action="actualizarCliente.php" method="post">
        DNI del cliente: <input type="text" name="dni">
        DNI del nuevo gestor: <input type="text" name="dniGestor"><br><br>
        <input type="submit" value="Actualizar">
    </form>
    <br><hr>

    <h2>Eliminar un empleado</h2>
    <form action="eliminarEmpleado.php" method="post">
        DNI del empleado: <input type="text" name="dniEmpleado"><br><br>
        <input type="submit" value="Borrar">
    </form>
    <br><hr>

</body>

</html>