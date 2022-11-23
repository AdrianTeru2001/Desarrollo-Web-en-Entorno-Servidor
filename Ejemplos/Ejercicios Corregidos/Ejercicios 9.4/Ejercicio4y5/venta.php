<?php session_start(); ?>
<?php 
    if (isset($_POST["codigo"])){
        $_SESSION["carrito"][]=$_POST["codigo"];
        $_SESSION["cantidad"]++;   
    }
    header('Location: ejercicio2.php');
    //Para varios productos iguales en una sola línea habría que modificar el array de sesión
    // de la siguiente forma, al igual que hicimos en el ejercicio del carrito
    
        // if (array_key_exists($_POST ['codigo'], $_SESSION['carrito'])) { 
        //     $_SESSION['carrito'][$_POST ['codigo']]++;
        // }else {
        //     $_SESSION['carrito'][$_POST ['codigo']]=1;
        // }

?>