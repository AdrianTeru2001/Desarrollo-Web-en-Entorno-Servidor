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
    <title>Ejercicio 3 Gestionar</title>
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

        //Eliminar el producto elejido de la tienda
        if (isset($_GET["eliminar"])) {
            $prod = $_SESSION["productos"];
            $nombreProd = array_keys($_SESSION["productos"]);
            $fp = fopen("productos.txt", "w");
            for ($i=0; $i < count($prod); $i++) { 
                if ($nombreProd[$i]!==$_GET["prod"]) {
                    fwrite($fp, $nombreProd[$i]."-".$prod[$nombreProd[$i]][0]."-".$prod[$nombreProd[$i]][1]."\n");    
                }
            }
            fclose($fp);
            header("location: Ej3Gestionar.php");
        }

        //Añadir productos a la tienda
        if (isset($_GET["anadir"])) {
            $prod = $_SESSION["productos"];
            $nombreProd = array_keys($_SESSION["productos"]);
            $fp = fopen("productos.txt", "a");
            fwrite($fp, "\n".$_GET["nombre"]."-".$_GET["precio"]."-img/".$_GET["img"]);    
            fclose($fp);
            header("location: Ej3Gestionar.php");
        }

    ?>

    <h1>Tienda On-Line Ancá Terué</h1>

    <table class="tabla1">

        <tr>
            <td colspan="3"><h2>LA TIENDECITA</h2></td>
            <td rowspan="2"><a href="Ej3.php"><h3>Volver</h3></a></td>
        </tr>

        <tr>
            <td><strong>Producto</strong></td>
            <td><strong>Precio</strong></td>
            <td><strong>Imagen</strong></td>
        </tr>
        
        <?php 
            //Mostramos todos los productos de la tienda
            if (isset($_SESSION["productos"])) {
                $productosArray = $_SESSION["productos"];
                $nombreProd = array_keys($_SESSION["productos"]);
                for ($i=0; $i < count($productosArray); $i++) { 
                    echo "<tr>";
                    echo "<td>",$nombreProd[$i],"</td>";
                    echo "<td>",$productosArray[$nombreProd[$i]][0],"</td>";
                    echo "<td> <img src='",$productosArray[$nombreProd[$i]][1],"' alt='",$nombreProd[$i],"' width='200px' height'150px'></td>";
                    echo "<td> <form action='Ej3Gestionar.php' method='get'>";
                    echo "<input type='hidden' name='prod' value='",$nombreProd[$i],"'>";
                    echo "<input type='hidden' name='eliminar' value='1'>";
                    echo "<input type='submit' value='Eliminar'>";
                    echo "</form> </td>";
                }
            }
        
        ?>

        <!-- Formulario para añadir productos a la tienda -->
        <form action="Ej3Gestionar.php" method="get">
            <tr>
                <td><input type="text" name="nombre" placeholder="Nombre..." required></td>
                <td><input type="text" name="precio" placeholder="Precio..." required></td>
                <td><input type="file" name="img" required></td>
                <input type="hidden" name="anadir" value="1">
                <td><input type="submit" value="Añadir"></td>
            </tr>
        </form>

    </table>

</body>

</html>