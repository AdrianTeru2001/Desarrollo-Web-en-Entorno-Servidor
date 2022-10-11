<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        table{
            text-align: center;
            border: 1.5px solid;
            height: 200px;
        }
        tr,td{
            width: 100px;
            border: 1.5px solid;
        }
    </style>
    <title>Ejercicio 2 - Comida Rápida</title>
</head>

<body>

    <h1>Pedidos</h1>

    <?php 
        if (!$_REQUEST["oculto"]=="") { //Si la variable oculto tiene el String de array
            $comida = $_GET["oculto"]; //Pasamos el String a una variable
            /* $comida2 = []; */
            $comida2 = unserialize(base64_decode($comida)); //Transformamos el String en un array pasandolo a una variable array
            $cont = 0;
            echo "<table>"; //Metemos todos los pedidos en  una tabla
                echo "<tr>";
                    echo "<td><strong>Productos</strong></td>";
                    echo "<td  colspan=4><strong>Ingredientes</strong></td>";
                echo "</tr>";
                foreach ($comida2 as $elemento) { //Con un bucle anidado vamos mostrando los elementos del array bidimensional
                    $cont = 0;
                    echo "<tr>";
                    foreach ($elemento as $elemento2) {
                        if ($cont==0) {
                            echo "<td>",$elemento2,"</td>";
                            $cont++;
                        } else {
                            echo "<td>",$elemento2,"</td>";
                        }   
                    }
                    echo "</tr>";
                } 
            echo "</table>";
        } else { //Si no se le pasa ningun pedido nos dirá que no hemos pedido nada
            echo "No has pedido nada";
        }
        
    ?>

</body>

</html>