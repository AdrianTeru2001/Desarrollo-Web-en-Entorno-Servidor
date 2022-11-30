<!-- Ejercicio 10
Queremos modelar una casa con muchas bombillas, de forma que cada bombilla se puede encender o apagar individualmente. Para ello haremos 
una clase Bombilla con un atributo privado que almacene si está encendida o apagada, otro para la potencia consumida y por último otro 
atributo para la ubicación (salón, cocina, etc…); realizar un método que nos diga si una bombilla concreta está encendida, así como los 
getter y setters necesarios.
Además, queremos poner un interruptor general de la luz, tal que, si saltan los fusibles, todas las bombillas quedan apagadas. Cuando el 
fusible se repara, las bombillas vuelven a estar encendidas o apagadas, según estuvieran antes del percance.
Diseñar una página que genere las bombillas de una casa y las almacene en un array de sesión. Mostrar las bombillas de manera gráfica 
(desarrolla tu imaginación) dando la opción de encender y apagar cada una, así como de encender y apagar el interruptor general. 
Mostrar en todo momento la potencia consumida por las bombillas encendidas. -->
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
        img{
            width: 100px;
            height: 100px;
        }
    </style>
    <title>Ejercicio 10</title>
</head>

<body>

    <?php 
    
        //Iniciamos la sesion e incluimos la clase bombilla
        session_start();
        include_once "Bombilla.php";
        
        //Creamos las sesiones necesarias si no están creadas, con sus respectivos datos dentro
        if (!isset($_SESSION["bombillas"])) {
            $bomb = [];
            $bombString = serialize($bomb);
            $_SESSION["bombillas"] = $bombString;
            $_SESSION["general"] = Bombilla::getGeneral();
            header("location: Ej10.php");
        } else {
            Bombilla::setGeneral($_SESSION["general"]);
        }

        //Aqui controlamos el activar o desactivar el interruptor general
        if (isset($_GET["general"])) {
            Bombilla::activarGeneral();
            $_SESSION["general"] = Bombilla::getGeneral();
            header("location: Ej10.php");
        }

        //Aqui controlamos el crear una bombilla
        if (isset($_GET["ubicacion"])) {
            $bombString = $_SESSION["bombillas"];
            $bomb = unserialize($bombString);
            $ubicacion = $_GET["ubicacion"];
            $potencia = $_GET["potencia"];
            $bomb[] = new Bombilla($potencia, $ubicacion);
            $bombString = serialize($bomb);
            $_SESSION["bombillas"] = $bombString;
            header("location: Ej10.php");
        }

        //Aqui controlamos el encendido y apagado de la bombilla elegida
        if (isset($_GET["encender"])) {
            $bombString = $_SESSION["bombillas"];
            $bomb = unserialize($bombString);
            $numBomb = $_GET["encender"];
            if ($bomb[$numBomb]->estadoBombilla() == "apagada") { //Comprobamos si la bombilla que vamos a cambiarle el estado está apaga o encendida
                $bomb[$numBomb]->setEstado("encendida");
            } else {
                $bomb[$numBomb]->setEstado("apagada");
            }
            $bombString = serialize($bomb);
            $_SESSION["bombillas"] = $bombString;
            header("location: Ej10.php");
        }

        //Unserializamos la sesion bombilla en un array para tener las bombillas a mano
        $arrayBombillas = unserialize($_SESSION["bombillas"]);

        //Tabla donde mostramos todos los datos de las bombillas y las diferentes opciones de apagdo y encendido de bombilla e interruptor general
        echo "<table>";
        echo "<tr><td colspan=4><h1>Bombillas</h1></td></tr>";
        echo "<tr><td><h2>Estado</h2></td><td><h2>Ubicación</h2></td><td><h2>Potencia</h2></td><td><h2>Apagar/Encender</h2></td></tr>";
        for ($i=0; $i < count($arrayBombillas); $i++) { 
            if ($arrayBombillas[$i]->estadoBombilla() == "apagada") {
                $cambiar = "Encender";
                $imagen = "img/apagada.png";
            } else {
                $cambiar = "Apagar";
                $imagen = "img/encendida.png";
            }
            if (!Bombilla::getGeneral()) { //Si está el general desactivado, todas las bombillas aparecen apagadas
                $imagen = "img/apagada.png";
            }
            echo "<tr>";
            echo "<td><h3><img src='$imagen' alt='",$arrayBombillas[$i]->getEstado(),"'></h3></td><td><h3>",$arrayBombillas[$i]->getUbicacion(),"</h3></td><td><h3>",$arrayBombillas[$i]->getPotenciaC()," W</h3></td>";
            echo "<td><form action='Ej10.php' method='get'><input type='hidden' name='encender' value='$i'><input type='submit' value='$cambiar'></form></td>";
            echo "</tr>";
        }
        //Para activar o desactivar el general
        if (Bombilla::getGeneral()) {
            $estadoGeneral = "Activado";
            $cambiar = "Desactivar";
        } else {
            $estadoGeneral = "Desactivado";
            $cambiar = "Activar";
        }
        echo "<tr>";
        echo "<td colspan=2><h3>Interruptor General : </h3></td><td><h3>$estadoGeneral</h3></td><td><form action='Ej10.php' method='get'><input type='hidden' name='general' value='1'><input type='submit' value='$cambiar'></form></td>";
        echo "</tr>";
        echo "</table>";

    ?>

    <br><br>

    <!-- Formulario para crear las bombillas -->
    <h2>Crear Bombilla</h2>
    <form action="Ej10.php" method="get">
        Ubicación de la bombilla: <input type="text" name="ubicacion" required><br>
        Potencia consumida por la bombilla: <input type="text" name="potencia" required><br>
        <input type="submit" value="Crear Bombilla">
    </form>

</body>

</html>