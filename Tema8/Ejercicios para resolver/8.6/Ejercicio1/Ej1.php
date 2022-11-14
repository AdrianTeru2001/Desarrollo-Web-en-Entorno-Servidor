<!-- Ejercicio 1.
Crear una aplicación web para mantener un fichero mascotas.txt de los animales inscritos diariamente 
en una clínica veterinaria, con la siguiente estructura:
#02-03-2019#
pepe-canario-2
luna-perro-4
duque-gato-6
#15-11-2019#
princesa-hamster-1
venus-perro-12
…
Al entrar en la aplicación, la fecha seleccionada automáticamente es la fecha actual, por lo que las mascotas son grabadas 
forzosamente en el día en que nos encontramos.
Crear una página para añadir mascotas en un array de sesión donde la clave es el nombre de la mascota y el valor es 
otro array con los datos correspondientes al tipo de animal y su edad. Las mascotas que se van añadiendo se van mostrando en una tabla.
Incluir un formulario para añadir los datos de una nueva mascota.
Incluir un botón para grabar todas las mascotas añadidas en el fichero mascotas.txt, con la cabecera de 
la fecha actual tal como se ve en el ejemplo (el fichero debe mantener la información previa y añadir las 
líneas de las mascotas nuevas al final del mismo), limpiando la tabla de mascotas añadidas hasta ese momento. 
Si no se han añadido mascotas previamente ese mismo día habrá que incluir la cabecera con la fecha actual, 
pero en caso contrario solo hay que añadir las mascotas al final, sin duplicar la cabecera. -->
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
        }
    </style>
    <title>Ejercicio 1</title>
</head>

<body>
    
    <?php 
    
        session_start();

        if (isset($_GET["nombre"]) && isset($_GET["animal"]) && isset($_GET["edad"])) {
            $nombre = $_GET["nombre"];
            $animal = $_GET["animal"];
            $edad = $_GET["edad"];
            $_SESSION["animales"][$nombre] = [$animal, $edad]; //Al recoger los datos del animal, lo metemos en un array
        }

        if (isset($_GET["grabar"])){
            $bandera = false;
            $fecha = "#".date("d-m-Y", time())."#";
            $nomAnimales = array_keys($_SESSION["animales"]); //Utilizamos arrayKeys para los nombres de los animales
            //Leemos el fichero para ver si hemos introducido ya algun animal en la fecha en la que estamos
            $fp = fopen("mascotas.txt", "r");
            while (!feof($fp)) {
                $linea = fgets($fp);
                if (trim($linea)==$fecha) {
                    $bandera = true;
                }
            }
            fclose($fp);
            //Según hayamos introducido animales ya o no este mismo dia, pondremos solo los animales o también la fecha
            $fp = fopen("mascotas.txt", "a");
            if ($bandera==true) {
                for ($i=0; $i < count($_SESSION["animales"]); $i++) { 
                    fwrite($fp, $nomAnimales[$i]."-".$_SESSION['animales'][$nomAnimales[$i]][0]."-".$_SESSION['animales'][$nomAnimales[$i]][1]."\n");
                }
            } else if ($bandera==false){
                fwrite($fp, $fecha."\n");
                for ($i=0; $i < count($_SESSION["animales"]); $i++) { 
                    fwrite($fp, $nomAnimales[$i]."-".$_SESSION['animales'][$nomAnimales[$i]][0]."-".$_SESSION['animales'][$nomAnimales[$i]][1]."\n");
                }    
            }
            fclose($fp);
            session_destroy();
            header("location: Ej1.php");
        }

    ?>

    <table>

        <tr>
            <td colspan="4"><strong>FECHA: <?php echo "#",date("d-m-Y", time()),"#"; ?></strong></td>
        </tr>
        <tr>
            <td><strong>Nombre</strong></td>
            <td><strong>Animal</strong></td>
            <td><strong>Edad</strong></td>
        </tr>
        <?php 
            //Vamos mostrando los animales que vamos añadiendo
            if (isset($_SESSION["animales"])) {
                $nomAnimales = array_keys($_SESSION["animales"]);
                for ($i=0; $i < count($_SESSION["animales"]); $i++) { 
                    echo "<tr>";
                    echo "<td>",$nomAnimales[$i],"</td>";
                    echo "<td>",$_SESSION['animales'][$nomAnimales[$i]][0],"</td>";
                    echo "<td>",$_SESSION['animales'][$nomAnimales[$i]][1],"</td>";
                    echo "</tr>";
                }
            }

        ?>
        <tr>
            <form action="Ej1.php" metohd="get">
                <td><input type="text" name="nombre" required></td>
                <td><input type="text" name="animal" required></td>
                <td><input type="text" name="edad" required></td>
                <td><input type="submit" value="AÑADIR"></td>
            </form>
        </tr>

    </table>

    <br><br>

    <form action="Ej1.php" method="get">
        <input type="hidden" name="grabar" value="1">
        Grabar las mascotas en el fichero: <input type="submit" value="GRABAR">
    </form>

</body>

</html>