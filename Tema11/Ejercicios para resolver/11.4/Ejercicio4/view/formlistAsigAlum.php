<!-- Listado Alumnos con Asignaturas Ejercicio 3 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Alumnos</title>
</head>

<body>

    <h1 class="listadoAAH1">Alumno y Asignaturas</h1>

    <div class="listadoAlumnos">

        <form action="../controller/anadirAlumAsig.php" method="post">
            
            <select name="asig" <?php if (count($asignaturas["asignaturas"]) == count($nomAsig)) {
                    echo "disabled";
                }?>>
            <?php
                foreach ($asignaturas["asignaturas"] as $asignatura) {
                    if (in_array($asignatura->getNombre(), $nomAsig)) {
                    } else {
                    ?>
                    <option value="<?= $asignatura->getCodigo() ?>"><?= $asignatura->getNombre() ?></option>
                    <?php
                    }
                }
            ?>
            </select>
            <input type="hidden" name="mat" value="<?= $_GET['mat'] ?>">
            <br><br>
            <input type="submit" value="Anadir Asignatura" class="boton" <?php if (count($asignaturas["asignaturas"]) == count($nomAsig)) {
                    echo "disabled";
                }?>>
        </form>

        <form action="../controller/index.php" method="post">
            <input type="submit" value="Volver al Inicio" class="boton">
        </form>

        <?php 
            echo "<h1 class='alumnoAAH1'>Asignaturas del alumno -> ".$_GET['mat']."</h1>"; 

            for ($i=0; $i < count($nomAsig); $i++) { 
                echo "<h2>",$nomAsig[$i],"</h2>";?>
                <a href="../controller/borrarAlumAsig.php?mat=<?= $_GET['mat'] ?>&cod=<?= $codigos[$i] ?>"><div class="botonP">Desmatricular</div></a>
                <?php
            }
        ?>

    </div>

</body>

</html>