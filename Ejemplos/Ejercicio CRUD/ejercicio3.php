<!-- Ejercicio 3
Realizar una tienda con un carrito de la compra más completo que el realizado en el boletín. En la página
principal tendremos un listado compuesto por una tabla con 4 columnas, nombre del producto, precio, imagen
y botón para añadir a la cesta, si se añade más de una vez se aumenta la cantidad del producto en la cesta.
También se mostrará cuantos productos hay en la cesta en todo momento y un enlace para acceder a dicha cesta
que mostrará otro listado de los productos añadidos y su cantidad, junto a cada producto habrá un botón eliminar
que permita quitar una unidad de ese producto y si se llega a 0 se elimina el producto de la cesta. Al final de la
cesta se mostrará el importe total de todos los productos y un botón o enlace para cerrar la cesta y volver a la
página principal.
Por último, en la página principal al pulsar sobre la imagen de un producto se abrirá en otra página la imagen
a tamaño original (algo más grande) junto con los datos del producto y el detalle del mismo (una breve
descripción). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: rgb(24, 24, 24);
        height: 100vh;
    }

    .container {
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 30px;
        color: white;
    }
    .contenido{
        display: flex;
    }

    .card {
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 30px;

    }

    table:nth-child(2) {
        margin-left: 130px;
        display: flex;
    }

    img {
        width: 200px;
        height: 200px;
        margin-top: 30px;
        border-radius: 50px;
        box-shadow: 0px 0px 10px 0px white;
    }

    a {
        text-decoration: none;
        color: black;
    }

    
    a:last-child {
        margin-bottom: 30px;
    }
    
    span:nth-child(2){
        margin-top: 10px;
    }
    span {
        margin-top: -10px;
        margin-bottom: 10px;
        font-size: 1.5rem;
    }
    
    button {
        padding: 5px;
        font-size: 1.2rem;
        margin-top: 5px;
    }
    
    button:hover {
        cursor: pointer;
    }

    td {
        border: 1px solid white;
        border-radius: 5px;
    }

    th {
        font-size: 2rem;
    }

    h1 {
        font-size: 3rem;
    }
    
    input {
        padding: 10px;
        margin-top: 10px;
    }

    select {
        padding: 10px;
        margin-top: 10px;
    }

</style>
<body>
    <?php session_start();
    $productos = unserialize($_COOKIE["productos"]);
    if(isset($_COOKIE["carrito"])){
        $carrito = unserialize($_COOKIE["carrito"]);
        if(isset($_GET["pro"])){ // ! Se añaden productos al carrito
            // * la variable sesion carrito es un array en el que en cada posicion del array ira un producto en orden segunn se introduzcan y dentro de cada posicion hay otro array con la clave dle producto y su cantidad
            $item = -1;
            for ($i=0; $i < count($carrito); $i++) { // * en este bucle recorro el carrito y busco en que posicion del array se encuentra el producto que se ha marcado comparando la clave que llega con la clave que hay en el carrito
                if($carrito[$i][0] == (int)$_GET["pro"]){ // * si encuentro la clave del producto que se ha pinchado en la pagina en el carrito guardo la posicion del array donde lo ha encontrado para luego modificar
                    $item = $i;
                    $i = count($carrito);
                }
            }

            if($item == -1){ // * si item esta en -1 quiere decir que el producto aun no esta en el carrito, entonces añado al array un array con la clave del producto en primera posicion y con un 1 en segunda que es la cantidad del producto (1 porque es la primera vez que lo creo y solo habra 1 unidad)
                $carrito[] = [(int)$_GET["pro"], $_GET["unidad"]];
            }
            else{ // * si item es diferente de -1 se habra encontrado ese producto en el carrito y entonces accedo a la posicion del carrito metida en item y modifico dentro de ese array la segunda posicion del array que es la cantidad
                $carrito[$item][1] += (int)$_GET["unidad"];
            }
            $carrito = serialize($carrito);
            setcookie("carrito", $carrito, time()+1*24*3600);
            header("location: ejercicio3.php");
        }
        else if(isset($_GET["del"])){  // ! Se borran productos del carrito
            for ($i=0; $i < count($carrito); $i++) { 
                if($carrito[$i][0] == (int)$_GET["del"]){ // * localizo el producto que tengo que restar y le quito 1, si ese item se queda a 0 despues de la resta quito esa posicion del array carrito y reordeno los indices (array_values)
                    $carrito[$i][1] -= (int)$_GET["unidad"];

                    if($carrito[$i][1] == 0){
                        unset($carrito[$i]);
                        $carrito = array_values($carrito);
                    }
                    $i = count($carrito);
                }
                
            }
            $carrito = serialize($carrito);
            setcookie("carrito", $carrito, time()+1*24*3600);
            header("location: ejercicio3.php");
        }
        else if(isset($_GET["com"])){ // ! Simulo la compra, destruyo la sesion y se lanza otra vez la pagina.
            setcookie("carrito", NULL, -1);
            echo "<h1 style='background-color: rgb(24, 24, 24); text-align:center; color:white'>Compra realizada con éxito.</h1>";
            header("refresh:1; url='ejercicio3.php'");
        }
    }
    else{
        if(!isset($_COOKIE["productos"])){
            $productos = [ 0 => [5, "Un balon", "img/balon.jpg"] , 1 => [350, "Un televisor", "img/tv.jpg"] , 2 => [800, "Una play", "img/play.jpg"]];
            $productos = serialize($productos);
            setcookie("productos", $productos, time()+1*24*3600);
        }
        $carrito = [];
        $carrito = serialize($carrito);
        setcookie("carrito", $carrito, time()+1*24*3600);
        header("location: ejercicio3.php");
    }
    ?>
    <div class="container">
    <h1>Tienda online</h1>
    <div>
        <a href="ejercicio3-crud.php?al=1"><button>Alta</button></a>
        <a href="ejercicio3-crud.php?ba=1"><button>Baja</button></a>
        <a href="ejercicio3-crud.php?mo=1"><button>Modificación</button></a>
    </div>
    <div class="contenido">
        <table>
            <tr>
                <th>Productos</th>
            </tr>
            <?php 
                for ($i=0; $i < count($productos); $i++) { 
                    echo "<tr>";
                    $precio = $productos[$i][0];
                    $desc = $productos[$i][1];
                    $img = $productos[$i][2];
                    echo "<td><div class='card'>
                    <a href='ejercicio3-2.php?pro=$i'><img src='$img' alt=''></a>
                    <span>$desc </span><br>
                    <span>$precio €</span>
                    <a href='ejercicio3-2.php?pro=$i'><button>Detalles</button></a>
                    <form action='ejercicio3.php' method='GET'>";
                        echo "<select name='unidad' id='t'>";
                        for ($j=1; $j <= 10; $j++) { 
                            echo "<option value='$j'>$j</option>";
                        }
                        echo "</select>";
                        echo "<input type='hidden' value='$i' name='pro'>";
                        echo "<br><input type='submit' value='Añadir'>";
                    echo "</form>
                    </div></td>";
                    echo "</tr>";
                    }
                    echo "</div></td>";
                    echo "</tr>";
            ?>
        </table>

        <table>
            <tr>
                <th>Carrito</th>
            </tr>
            <?php 
            if(count($carrito) == 0){
                echo "<tr>
                <td style='padding:30px;'><h2>Aún no hay nada en el carrito</h2></td>
                </tr>";
            }
            else{
                $precioTotal = 0;
                for ($i=0; $i < count($carrito); $i++) { 
                    echo "<tr>";
                    
                    $desc = $productos[$carrito[$i][0]][1];
                    $img = $productos[$carrito[$i][0]][2];
                    $unidad = $carrito[$i][1];
                    $precio = $productos[$carrito[$i][0]][0] * $unidad;
                    $precioTotal += $precio;
                    echo "<td><div class='card'>
                    <img src='$img' alt=''>
                    <span>$desc </span><br>
                    <span>$precio €</span>
                    <span>Unidades: $unidad </span>
                    <form action='ejercicio3.php' method='GET'>";
                        echo "<select name='unidad' id='t'>";
                        for ($j=1; $j <= $carrito[$i][1]; $j++) { 
                            echo "<option value='$j'>$j</option>";
                        }
                        echo "</select>";
                        $producto = $carrito[$i][0];
                        echo "<input type='hidden' value='$producto' name='del'>";
                        echo "<br><input type='submit' value='Eliminar'>";
                    echo "</form>
                    </div></td>";
                    echo "</tr>";
                }
                echo "<tr><td style='padding:30px;'><span>Precio total: $precioTotal €</span>
                <a href='ejercicio3.php?com=1'><button>Hacer compra</button></a>
                </td></tr>";
            }
            ?>
        </table>
    </div>
    </div>
</body>
</html>