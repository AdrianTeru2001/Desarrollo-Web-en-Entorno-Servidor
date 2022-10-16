<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{
            text-align: center;
        }
        table {
            border: 2px solid;
            margin: 0 auto;
            font-size: 30px;
        }
        tr, td {
            text-align: center;
            width: 80px;
            height: 80px;
            border: 2px solid;
        }
        a{
            text-decoration: none;
            font-size: 20px;
        }
    </style>
    <title>Ejercicio 1 - Loteria Primitiva</title>
</head>

<body>

    <?php 

        $array = $_REQUEST; //Recogemos todos los valores pasados de la página anterios
        $titulo = $_GET["titulo"]; //Recogemos el título del cartón

        function combinacion($array){ //Creamos el array "combinación()" pasandole como parámetro el array con todos los números
            $cont=0; //Contador para controlar cuales son los números normales y cual el número de serie
            foreach ($array as $elemento) { //Utilzamos el foreach para controlar los numeros del array
                if ($cont>=1 && $cont<=6) { //Del 1 al 6 son los números
                    if ($elemento=="") { //En caso de no haber introducido el número se genera solo con un "rand(1,49)"
                        $array2[] = rand(1,49);
                    } else { //Si lo hemos introducido se queda igual
                        $array2[] = $elemento;
                    }
                }
                if ($cont==7) { //Con esto controlamos el número de serie
                    if ($elemento=="") { //Si no tiene, nada se genera
                        $array2[] = rand(1,999);
                    } else { //Si tiene, se queda igual
                        $array2[] = $elemento;
                    }
                }
                $cont++;
            }
            return $array2; //Devolvemos el array con todos los números correctos
        }
        function imprimeApuesta($titulo, $array){
            if ($titulo=="") { //Si no se ha introducido título le añadimos uno por defecto
                $titulo = "Combinación generada para la Primitiva";
            }
            echo "<table>";
            echo "<tr>";
            echo "<td colspan=6><strong>$titulo</strong></td>"; //Colocamos el título en la tabla
            echo "</tr>";
            echo "<tr>";
            $cont = 0; //Contador para controlar el número de serie
            foreach ($array as $elemento) { //Metemos los elementos en la tabla con el foreach
                if ($cont<6) { //Controlamos los números normales
                    echo "<td>$elemento</td>";
                } else if ($cont==6) { //Controlamos el número de serie
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td colspan=6>Número de Serie: $elemento</td>";
                }
                $cont++;
            }
            echo "</tr>";
            echo "</table>";
        }

        $arrayNum = combinacion($array); //Llamamos a la función de generar la combinación de numeros correcta y lo pasamos a un array
        imprimeApuesta($titulo, $arrayNum); //Pasandole a la función "imprimeApuesta()" el título y el array, genera la tabla con el título y todos los números

    ?>

    <br><br>
    <a href='Ej1.php'>Volver para introducir los números</a> <!-- Enlace para volver a introducir los números -->

</body>

</html>