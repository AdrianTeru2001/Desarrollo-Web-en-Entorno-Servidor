<!-- Listado Alumnos Ejercicio 3 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Alumnos</title>
</head>

<body>

    <h1 class="listadoH1">Listado Alumnos</h1>
    <a href="../view/formAlumno.php"><div class="boton">Nuevo Alumno</div></a>
    <a href="../controller/verAsignaturas.php"><div class="boton">Ver Asignaturas</div></a>

    <div class="listadoAlumnos">
        <h1 class="alumnoH1">Alumnos</h1>
        <?php 
            foreach ($alumnos["alumnos"] as $alumno) {
                ?>
                    <div class="alumnos">
                        <h2><?= $alumno->getNombre()." ".$alumno->getApellidos() ?></h2>
                        <h3>Matricula -> <?= $alumno->getMatricula() ?></h3>
                        <h3>Curso -> <?= $alumno->getCurso() ?></h3>
                        <a href="../controller/borrarAlumno.php?mat=<?= $alumno->getMatricula() ?>"><div class="botonP">Borrar</div></a>
                        <a href="../controller/verAlumAsig.php?mat=<?= $alumno->getMatricula() ?>"><div class="botonDet">Detalles</div></a>
                    </div>
                <?php
            }
        ?>
    </div>

</body>

</html>