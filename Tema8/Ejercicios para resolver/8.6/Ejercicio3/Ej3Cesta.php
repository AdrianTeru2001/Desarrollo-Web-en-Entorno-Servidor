<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        table{
            border: 1px solid black;
            text-align: center;
        }
        td,tr{
            border: 1px solid black;
            padding: 10px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
            font-size: 18px;
        }
    </style>
    <title>Ejercicio 3 Cesta</title>
</head>

<body>

    <?php 

        if (!isset($_SESSION["productos"])) {
            $fp = fopen("productos.txt", "r");
            while (!feof($fp)) {
                $linea = trim(fgets($fp));
                if ($linea !== "") {
                    $prod = explode("-", $linea); //Pasamos la cadena a un array dividido por guion "-"
                    $_SESSION["productos"][$prod[0]] = [$prod[1], $prod[2]]; //Pasamos los datos de los productos a un array
                }
            }
            fclose($fp);
        }

        //Calculamos el precio total de la compra
        if (!isset($_SESSION["totalP"])) {
            $arrayContProd = unserialize($_COOKIE["contProd"]);
            $nombreProd = array_keys($_SESSION["productos"]);
            $_SESSION["totalP"] = 0;
            for ($i=0; $i < count($_SESSION["productos"]); $i++) { 
                $_SESSION["totalP"] += $_SESSION["productos"][$nombreProd[$i]][0] * $arrayContProd[$nombreProd[$i]];
            }
        }

        //Eliminar algun producto de la cesta
        if (isset($_GET["eliminar"])) {
            $arrayContProd = unserialize($_COOKIE["contProd"]);
            $contTotal = $_COOKIE["contTotal"];
            $contTotal -= $arrayContProd[$_GET["prod"]];
            $arrayContProd[$_GET["prod"]] = 0;
            $prodC = serialize($arrayContProd);
            setcookie("contProd", $prodC, time()+1*60*60*60);
            setcookie("contTotal", $contTotal, time()+1*60*60*60);
            header("location: Ej3Cesta.php");
        }

        //Poner la cesta a 0, vaciar la cesta
        if (isset($_GET["reiniciar"])) {
            $arrayContProd = unserialize($_COOKIE["contProd"]);
            $nombreProd = array_keys($_SESSION["productos"]);
            $contTotal = $_COOKIE["contTotal"];
            $contTotal = 0;
            for ($i=0; $i < count($arrayContProd); $i++) { 
                $arrayContProd[$nombreProd[$i]] = 0;
            }
            $prodC = serialize($arrayContProd);
            setcookie("contProd", $prodC, time()+1*60*60*60);
            setcookie("contTotal", $contTotal, time()+1*60*60*60);
            header("location: Ej3Cesta.php");
        }

    ?>

    <h1>Tienda On-Line Ancá Terué</h1>

    <table class="tabla1">

        <tr>
            <td colspan="5"><h2>PRODUCTOS EN TU CESTA</h2></td>
        </tr>

        <tr>
            <td><strong>Nombre</strong></td>
            <td><strong>Precio</strong></td>
            <td><strong>Cantidad</strong></td>
            <td><strong>Imagen</strong></td>
            <td><a href="Ej3.php"><strong>Volver a la tienda</strong></a></td>
        </tr>
        
        <?php 
            //Vamos mostrando los productos que existen en la tabla según se hayan metido o no en la cesta
            if (isset($_SESSION["productos"])) {
                $productosArray = $_SESSION["productos"];
                $nombreProd = array_keys($_SESSION["productos"]);
                $arrayContProd = unserialize($_COOKIE["contProd"]);
                for ($i=0; $i < count($productosArray); $i++) { 
                    if ($arrayContProd[$nombreProd[$i]]>0) {
                        echo "<tr>";
                        echo "<td>",$nombreProd[$i],"</td>";
                        echo "<td>",$productosArray[$nombreProd[$i]][0],"</td>";
                        echo "<td>",$arrayContProd[$nombreProd[$i]],"</td>";
                        echo "<td> <img src='",$productosArray[$nombreProd[$i]][1],"' alt='",$nombreProd[$i],"' width='200px' height'150px'></td>";
                        echo "<td> <form action='Ej3Cesta.php' method='get'>";
                        echo "<input type='hidden' name='prod' value='",$nombreProd[$i],"'>";
                        echo "<input type='hidden' name='eliminar' value='1'>";
                        echo "<input type='submit' value='Eliminar'>";
                        echo "</form> </td>";    
                    }
                    
                }
            }
        
        ?>

        <!-- Totales y opción de reinicar la cesta -->
        <tr>
            <td><strong>Totales</strong></td>
            <td><strong><?php echo $_SESSION["totalP"]; ?> €</strong></td>
            <td><strong><?php echo $_COOKIE["contTotal"]; ?></strong></td>
            <td colspan="2"><form action="Ej3Cesta.php" method="get">
                <input type="hidden" name="reiniciar" value="1">
                <input type="submit" value="Reiniciar Cesta"> 
            </form></td>
        </tr>

    </table>

</body>

</html>