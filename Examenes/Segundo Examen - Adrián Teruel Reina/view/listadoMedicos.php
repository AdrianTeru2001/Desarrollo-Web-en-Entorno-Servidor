<!-- Listado Medicos -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Medicos</title>
    <style>
        table{
            border: 1px solid black;
            text-align: center;
        }
        tr, td{
            border: 1px solid black;
            padding: 5px;
        }
        .botonR{
            width: 150px;
            height: 20px;
            line-height: 20px;
            border: 1px solid black;
            border-radius: 4px;
        }
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>

    <?php 

        /* session_start(); */

        if (!isset($_SESSION["inicioS"]) || !$_SESSION["inicioS"] || $_SESSION["inicioS"]=="") {
            header("Location: inicioSesion.php");
        }

        echo "<h1>USUARIO: $usuario - Visitas:</h1>";

    ?>

    <!-- Tabla Medicos -->
    <table>

        <tr>
            <td><strong>Médico</strong></td>
            <td><strong>CITAS</strong></td>
        </tr>

        <?php foreach ($medicos["medicos"] as $med){ ?>
            <tr>
                <td><h3><?= $med->getNombre() ?></h3></td>
                <td><a href="../controller/reservar.php?nom=<?= $med->getNombre() ?>&id=<?= $med->getId() ?>&idPaciente=<?= $idPaciente ?>"><div class="botonR">RESERVAR CITA</div></a></td>
            </tr>
        <?php } ?>

    </table>

    <br><br>
            
    <form action="../controller/cerrarSesion.php" method="post">
        <input type="submit" value="CERRAR SESION DE USUARIO">
    </form>
    
</body>

</html>