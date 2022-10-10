<!-- Ejercicio 2
Realizar una página web para realizar pedidos de comida rápida. Tenemos tres tipos de comida: 
Pizza: jamon, atun, bacon, peperoni Hamburguesa: lechuga, tomate, queso Perrito caliente: lechuga, 
cebolla, patata A traves de tres formularios distintos, uno para cada tipo de comida se va añadiendo 
comida al pedido con sus respectivos ingredientes, hasta que se pulse el botón finalizar pedido (en otro formulario),
con lo que se mostrará el pedido completo en una tabla, con toda la comida y las opciones de cada una. 
Usar las función serialize() y unserialize() para pasar arrays como cadenas Nota: con arrays de 2 dimensiones
la serialización se corrompe, así que hay que usar la función en combinación con otra de la 
siguiente forma: $cadenaTexto=base64_encode(serialize($array)); $array=unserialize(base64_decode($cadenaTexto)); -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Comida Rápida</title>
</head>

<body>
    
    <?php 
        if (isset($_REQUEST[$array])) {
            $comida[] = $_REQUEST[$array];
        }
    ?>

    <h2>Pizza: </h2>
    <form action="Ej2_Controlar.php" method="get">
        <input type="hidden" name="pizza" value="Pizza">
        Jamón <input type="checkbox" name="jamon" value="Jamón">
        Atún <input type="checkbox" name="atun" value="Atún">
        Bacon <input type="checkbox" name="bacon" value="Bacon">
        Pepperoni <input type="checkbox" name="pepperoni" value="Pepperoni"> &nbsp&nbsp
        <input type="submit" value="Pedir">
    </form>
    <h2>Hamburguesa: </h2>
    <form action="Ej2_Controlar.php" method="get">
        <input type="hidden" name="hamburguesa" value="Hamburguesa">
        Lechuga <input type="checkbox" name="lechuga" value="Lechuga">
        Tomate <input type="checkbox" name="tomate" value="Tomate">
        Queso <input type="checkbox" name="queso" value="Queso"> &nbsp&nbsp
        <input type="submit" value="Pedir">
    </form>
    <h2>Perrito Caliente: </h2>
    <form action="Ej2_Controlar.php" method="get">
        <input type="hidden" name="perrito" value="Perrito">
        Lechuga <input type="checkbox" name="lechuga" value="Lechuga">
        Cebolla <input type="checkbox" name="cebolla" value="Cebolla">
        Patata <input type="checkbox" name="patata" value="Patata"> &nbsp&nbsp
        <input type="submit" value="Pedir">
    </form>
    <br>
    <form action="Ej2_ComidaRapida.php" metho="get">
        <input type="submit" value="Enviar Pedido">
    </form>

</body>

</html>