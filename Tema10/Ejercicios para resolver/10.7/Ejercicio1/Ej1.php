<!-- Ejercicio 1
Confeccionar una clase Empleado con los atributos nombre y sueldo.
Definir un método “asigna” que reciba como dato el nombre y sueldo y actualice los atributos
(debe comprobar que el nombre recibido coincide con el atributo nombre y si es así actualiza el atributo sueldo con el sueldo recibido).
Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar impuestos (si el sueldo supera a 3000 paga impuestos). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    
    <?php 

        //Cargamos la clase
        include_once "empleado.php";

        //Creamos los empleados y los mostramos
        $empleado1 = new empleado("Manolo", 4500);
        $empleado2 = new empleado("Mariana", 5000);
        $empleado3 = new empleado("Diego", 2000);
        $empleado4 = new empleado("Joselita", 2300);
        echo $empleado1->__toString(),"<br>";
        echo $empleado2->__toString(),"<br>";
        echo $empleado3->__toString(),"<br>";
        echo $empleado4->__toString(),"<br>";
        echo "<hr>";

        //Cambiamos sueldos y algunos nombres
        $empleado1->asigna("Pepe", 10000);
        $empleado2->asigna("Mariana", 1000);
        $empleado3->asigna("Diego", 6700);
        $empleado4->asigna("Mari Carmen", 4000);

        //Mostramos los nombres y quien tiene que pagar impuestos
        $empleado1->muestra();
        $empleado2->muestra();
        $empleado3->muestra();
        $empleado4->muestra();

    ?>

</body>

</html>