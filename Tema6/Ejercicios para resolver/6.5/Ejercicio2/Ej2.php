<!-- Ejercicio 2.
Disponemos de 2 tarjetas de coordenadas para controlar el acceso a una web. Cada tarjeta corresponde
a un perfil de usuario ‘admin’ o ‘estandar’, cada número registrado en la tarjeta se identifica 
por su fila (de la 1 a la 5) y su columna (de la A a la E). Los valores registrados en cada tarjeta son fijos y os lo podéis inventar.
Crea una página principal que sirva de control de acceso a una segunda página. Se pedirá el perfil 
de usuario (admin o estándar) y una clave aleatoria correspondiente a la tarjeta de coordenadas de
su perfil (fila y columna), se comprobará si es correcto usando 2 funciones: dameTarjeta() a la
que se le pasa el perfil y devuelve una matriz correspondiente a la tarjeta de coordenadas de ese perfil,
y compruebaClave() a la que se le pasa la matriz de coordenadas, las coordenadas y un valor, y devolverá
un booleano según sea correcto el valor en la matriz de coordenadas. Ambas funciones estarán almacenadas
en una librería controlAcceso.php.
Si el usuario se ha identificado correctamente se muestra un enlace de acceso a la página protegida (cualquiera) 
y si no mostrará un enlace para volver a intentarlo de nuevo.
Usar una tercera función imprimeTarjeta() que recibe una tarjeta y la imprime en una tabla para comprobar
el valor de todas las coordenadas. (imprimir las tarjetas de cada perfil en la página de acceso para poder 
comprobar el correcto funcionamiento de la página) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            text-align: center;
        }
        tr,td{
            border: 1px solid;
        }
    </style>
    <title>Ejercicio 2 - Acceso a la Página</title>
</head>

<body>

    <?php 
        include "controlAcceso.php"; //Incluimos la libreria de funciones "controlAcceso.php"
        imprimeTarjeta(); //Llamamos a la función "imprimeTarjeta()" para crear las tablas con las posiciones de las coordenadas
    ?>

    <form action="Ej2_Comprobar.php" method="get">
        Perfil:<br>
        <select name="perfil"> <!-- Pedimos que perfil va a entrar en la pagina -->
            <option value="admin" selected>Administrador</option>
            <option value="usuario">Usuario</option>
        </select>

        <?php //Sacamos aleatoriamente las coordenadas de la fila y la columna
            $fila = rand(1,5);
            $ale = rand(1,5);
            switch ($ale) {
                case 1:
                    $columna = "A";
                    break;
                case 2:
                    $columna = "B";
                    break;
                case 3:
                    $columna = "C";
                    break;
                case 4:
                    $columna = "D";
                    break;
                case 5:
                    $columna = "E";
                    break;
                
                default:
                    break;
            }
            echo "<h3>";
            echo "INTRODUCE LA SIGUIENTE COORDENADA<br>";
            echo "COORDENADA Fila:",$fila," Columna:",$columna;
            echo " <input type='text' name='respuesta'>"; //Pedimos que introduzcan el valor para ver si puede ingresar a la página
            echo "</h3>";
        ?>

        <!-- Pasamos a la otra páginia el numero de fila y el número y valor de la columna -->
        <input type="hidden" name="fila" value=<?php echo $fila ?>> 
        <input type="hidden" name="columna" value="<?php echo $columna ?>">
        <input type="hidden" name="numColumna" value="<?php echo $ale ?>">
        <input type="submit" value="COMPROBAR"> <!-- Con el botón comprobar pasamos todo el formulario a la siguiente página -->
    </form>

</body>

</html>