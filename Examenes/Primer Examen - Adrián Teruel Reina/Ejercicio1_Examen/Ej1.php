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
    <title>Ejercicio 1</title>
</head>

<body>
    
    <?php 

        if (!isset($_COOKIE["cochesS"])) {
            $tiposArray = array(0 => "Turismo", 1 => "Berlina", 2 => "Monovolumen", 3 => "Deportivo", 4 => "Furgoneta"); 
            $tiposString = serialize($tiposArray);
            setcookie("tiposS", $tiposString, time()+12*30*24*3600);
            setcookie("matriculasS", " ", time()+12*30*24*3600);
            setcookie("cochesS", " ", time()+12*30*24*3600);
            header("location: Ej1.php");
        }

        if (isset($_GET["anadir"])) {
            if (strlen($_GET["marca"])>=3) {
                //Matricula
                if ($_COOKIE["matriculasS"]==" ") {
                    $ale = rand(100, 999);
                    $letras = $_GET["marca"];
                    $letrasMat = strtoupper(substr($letras, strlen($letras)-3, strlen($letras)));
                    $matricula = $ale."-".$letrasMat;
                    $mat[] = $matricula;
                    $matString = serialize($mat);
                    setcookie("matriulasS", $matString, time()+12*30*24*3600);
                    header("location: Ej1.php");
                } else {
                    $matArray = unserialize($_COOKIE["matriculasS"]);
                    $cont = 1;
                    while ($cont>0) {
                        $cont=0;
                        $ale = rand(100, 999);
                        $letras = $_GET["marca"];
                        $letrasMat = strtoupper(substr($letras, strlen($letras)-3, strlen($letras)));
                        $matricula = $ale."-".$letrasMat;
                        for ($i=0; $i < count($matArray); $i++) { 
                            if ($matArray[$i]==$matricula) {
                                $cont += 1;
                            }
                        }
                    }
                    $mat[] = $matricula;
                    $matString = serialize($mat);
                    setcookie("matriulasS", $matString, time()+12*30*24*3600);
                    header("location: Ej1.php");
                }
                //Extras
                $extras = [];
                if (isset($_GET["camara"])) {
                    $extras[] = $_GET["camara"];
                }
                if (isset($_GET["llantas"])) {
                    $extras[] = $_GET["llantas"];
                }
                if (isset($_GET["clima"])) {
                    $extras[] = $_GET["clima"];
                }
                //Fecha
                $diaSemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                $fechaDia = date("w", strtotime("now"));
                $fechaBarra = date("d/m/Y", strtotime("now"));
                $fecha = $diaSemana[$fechaDia]." - ".$fechaBarra;
                if ($_COOKIE["cochesS"]==" ") {
                    $cochesArray[$matricula] = array($fecha, $_GET["marca"], $_GET["tipo"], $extras);
                    $cochesString = serialize($cochesArray);
                    setcookie("cochesS", $cochesString, time()+12*30*24*3600);
                    header("location: Ej1.php");
                } else {
                    $cochesArray = unserialize($_COOKIE["cochesS"]);
                    $cochesArray[$matricula] = array($fecha, $_GET["marca"], $_GET["tipo"], $extras);
                    $cochesString = serialize($cochesArray);
                    setcookie("cochesS", $cochesString, time()+12*30*24*3600);
                    header("location: Ej1.php");
                }
            } else {
                echo "La marca tiene que tener un mínimo de 3 carácteres.<br>";
            }
            
        }

    ?>

    <form action="Ej1.php" method="get">
        MARCA: <input type="text" name="marca" required>
        <select name="tipo">
            <?php 
                if (isset($_COOKIE["tiposS"])) {
                    $tiposArray = unserialize($_COOKIE["tiposS"]);
                    for ($i=0; $i < count($tiposArray); $i++) { 
                        echo "<option value='",$tiposArray[$i],"'>",$tiposArray[$i],"</option>";
                    }
                }
            ?>
        </select><br>
        Extras<br>
        <input type="checkbox" name="camara" value="Cámara trasera"> Cámara trasera <br>
        <input type="checkbox" name="llantas" value="Llantas de aleación"> Llantas de aleación <br>
        <input type="checkbox" name="clima" value="Climatizador"> Climatizador <br>
        <input type="hidden" name="anadir">
        <input type="submit" value="AÑADIR">
    </form>

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
                for ($i=0; $i < count($coches); $i++) {
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
        ?>

    </table>

</body>

</html>