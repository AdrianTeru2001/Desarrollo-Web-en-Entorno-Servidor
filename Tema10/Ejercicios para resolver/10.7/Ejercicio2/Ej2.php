<!-- Ejercicio 2
Confeccionar una clase Menu, con los atributos titulo y enlace (ambos son arrays). Crear los métodos necesarios que permitan añadir 
elementos al menú. Crear los métodos que permitan mostrar el menú en forma horizontal o vertical (según que método llamemos). -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    
    <?php 

        //Cargamos la clase
        include_once "menu.php";

        //Inicializamos los menús
        $menu1 = new menu();
        $menu2 = new menu();

        //Añadimos enlaces en los menus
        $menu1->anadir("Google", "https://www.google.com/");
        $menu1->anadir("3Djuegos", "https://www.3djuegos.com/");
        $menu2->anadir("Amazon", "https://www.amazon.es/ref=nav_logo");
        $menu2->anadir("Game", "https://www.game.es/");

        //Mostramos los nombres y quien tiene que pagar impuestos
        $menu1->mostrarHor();
        $menu1->mostrarVer();
        echo "<br><br><br>";
        $menu2->mostrarHor();
        $menu2->mostrarVer();

    ?>

</body>

</html>