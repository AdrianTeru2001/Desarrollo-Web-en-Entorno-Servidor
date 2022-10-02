<!-- EJERCICIO 4
Diseñar una página web que muestre una tabla con 3 columnas, la primera corresponde al número de bloque,
la segunda al piso y en la tercera hay un botón llamar. En total hay 10 bloques y cada bloque tiene 7 pisos. 
Cuando se pulse llamar en un piso de un bloque, mostrará en otra página el mensaje del tipo 
“Usted ha llamado al piso 3 del bloque 6”. Utiliza estructuras repetitivas para generar la tabla. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 250px;
            margin-left: auto;
            margin-right: auto;
        }
        tr, td{
            text-align: center;
            width: 100px;
            height: 25px;
            border: 1px solid red;
        }
    </style>
    <title>Bloques - Ejercicio 5</title>
</head>

<body>
    <table>
    <?php 
        $cont = 0;
        for ($i=0; $i < 10; $i++) {  //Hacemos la tabla de los bloques y pisos mediante 3 bucles anidados
            for ($j=0; $j < 7 ; $j++) { 
                echo "<tr>";
                for ($h=0; $h < 3; $h++) { 
                    if ($j==0 && $h==0) { //Con esto hacemos el bloque
                        echo "<td rowspan=7> Bloque ",$i+1," </td>";
                    } else if($h==1) { //Con esto hacemos el piso
                        echo "<td> Piso ",$j+1," </td>";
                    } else if($h==2) { //Con esto hacemos el boton para llamar al piso
                        echo "<td> <a href='Ej4_Llamada.php?bloque=",$i+1,"&piso=",$j+1,"'><input type='button' name='piso' value='Llamar'></a> </td>";
                    }
                }
                echo "</tr>";
            }    
        }
    ?>
    </table>
</body>

</html>