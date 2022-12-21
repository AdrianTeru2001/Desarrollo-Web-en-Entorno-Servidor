<!-- Reservar -->
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

        $usuario = $_SESSION["inicioS"];

        echo "<h1>USUARIO: $usuario - Visitas:</h1>";


        /* echo $_GET["idPaciente"],"<br><br>";
        echo $_GET["id"],"<br><br>";
        echo $fechaActual,"<br><br>"; */

    ?>

    <h2>MEDICO: <?= $_GET["nom"] ?> - Fecha: <?= $fechaActual ?> </h2>
    

    <!-- Tabla Reservas Disponibles -->
    <table>

        <tr>
            <td><strong>hora</strong></td>
            <td><strong>Reservar</strong></td>
        </tr>

        <?php 
        
            for ($i=8; $i <= 15; $i++) { ?>
                <tr>
                    <td><?= $i ?>:00h</td>
                    <?php 
                        if (Cita::getCitaOcupada($_GET["id"], $fechaActual, $i)) { ?>
                            <td>OCUPADA</td>
                    <?php } else { ?>
                            <td><a href="../controller/guardarReserva.php?paciente=<?= $_GET["idPaciente"] ?>&medico=<?= $_GET["id"] ?>&fecha=<?= $fechaActual ?>&hora=<?= $i ?>"><div class="botonR">RESERVAR</div></a></td>
                    <?php }
                    ?>
                </tr>
        <?php }?>


    </table>

    <br><br>
            
    <form action="../controller/index.php" method="post">
        <input type="submit" value="VOLVER AL LISTADO DE MÉDICOS">
    </form>


    <?php 
    
        /* $citaaa = Cita::getCitaById($_GET["idPaciente"], $_GET["id"], $fechaActual);

        echo var_dump($citaaa); */

    ?>
    
</body>

</html>