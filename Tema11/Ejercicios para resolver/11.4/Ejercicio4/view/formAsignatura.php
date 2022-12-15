<!-- Formulario Asignatura -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/estilosCSS.css" type="text/css">
    <title>Nueva Asignatura</title>
</head>

<body>
    
    <div class="formulario">
        <h1 class="formularioH1">Nueva Asignatura</h1>
        <form action="../controller/anadirAsignatura.php" method="post">
            <h3>Nombre</h3>
            <input type="text" size="50" name="nombre" required>
            <br><br>
            <input type="submit" value="Añadir Asignatura" class="boton">
        </form>

        <form action="../controller/verAsignaturas.php" method="post">
            <input type="submit" value="Volver a Listado Asignaturas" class="boton">
        </form>
    </div>

</body>

</html>