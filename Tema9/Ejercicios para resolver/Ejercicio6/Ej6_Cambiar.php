<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            text-align: center;
            background-color: rgb(235, 235, 235);
        }
        table, td{
            border-bottom: 2px solid black;
            border-collapse: collapse;
        }
        table{
            margin: auto;
            width: 400px;
        }
        td{
            height: 50px;
            width: 80px;
            padding: 10px;
        }
        .nom{
            background-color: gray;
        }
        .prop{
            background-color: lightgrey;
        }
        .cli{
            background-color: whitesmoke;
        }
        .eys{
            background-color: lightgrey;
            border-radius: 10px;
            padding: 8px;
            width: 150px;
            font-weight: bold;
        }
        .eys:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
        }
    </style>
    <title>Ejercicio 6 - Cambiar</title>
</head>

<body>
    
    <?php 

        //Recogemos las variables necesarias
        $dia = $_GET["dia"];
        $num = $_GET["hora"];
        $hora = "";
        switch ($num) { //Con un switch vemos a que hora pertenece la variable recogida como num
            case '0':
                $hora = "primera";
                break;
            case '1':
                $hora = "segunda";
                break;
            case '2':
                $hora = "tercera";
                break;
            case '3':
                $hora = "cuarta";
                break;
            case '4':
                $hora = "quinta";
                break;
            case '5':
                $hora = "sexta";
                break;
        }

    ?>

    <!-- Elegimos mediante un formulario select a que asignatura queremos cambiar -->
    <table>
        <tr class="nom"><td><h2>¿A cuál asignatura quieres cambiar en la <?= $hora; ?> hora del <?= $dia; ?></h2></td></tr>
        <form action="Ej6.php" method="get">
            <tr class="prop"><td>
                <select name="asig">
                    <option value="Servidor">Servidor</option>
                    <option value="Cliente">Cliente</option>
                    <option value="Diseño">Diseño</option>
                    <option value="Libre Configuracion">Libre Configuracion</option>
                    <option value="Despliegue">Despliegue</option>
                    <option value="Empresa">Empresa</option>
                </select>
            </td></tr>
            <input type="hidden" name="dia" value="<?= $dia ?>">
            <input type="hidden" name="hora" value="<?= $hora ?>">
            <input type="hidden" name="cambio" value="1">
            <tr class="cli"><td><input type="submit" class="eys" value="Cambiar Asignatura"></td></tr>
        </form>
    </table>

</body>

</html>