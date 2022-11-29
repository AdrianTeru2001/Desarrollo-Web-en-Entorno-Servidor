<!-- Ejercicio 4
Creamos la clase factura con el atributo de clase IVA (21) y los atributos de instancia ImporteBase, 
fecha, estado (pagada o pendiente) y productos (array con todos los productos de la factura, que contiene el nombre, 
precio y cantidad).
Define los métodos AñadeProducto, ImprimeFactura y los getters y setters de los atributos 
ImporteBase (solo getter, pues su contenido se actualiza automaticamente), fecha y estado. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    
    <?php 
    
        //Cargamos la clase
        include_once "factura.php";

        //Inicializamos las facturas
        $factura1 = new factura("28-11-2022");
        sleep(2);
        $factura2 = new factura("12-8-2022");

        //Mostramos las facturas recien creadas con el toString
        echo $factura1->__toString();
        echo "<br><br>";
        echo $factura2->__toString();
        echo "<br>";

        //Añadimos productos a las facturas
        $factura1->AnadeProducto("Nintendo Switch", 299.99, 10);
        $factura1->AnadeProducto("Playstation 5", 499.95, 20);
        $factura1->AnadeProducto("Xbox Series S", 499.95, 15);
        $factura1->AnadeProducto("Logitech G435",56.99, 5);
        $factura2->AnadeProducto("Barra de Pan", 1.20, 14);
        $factura2->AnadeProducto("Sopa de Macaco", 2.45, 32);
        $factura2->AnadeProducto("Portatil", 678.99, 7);
        $factura2->AnadeProducto("Raton Razer", 45.95, 21);

        //Imprimimos las facturas
        $factura1->ImprimeFactura();
        $factura2->ImprimeFactura();

    ?>

</body>

</html>