<!-- Ejercicio 3.
Modifica el ejercicio del carrito de la compra del tema anterior, para que los productos se almacenen en un fichero.
Debes crear una página para administrar (insertar y eliminar) los productos de la tienda (que están almacenados en dicho fichero). 
Puedes trabajar con los productos en un array de sesión, pero cuando se añada o se borre un producto de la tienda, 
será necesario actualizar el fichero. También se debe seguir guardando la cesta de la compra en una cookie, de manera que se pueda 
retomar la compra, aunque se cierre el navegador, aunque esa funcionalidad ya la tenemos implementada. -->
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
    <title>Ejercicio 3</title>
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

        //Contador de productos totales y de cada producto
        if (!isset($_COOKIE["contProd"])) {
            $nombreProd = array_keys($_SESSION["productos"]);
            for ($i=0; $i < count($nombreProd); $i++) { 
                $arrayProdC[$nombreProd[$i]] = 0; 
            }
            $prodC = serialize($arrayProdC);
            setcookie("contProd", $prodC, time()+1*60*60*60);
            setcookie("contTotal", 0, time()+1*60*60*60);
            header("location: Ej3.php");
        }

        //Añadir producto a la cesta
        if (isset($_GET["anadir"])) {
            $arrayContProd = unserialize($_COOKIE["contProd"]);
            $contTotal = $_COOKIE["contTotal"];
            $arrayContProd[$_GET["prod"]]++;
            $contTotal++;
            $prodC = serialize($arrayContProd);
            setcookie("contProd", $prodC, time()+1*60*60*60);
            setcookie("contTotal", $contTotal, time()+1*60*60*60);
            header("location: Ej3.php");
        }

    ?>

    <h1>Tienda On-Line Ancá Terué</h1>

    <table class="tabla1">

        <tr>
            <td colspan="3"><h2>LA TIENDECITA</h2></td>
            <td><a href="Ej3Cesta.php"><h3>CESTA<br><?php echo $_COOKIE["contTotal"] ?> Prod</h3></a></td>
        </tr>

        <tr>
            <td><strong>Producto</strong></td>
            <td><strong>Precio</strong></td>
            <td><strong>Imagen</strong></td>
            <td><a href="Ej3Gestionar.php"><strong>Gestionar productos</strong></a></td>
        </tr>
        
        <?php 
            //Vamos mostrando los productos que existen en la tabla
            if (isset($_SESSION["productos"])) {
                $productosArray = $_SESSION["productos"];
                $nombreProd = array_keys($_SESSION["productos"]);
                for ($i=0; $i < count($productosArray); $i++) { 
                    echo "<tr>";
                    echo "<td>",$nombreProd[$i],"</td>";
                    echo "<td>",$productosArray[$nombreProd[$i]][0],"</td>";
                    echo "<td> <img src='",$productosArray[$nombreProd[$i]][1],"' alt='",$nombreProd[$i],"' width='200px' height'150px'></td>";
                    echo "<td> <form action='Ej3.php' method='get'>";
                    echo "<input type='hidden' name='prod' value='",$nombreProd[$i],"'>";
                    echo "<input type='hidden' name='anadir' value='1'>";
                    echo "<input type='submit' value='Añadir Producto'>";
                    echo "</form> </td>";
                }
            }
        
        ?>

    </table>

</body>

</html>