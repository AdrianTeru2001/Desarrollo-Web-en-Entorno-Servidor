<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        .tabla{
            text-align: center;
            border: 1px solid black;
        }
        td,td{
            text-align: center;
            border: 1px solid black;
        }
    </style>
    <title>Ejercicio 2 - Categoria</title>
</head>

<body>
    
    <table class="tabla">

        <tr>
            <td><strong>MATRICULA</strong></td>
            <td><strong>FECHA</strong></td>
            <td><strong>MARCA</strong></td>
            <td><strong>TIPO</strong></td>
            <td><strong>EXTRAS</strong></td>
        </tr>

        <?php 

            if ($_COOKIE["cochesS"]==" ") {
            } else {
                $coches = unserialize($_COOKIE["cochesS"]);
                $matri = array_keys($coches);
                $cat = $_GET["categoria"];
                for ($i=0; $i < count($coches); $i++) {
                    if ($coches[$matri[$i]][2]==$cat) {
                        echo "<tr>";
                        echo "<td>",$matri[$i],"</td>";
                        echo "<td>",$coches[$matri[$i]][0],"</td>";
                        echo "<td>",$coches[$matri[$i]][1],"</td>";
                        echo "<td>",$coches[$matri[$i]][2],"</td>";
                        echo "<td>";
                        for ($j=0; $j < count($coches[$matri[$i]][3]); $j++) { 
                            echo "-",$coches[$matri[$i]][3][$j],"<br>";
                        }
                        echo "</td>";
                        echo "</tr>"; 
                    }   
                }
            }
        ?>

    </table>

    <br>

    <form action="Ej2.php" method="get">
        <input type="submit" value="VOLVER">
    </form>

</body>

</html>