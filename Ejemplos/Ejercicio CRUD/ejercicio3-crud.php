<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        display: flex;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        background-color: rgb(24, 24, 24);
        color: white;
    }

    input {
        padding: 20px;
        margin-top: 20px;
        width: 300px;
        text-align: center;
        font-size: 1.2rem;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    form {
        display: flex;
        align-items: center;
        flex-direction: column;
    }
</style>
<body>
    <?php 
    $productos = unserialize($_COOKIE["productos"]); // ? Mi listado de productos
    if(isset($_GET["al"])){ // ? cuando llega por primera vez a esta pagina tenemos tres isset para comprobar si en la pagina anterior se pulso el boton de alta como en este caso, o de baja o de modificacion
        echo "<h1>Alta de producto</h1>";

        if(isset($_GET["desc"])){ // ? si estamos dentro del if de arriba (el de if(isset($_GET["al"])) y tambien estra por este if quiere decir que hemos ya metido datos en el formulario y que lo que queremos en este caso es dar de alta un producto
            $indice = array_keys($productos);
            $indice = $indice[count($indice)-1]+1; // ? saco cual es el indice ultimo que tengo en mi lista de productos y le sumo uno para darle ese indice en mi diccionario al nuevo producto
            $productos[$indice] = [$_GET["precio"], $_GET["desc"], $_GET["imagen"]]; // ? le agrego en ese indice el nuevo producto con los datos metidos en el formulario.
            $productos = serialize($productos);
            setcookie("productos", $productos, time()+1*24*3600);
            header("Location: ejercicio3.php");
        }
    ?>
    <form action="ejercicio3-crud.php" method="GET">
        <input type="hidden" name="al" value="1">
        <input type="text" name="desc" placeholder="Introduce el nombre del producto"><br>
        <input type="text" name="precio" placeholder="Introduce el precio del producto"><br>
        <input type="text" name="imagen" placeholder="Introduce la imagen del producto"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    }
    if(isset($_GET["ba"])){   // ? Parte de la baja de un producto
        
        echo "<h1>Baja de producto</h1>";
        for ($i = 0; $i < count($productos); $i++) {
            echo "<h1>ID ----> $i | Nombre producto ------> ". $productos[$i][1]."</h1>"; // ? Te muestro cuales son los productos con los id para que sepas cual tienes que marcar
        }

        if(isset($_GET["id"])){ // ? entra ya por aqui cuando se meten los datos en el formulario y empieza la baja de un producto
            if(array_key_exists($_GET["id"], $productos)){ // ? con el array_key_exists compruebo si el id metido por el formulario lo encontramos en mi array asociativo de productos
                unset($productos[$_GET["id"]]); // ? si entra borra el producto
                $nuevoProductos = [ 0 => ""]; // ? nuevo diccionario de productos ya que el antiguo hemos borrado items y hay que reordenar los indices de los productos
                if(count($productos) != 0){
                    $cont = 0;
                    foreach ($productos as $item) {  // ? recorro el antiguo diccionario de productos que tiene ahora un producto menos y al nuevo le añado cada uno del diccionario antiguo, empezando en el nuevo por el indice 0 hasta el que tenga que llegar así los indices vuelven a estar en orden y desde 1 en 1
                        $nuevoProductos[$cont] = [$item[0], $item[1], $item[2]];
                        $cont ++;
                    }
                }
                else{
                    $nuevoProductos = [];
                }
                $nuevoProductos = serialize($nuevoProductos); // ? serializo el nuevo diccionario y lo seteamos en la cookie.
                setcookie("productos", $nuevoProductos, time()+1*24*3600);
                header("Location: ejercicio3.php");
            }
            else{
                echo "<h1 style='color:red;'>No existe ese id de producto</h1>";
            }
            
        }
    ?>
    <form action="ejercicio3-crud.php" method="GET">
        <input type="hidden" name="ba" value="1">
        <input type="text" name="id" placeholder="Introduce el id del producto"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php   
    }
    if(isset($_GET["mo"])){
        echo "<h1>Modificación de producto</h1>";
        for ($i = 0; $i < count($productos); $i++) {
            echo "<h1>ID ----> $i | Nombre producto ------> ". $productos[$i][1]."</h1>";
        }
        if(isset($_GET["id"])){ //? parte de la modificacion
            if(array_key_exists($_GET["id"], $productos)){ // ? comprobamos si el id metido esta en en el diccionario de productos
                    $productos[$_GET["id"]] = [$_GET["precio"], $_GET["desc"], $_GET["imagen"]]; // ? si entra port aqui existe y se cambia los datos que habia en ese indice que corresponde a al producto que queremos cambiar por los nuevos valorwes.
                    $productos = serialize($productos);
                    setcookie("productos", $productos, time()+1*24*3600);
                    header("Location: ejercicio3.php");
                }
                else{
                    echo "<h1 style='color:red;'>No existe ese id de producto</h1>";
                }
        }
    ?>
    <form action="ejercicio3-crud.php" method="GET">
        <input type="hidden" name="mo" value="1">
        <input type="text" name="id" placeholder="Introduce el id del producto"><br>
        <input type="text" name="desc" placeholder="Introduce el nombre del producto"><br>
        <input type="text" name="precio" placeholder="Introduce el precio del producto"><br>
        <input type="text" name="imagen" placeholder="Introduce la imagen del producto"><br>
        <input type="submit" value="Enviar">
    </form>
    <?php 
    }
    ?>

</body>
</html>