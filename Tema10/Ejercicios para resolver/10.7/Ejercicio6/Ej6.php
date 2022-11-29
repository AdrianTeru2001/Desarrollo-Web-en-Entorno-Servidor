<!-- Ejercicio 6
Crea la clase Vehiculo, así como las clases Bicicleta y Coche como subclases de la primera. Para la clase Vehiculo, crea los métodos de clase 
getVehiculosCreados() y getKmTotales(); así como el método de instancia getKmRecorridos(). Crea también algún método específico para cada una 
de las subclases. Prueba las clases creadas mediante una aplicación que realice, al menos, las siguientes acciones:
• Anda con la bicicleta
• Haz el caballito con la bicicleta
• Anda con el coche
• Quema rueda con el coche
• Ver kilometraje de la bicicleta
• Ver kilometraje del coche
• Ver kilometraje total -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>

<body>
    
    <?php 
    
        //Cargamos la clase
        include_once "Bicicleta.php";
        include_once "Coche.php";

        //Inicializamos los vehiculos
        $bici1 = new Bicicleta();
        $bici2 = new Bicicleta();
        $coche1 = new Coche();
        $coche2 = new Coche();

        //Mostramos los Km recorridos de los vehiculos
        echo "<h3>Km de las bicis: </h3>";
        echo $bici1->verKmBici();
        echo "<br>";
        echo $bici2->verKmBici();
        echo "<br>";
        echo "<h3>Km de los coches: </h3>";
        echo $coche1->verKmCoche();
        echo "<br>";
        echo $coche2->verKmCoche();
        echo "<br><br>";

        //Andamos con los vehiculos
        echo "<h3>Andamos con las bicis: </h3>";
        for ($i=0; $i < 4; $i++) { 
            $bici1->andaBici();
            echo "<br>";
        }
        echo "<br>";
        for ($i=0; $i < 7; $i++) { 
            $bici2->andaBici();
            echo "<br>";
        }
        echo "<br>";
        echo "<h3>Andamos con los coches: </h3>";
        for ($i=0; $i < 5; $i++) { 
            $coche1->andaCoche();
            echo "<br>";
        }
        echo "<br>";
        for ($i=0; $i < 9; $i++) { 
            $coche2->andaCoche();
            echo "<br>";
        }
        echo "<br>";

        //Mostramos de nuevo los Km recorridos de los vehiculos
        echo "<h3>Km de las bicis: </h3>";
        echo $bici1->verKmBici();
        echo "<br>";
        echo $bici2->verKmBici();
        echo "<br>";
        echo "<h3>Km de los coches: </h3>";
        echo $coche1->verKmCoche();
        echo "<br>";
        echo $coche2->verKmCoche();
        echo "<br><br>";

        //Mostramos los km totales de todos los vehiculos
        echo "<h3>Kilometros totales de todos los vehiculos: </h3>";
        $bici1->verKmTotal();
        echo "<br>";
        /* $coche1->verKmTotal();
        echo "<br><br>"; */

        //Mostramos el número de vehiculos creados
        echo "<h3>Número de vehiculos creados: </h3>";
        $bici1->verVehiculosCreados();
        echo "<br>";
        /* $coche1->verVehiculosCreados();
        echo "<br><br>"; */

        //Quemamos ruedas y hacemos caballitos
        echo "<h3>Hacemos caballitos con las bicis: </h3>";
        for ($i=0; $i < 5; $i++) { 
            $bici1->caballitoBici();
            echo "<br>";
        }
        echo "<br>";
        for ($i=0; $i < 10; $i++) { 
            $bici2->caballitoBici();
            echo "<br>";
        }
        echo "<br>";
        echo "<h3>Quemamos rueda con los coches: </h3>";
        for ($i=0; $i < 7; $i++) { 
            $coche1->quemarRuedaCoche();
            echo "<br>";
        }
        echo "<br>";
        for ($i=0; $i < 14; $i++) { 
            $coche2->quemarRuedaCoche();
            echo "<br>";
        }
        echo "<br>";

    ?>

</body>

</html>