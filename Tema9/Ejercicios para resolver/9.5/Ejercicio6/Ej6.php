<!-- Ejercicio 6
Diseñar una aplicación web para consultar y actualizar tu horario de clase. Nada más cargar la página debe mostrar una tabla 
con tu horario semanal recuperado de la base de datos. Cada asignatura mostrada en la tabla es realmente un botón y al pulsar 
el botón de cada asignatura abre otra página que contiene un formulario con un desplegable que incluye todas las asignaturas posibles, 
y al elegir una y darle a grabar, actualizará el horario y volverá a la página principal.
Crear una base de datos llamada escuela y una tabla llamada horario con los siguientes campos: 
'dia', 'primera', 'segunda', 'tercera', 'cuarta', 'quinta', 'sexta'. Los campos se corresponden 
con la información del día de la semana, y sus seis horas de clase, por lo que en la tabla habrá una fila por cada día de la semana. 
Todos los campos son de tipo varchar y la clave de la tabla es 'dia', ya que no se puede repetir. -->
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
    <title>Ejercicio 6</title>
</head>

<body>
    
    <?php 
    
        //Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "usuario", "usuario");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die ("Error: ". $e->getMessage());
        }

        //Cambiamos la asignatura de la hora elegidas
        if (isset($_GET["cambio"])) {
            $dia = $_GET["dia"];
            $hora = $_GET["hora"];
            $asig = $_GET["asig"];
            $update= "UPDATE horario SET $hora='$asig' WHERE dia='$dia'";
            $conexion->exec($update);   
            header("Location: Ej6.php");
        }

        //Cogemos los dias y las asignaturas y las metemos en un array
        $consulta = $conexion->query("SELECT * FROM horario");
        $horarioArray = array();
        $diasSemana = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"];
        while ($horario = $consulta->fetchObject()) {
            $horarioArray[$horario->dia] = [$horario->primera, $horario->segunda, $horario->tercera, $horario->cuarta, $horario->quinta, $horario->sexta];
        }
        //Tabla con el horario
        echo "<table>";
        echo "<tr class='nom'><td colspan='5'><h1>HORARIO</h1></td></tr>";
        echo "<tr class='prop'>";
        for ($i=0; $i < count($diasSemana); $i++) { 
            echo "<td><h2>$diasSemana[$i]</h2></td>";
        }
        echo "</tr>";
        for ($i=0; $i < 6; $i++) { 
            echo "<tr class='cli'>";
                echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$diasSemana[0]."'><input type='hidden' name='hora' value='".$i."'><input type='submit' class='eys' value='".$horarioArray[$diasSemana[0]][$i]."'></form></td>";
                echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$diasSemana[1]."'><input type='hidden' name='hora' value='".$i."'><input type='submit' class='eys' value='".$horarioArray[$diasSemana[1]][$i]."'></form></td>";
                echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$diasSemana[2]."'><input type='hidden' name='hora' value='".$i."'><input type='submit' class='eys' value='".$horarioArray[$diasSemana[2]][$i]."'></form></td>";
                echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$diasSemana[3]."'><input type='hidden' name='hora' value='".$i."'><input type='submit' class='eys' value='".$horarioArray[$diasSemana[3]][$i]."'></form></td>";
                echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$diasSemana[4]."'><input type='hidden' name='hora' value='".$i."'><input type='submit' class='eys' value='".$horarioArray[$diasSemana[4]][$i]."'></form></td>";
            echo "</tr>";
        }
        echo "</table>";

    ?>

</body>

</html>