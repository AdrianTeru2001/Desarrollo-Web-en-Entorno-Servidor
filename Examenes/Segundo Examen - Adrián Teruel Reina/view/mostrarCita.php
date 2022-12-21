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

        session_start();

        if (!isset($_SESSION["inicioS"]) || !$_SESSION["inicioS"] || $_SESSION["inicioS"]=="") {
            header("Location: inicioSesion.php");
        }

        $usuario = $_SESSION["inicioS"];

        echo "<h2>Tiene una cita reservada para mañana</h2>";

    ?>
    
    <table>

        <tr>
            <td><strong>Doctor</strong></td>
            <td><strong><?= $_GET["medico"] ?></strong></td>
        </tr>

        <tr>
            <td>Hora</td>
            <td><?= $_GET["fecha"] ?></td>
        </tr>


    </table>

    <br><br>
            
    <form action="../controller/index.php" method="post">
        <input type="submit" value="VOLVER">
    </form>
    
</body>

</html>