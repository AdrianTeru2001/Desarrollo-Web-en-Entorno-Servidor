<!-- Ejercicio 1.
Crear una página web para generar de manera aleatoria una combinación de apuesta en la lotería primitiva. 
Se pedirán 6 números (entre 1 y 49) y el número de serie (entre 1 y 999). El usuario podrá rellenar los números pedidos 
que desee, dejando en blanco el resto, de modo que la combinación generada respete los números elegidos y genere
aleatoriamente el resto hasta completar la combinación (el número de serie también es opcional). 
El usuario también podrá rellenar de manera opcional una caja de texto como título para su combinación.
Usar una función combinacion() que sea llamada para generar la combinación en función de los parámetros recibidos
y devuelva el array generado.
Usar una función imprimeApuesta() que reciba un array y un texto, e imprima en una tabla html 
con el formato que quieras, el array generado con el texto de cabecera, para mostrar el resultado
de la combinación generada. Si la función no recibe ningún texto como cabecera imprimirá "Combinación generada para la Primitiva". -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Loteria Primitiva</title>
</head>

<body>

    <h1>Loteria primitiva</h1>
    <h3>Genera automaticamente tu combinación ganadora</h3>
    <form action="Ej1_Comprobar.php" method="get">
        Título para tu combinación <input type="text" name="titulo"> <!-- Pedimos el titulo del cartón -->
        <br><br>
        <input type="number" name="num1" min=1 max=49> <!-- Pedimos 6 números -->
        <input type="number" name="num2" min=1 max=49>
        <input type="number" name="num3" min=1 max=49>
        <input type="number" name="num4" min=1 max=49>
        <input type="number" name="num5" min=1 max=49>
        <input type="number" name="num6" min=1 max=49>
        <br><br>
        Número de serie <input type="number" name="numS" min=1 max=999> <!-- Pedimos el número de serie -->
        <br><br>
        <input type="submit" value="GENERAR COMBINACIÓN"> <!-- Se lo pasamos todo a la siguiente página -->
    </form>

</body>

</html>