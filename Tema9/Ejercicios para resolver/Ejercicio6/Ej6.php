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
        .bor{
            background-color: rgb(217, 83, 76);
            border-radius: 10px;
            padding: 8px;
        }
        .mod{
            background-color: rgb(241, 175, 74);
            border-radius: 10px;
            padding: 8px;
        }
        .eys{
            background-color: rgb(60, 120, 169);
            border-radius: 10px;
            padding: 8px;
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
        .bor:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
        }
        .mod:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
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

        //Tabla donde mostramos el horario
        echo "<table>";
        echo "<tr class='nom'><td colspan='10'><h1>HORARIO</h1></td></tr>";
        /* echo "<tr class='prop'><td><h3>Código</h3></td><td><h3>Descripción</h3></td><td><h3>Precio de Compra</h3></td><td><h3>Precio de Venta</h3></td><td><h3>Margen</h3></td><td><h3>Stock</h3></td><td colspan=4></td></tr>"; */
        $consulta = $conexion->query("SELECT * FROM horario /* ORDER BY CASE dia WHEN 'Lunes' THEN 1, WHEN 'Martes' THEN 2, WHEN 'Miercoles' THEN 3, WHEN 'Jueves' THEN4, WHEN 'Viernes' THEN 5 END */");
        $consulta2 = $conexion->query("SELECT * FROM horario /* ORDER BY CASE dia WHEN 'Lunes' THEN 1, WHEN 'Martes' THEN 2, WHEN 'Miercoles' THEN 3, WHEN 'Jueves' THEN4, WHEN 'Viernes' THEN 5 END */");
        //Mostramos todos los artículos
        /* echo "<tr class='cli'>";
        while ($horario2 = $consulta->fetchObject()) {
            echo "<td>".$horario2->dia."</td>";
        }
        echo "</tr>"; */
        echo "<tr class='cli'>";
        while ($horario2 = $consulta2->fetchObject()) {
            echo "<td>".$horario2->dia."</td>";
        }
        echo "</tr>";
        while ($horario = $consulta->fetchObject()) {
            echo "<tr class='cli'>";
            echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$horario->dia."'><input type='hidden' name='hora' value='".$horario->primera."'><input type='submit' class='eys' value='".$horario->primera."'></form></td>";
            echo "</tr>";
            echo "<tr class='cli'>";
            echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$horario->dia."'><input type='hidden' name='hora' value='".$horario->segunda."'><input type='submit' class='eys' value='".$horario->segunda."'></form></td>";
            echo "</tr>";
            echo "<tr class='cli'>";
            echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$horario->dia."'><input type='hidden' name='hora' value='".$horario->tercera."'><input type='submit' class='eys' value='".$horario->tercera."'></form></td>";
            echo "</tr>";
            echo "<tr class='cli'>";
            echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$horario->dia."'><input type='hidden' name='hora' value='".$horario->cuarta."'><input type='submit' class='eys' value='".$horario->cuarta."'></form></td>";
            echo "</tr>";
            echo "<tr class='cli'>";
            echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$horario->dia."'><input type='hidden' name='hora' value='".$horario->quinta."'><input type='submit' class='eys' value='".$horario->quinta."'></form></td>";
            echo "</tr>";
            echo "<tr class='cli'>";
            echo "<td><form action='Ej6_Cambiar.php' method='get'><input type='hidden' name='dia' value='".$horario->dia."'><input type='hidden' name='hora' value='".$horario->sexta."'><input type='submit' class='eys' value='".$horario->sexta."'></form></td>";
            echo "</tr>";
        }

    ?>

</body>

</html>