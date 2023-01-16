<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Principal</title>
</head>

<body>

    <?php 
    
        if (!isset($paginaIndex)) {
            session_start();
            if (!isset($_SESSION["inicio"])) {
                header("Location: formInicioSesion.php");
            }
        }
        
    ?>
    
    <h1>Consultas los Productos de la Base de Datos:</h1>
    <form action="../controller/cerrarSesion.php" method="get">
        <input type="submit" value="Cerrar Sesion"> <!-- Boton para cerrar sesion -->
    </form>
    <hr>
    <!-- Formularios para las consultas de los productos -->
    <h3>Mostrar por Nombre:</h3>
    <form action="../controller/peticion.php" method="get">
        Nombre: <input type="text" name="nombre" required>
        <input type="submit" value="Mostrar por Nombre">
    </form>
    <br><br>
    <h3>Mostrar por Precio:</h3>
    <form action="../controller/peticion.php" method="get">
        Precio Mínimo: <input type="number" name="pMin" required>
        Precio Máximo: <input type="number" name="pMax" required>
        <input type="submit" value="Mostrar por Precio">
    </form>
    <br><br>
    <h3>Mostrar Todos los Productos:</h3>
    <form action="../controller/peticion.php" method="get">
        <input type="hidden" name="todos">
        <input type="submit" value="Mostrar Todos los Productos">
    </form>
</body>

</html>