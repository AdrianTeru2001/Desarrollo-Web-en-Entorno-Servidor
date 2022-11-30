<!-- Ejercicio 9
Diseñar una clase Coche con los atributos matricula, modelo y precio. La clase debe tener los atributos de clase modeloCaro y precioCaro,
que contendrá en todo momento el modelo del coche más caro y su precio. Los métodos a incluir son:
• constructor con todos los atributos
• getters y setters
• toString (devuelve los datos en columnas de fila de tabla: “matriculamodelo…”).
• Incluir un método de clase “masCaro” que devuelva un String con el modelo y el precio del coche más caro.
Diseñar una clase CocheLujo, que contendrá todos los atributos y métodos de la clase Coche y además un atributo suplemento 
(se pasa en el constructor), que habrá que añadir al precio cuando se consulte a través del método getPrecio(), los coches de lujos 
también hay que tenerlos en cuenta como posible modelo de coche más caro, pero sin contar con el suplemento (solo su precio). 
En el método toString de la clase CocheLujo también hay que devolver el suplemento (es una columna más de la fila de tabla devuelta).
Diseñar una página que permita crear coches de la clase Coche y vaya mostrando el listado de los mismos en una tabla, si el coche no 
es de lujo, en la celda del suplemento mostrará “No procede”. También se mostrará en la cabecera de la página los datos del 
coche más caro. -->
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
    <title>Ejercicio 9</title>
</head>

<body>

    <?php 
    
        //Incluimos las clases que nos haga falta
        include_once "Coche.php";
        include_once "CocheLujo.php";

        //Cramos los coches, tanto normales como de lujo
        $coche1 = new Coche("45678MER", "Peugeot", 30000);
        $coche2 = new CocheLujo("12345POR", "Citroen", 23000, 500);
        $coche3 = new Coche("46434DHY", "Kia", 12000);
        $coche4 = new CocheLujo("94734LSJ", "Fiat", 16000, 200);

    ?>

    <!-- Precio y modelo del coche mas caro -->
    <h1>Precio y modelo del coche mas caro: </h1>
    <?php 
        echo $coche1->masCaro();
    ?>

    <!-- Tabla con todos los coches, controlando que en los coches de lujo pongan su suplemento y si no es de lujo ponga que "no precede" -->
    <table>

        <tr>
            <td colspan="4"><h1>Coches</h1></td>
        </tr>

        <tr>
            <td><h2>Matricula</h2></td>
            <td><h2>Modelo</h2></td>
            <td><h2>Precio</h2></td>
            <td><h2>Suplemento</h2></td>
        </tr>    

        <tr>
            <?php 
                if (get_class($coche1) == "Coche"){
                    echo $coche1."<td>No Procede</td>";
                } else {
                    echo $coche1;
                }
            ?>
        </tr>

        <tr>
            <?php 
                if (get_class($coche2) == "Coche"){
                    echo $coche2."<td>No Procede</td>";
                } else {
                    echo $coche2;
                }
            ?>
        </tr>

        <tr>
            <?php 
                if (get_class($coche3) == "Coche"){
                    echo $coche3."<td>No Procede</td>";
                } else {
                    echo $coche3;
                }
            ?>
        </tr>

        <tr>
            <?php 
                if (get_class($coche4) == "Coche"){
                    echo $coche4."<td>No Procede</td>";
                } else {
                    echo $coche4;
                }
            ?>
        </tr>

    </table>

    <!-- Precio de los coches de lujo con el suplemento añadido -->
    <h1>Precio de los coches de lujo con el suplemento añadido: </h1>
    <?php 
        echo $coche2->getPrecio(),"<br>";  
        echo $coche4->getPrecio();
    ?>
    
</body>

</html>