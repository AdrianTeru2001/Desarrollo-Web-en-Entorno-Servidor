<!-- Formulario Alumno -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/estilosCSS.css" type="text/css">
    <title>Nuevo Alumno</title>
</head>

<body>
    
    <div class="formulario">
        <h1 class="formularioH1">Nuevo Alumno</h1>
        <form action="../controller/anadirAlumno.php" method="post">
            <h3>Matricula</h3>
            <input type="text" size="20" name="matricula" required>
            <h3>Nombre</h3>
            <input type="text" size="30" name="nombre" required>
            <h3>Apellidos</h3>
            <input type="text" size="50" name="apellidos" required>
            <h3>Curso</h3>
            <input type="number" min=0 name="curso" required>
            <br><br>
            <input type="submit" value="Añadir Alumno" class="boton">
        </form>

        <form action="../controller/index.php" method="post">
            <input type="submit" value="Volver al Inicio" class="boton">
        </form>
    </div>

</body>

</html>