<!-- Ejercicio 8
Queremos gestionar la venta de entradas (no numeradas) de Expocoches Campanillas que tiene 3 zonas, la sala principal con 
1000 entradas disponibles, la zona de compra-venta con 200 entradas disponibles y la zona vip con 25 entradas disponibles. 
Hay que controlar que existen entradas antes de venderlas. Define las clase Zona con sus atributos y métodos correspondientes y 
crea un programa que permita vender las entradas. En la pantalla principal debe aparecer información sobre las entradas disponibles
y un formulario para vender entradas. Debemos indicar para qué zona queremos las entradas y la cantidad de ellas. 
Lógicamente, el programa debe controlar que no se puedan vender más entradas de la cuenta. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            border: 1px solid black;
            text-align: center;
        }
        tr,td{
            border: 1px solid black;
            width: 200px;
        }
    </style>
    <title>Ejercicio 8</title>
</head>

<body>

    <?php 

        //Iniciamos las sesiones e incluimos las clases
        session_start();
        include_once "Principal.php";
        include_once "Compra-venta.php";
        include_once "Vip.php";

        if (isset($_SESSION["entradas"])) {
            $zonasString = $_SESSION["entradas"];
            $zonas = unserialize($zonasString);
            if (isset($_GET["zona"])) {    
                $numEntradas = $_GET["entradas"];
                $zonaElegida = $_GET["zona"];
                $comprobar = $zonas[$zonaElegida]->vender($numEntradas); //Aqui vendemos las entradas
                $zonasString = serialize($zonas);
                $_SESSION["entradas"] = $zonasString;
                if ($comprobar) { //Comprobamos si hemos podido venderlas o no
                    header("location: Ej8.php?mal=0");
                } else {
                    header("location: Ej8.php?mal=1");
                }
            }
        } else {
            $zonas = [];
            $zonas["principal"] = new Principal();
            $zonas["compra_venta"] = new Compra_Venta();
            $zonas["vip"] = new Vip();
            $zonasString = serialize($zonas);
            $_SESSION["entradas"] = $zonasString;
            header("location: Ej8.php");
        }

        //Mensaje que se muestra si no se puede hacer la compra de las entradas
        if(isset($_GET["mal"])){
            $mal = $_GET["mal"];
            if ($mal==1) {
                echo "<h1>No puedes comprar mas entradas de las que hay</h1>";
            }
        }

        //Variables con los objetos para poder mostrarlas
        $zonasArray = unserialize($_SESSION["entradas"]);
        $principal = $zonasArray["principal"];
        $compra_venta = $zonasArray["compra_venta"];
        $vip = $zonasArray["vip"];

    ?>

    <table>

        <tr>
            <td colspan="3"><h1>Zonas</h1></td>
        </tr>
        <tr>
            <td><h2>Principal</h2></td>
            <td><h2>Compra-Venta</h2></td>
            <td><h2>Vip</h2></td>
        </tr>
        <tr>
            <td><h3><?php echo $principal; ?></h3></td>
            <td><h3><?php echo $compra_venta; ?></h3></td>
            <td><h3><?php echo $vip; ?></h3></td>
        </tr>

        <tr>
            <form action="Ej8.php" method="get">
            <td colspan="2">
                <select name="zona">
                    <option value="principal">Principal</option>
                    <option value="compra_venta">Compra-Venta</option>
                    <option value="vip">Vip</option>
                </select>
            </td>
            <td>
                <input type="number" name="entradas"><br>
            </td>
        </tr>

        <tr>
            <td colspan="3"><input type="submit" value="Comprar Entradas"></td>
        </tr>

        </form>

    </table>

</body>

</html>