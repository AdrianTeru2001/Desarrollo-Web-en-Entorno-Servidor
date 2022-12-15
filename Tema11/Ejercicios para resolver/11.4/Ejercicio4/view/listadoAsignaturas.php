<!-- Listado Asignaturas Ejercicio 3 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Asignaturas</title>
</head>

<body>

    <h1 class="listadoAsigH1">Listado Asignaturas</h1>
    <a href="../view/formAsignatura.php"><div class="boton">Nueva Asignatura</div></a>
    <a href="../controller/index.php"><div class="botonAsig">Volver a Listado Alumnos</div></a>

    <div class="listadoAlumnos">
        <h1 class="asignaturaH1">Asignaturas</h1>
        <?php 
            foreach ($asignaturas["asignaturas"] as $asignatura) {
                ?>
                    <div class="alumnos">
                        <h2><?= $asignatura->getNombre() ?></h2>
                        <h3>Código -> <?= $asignatura->getCodigo() ?></h3>
                        <a href="../controller/borrarAsignatura.php?cod=<?= $asignatura->getCodigo() ?>"><div class="botonP">Borrar</div></a>
                    </div>
                <?php
            }
        ?>
    </div>

</body>

</html>