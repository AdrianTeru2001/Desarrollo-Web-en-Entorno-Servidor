<!-- Ejercicio 2
Crea un servicio web que proporcione de forma aleatoria un mazo de cartas de la baraja española. Por la URL se pasa el número de cartas
que se quiere obtener y la aplicación provee el palo y la figura de cada una de las cartas. Se supone que el mazo se obtiene de una baraja, 
por tanto, las cartas no se pueden repetir. Si el número que se pasa en la URL es menor que 1 o mayor que 40, se debe devolver un error. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    
    <!-- Pedimos el numero de cartas mediante un formulario -->
    <form action="cliente.php" method="get">
        Ingrese el número de cartas que quieres sacar: <input type="number" name="num"><br>
        <input type="submit" value="Sacar cartas">
    </form>
    <hr>
    
    <?php 
    
        if (isset($_GET["num"])) { //Vemos si hemos mandado la cantidad de cartas
            $num = $_GET["num"];
            $parametros = "?num=".$num;
            //Recojemos los datos de parte del servidor
            $json = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio2/servidor.php".$parametros);
            $sacada = json_decode($json); //Lo decodificamos de json
            //Mostramos todas las cartas que hemos sacado
            if ($sacada->codigo == 0) {
                for ($i=0; $i < $num; $i++) { 
                    echo $sacada->cartas[$i],"<br>";
                }
            } else {
                echo "Error número: ".$sacada->codigo;
                echo "<br>Descripción: ".$sacada->mensaje;
            }
        }

    ?>

</body>

</html>