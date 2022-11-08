<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{font-weight:bold;}
    </style>
</head>
<body>
<h1>Juega a la lotería primitiva.</h1>
    <h3>Elige seis números y el numero de serie (1-999)</h3>
    <form action="Ejercicio7-2.php">
    <table border=1 cellspacing=0 cellpadding=0 bordercolor="green">
    <?php 
        $n=1;
        for ($i=0; $i<7 ; $i++) { 
            echo "<tr>";
            for ($j=0; $j<7 ; $j++) { 
                echo "<td><input type='checkbox' name='".$n."'>".$n."</td>";
                $n++;
            }
            echo "</tr>";
        }
    ?>
    </table>
    <br>NÚMERO DE SERIE: <input type="text" name="serie"><br>
    <br><input type="submit" value="JUGAR">
    </form>
    
</body>
</html>