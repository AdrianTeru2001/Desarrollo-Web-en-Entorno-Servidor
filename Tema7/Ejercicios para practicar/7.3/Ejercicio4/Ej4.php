<!-- Ejercicio 4
Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los programas
de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión con un 
nombre de usuario y contraseña correctos. -->
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
        session_start(); //Iniciamos la sesion
        if (isset($_SESSION["usuario"]) && isset($_SESSION["contrasena"])) { 
            if ($_SESSION["registro"] == false) { //Si el registro no se ha hecho aun
                if (isset($_GET["usuarioN"]) && isset($_GET["contrasenaN"])) {
                    //Guardamos el usuario y contraseña y pasamos el registro a true
                    $_SESSION["usuario"] = $_GET["usuarioN"];
                    $_SESSION["contrasena"] = $_GET["contrasenaN"];
                    $_SESSION["registro"] = true;
                    header("location: Ej4.php");
                } 
            } else if ($_SESSION["registro"] == true && $_SESSION["inicioSesion"] == false) { //Si el registro de ha hecho, pero el inicio de sesion no
                if (isset($_GET["usuarioS"]) && isset($_GET["contrasenaS"])) {
                    if ($_SESSION["usuario"] == $_GET["usuarioS"] && $_SESSION["contrasena"] == $_GET["contrasenaS"]) {
                        //Pasamos el inicio de sesion a true
                        $_SESSION["inicioSesion"] = true;
                        header("location: Ej4.php");
                    }
                }
            }
        } else {
            //Creamos todas las sesiones que nos hagan falta
            $_SESSION["usuario"] = "";
            $_SESSION["contrasena"] = "";
            $_SESSION["registro"] = false;
            $_SESSION["inicioSesion"] = false;
        }
    ?>

    <?php 
        if ($_SESSION["registro"] == false) { //Si el registro aun no se ha hecho?>
            <h2>Registrate para poder acceder al contenido</h2>
            <form action="#" method="get">
                Nombre de usuario <input type="text" name="usuarioN" required><br><br>
                Contraseña <input type="password" name="contrasenaN" required><br><br>
                <input type="submit" value="Registrate">
            </form>    
    <?php 
        } else if ($_SESSION["registro"] == true && $_SESSION["inicioSesion"] == false) { //Si el registro se ha hecho pero el inicio de sesion no?>
            <h2>Inicia Sesión para poder acceder al contenido</h2>
            <form action="#" method="get">
                Nombre de usuario <input type="text" name="usuarioS" required><br><br>
                Contraseña <input type="password" name="contrasenaS" required><br><br>
                <input type="submit" value="Inicia Sesion">
            </form>
    <?php
        } else if ($_SESSION["inicioSesion"] == true) { //Si el inicio de sesión se ha hecho?>
            <h3>Elige a que ejercicio quieres ir: </h3>
            <form action="../Ejercicio1/Ej1.php" method="get">
                <input type="submit" value="Ejercicio 1"><br><br>
            </form>
            <form action="../Ejercicio2/Ej2.php" method="get">
                <input type="submit" value="Ejercicio 2"><br><br>
            </form>
            <form action="../Ejercicio3/Ej3.php" method="get">
                <input type="submit" value="Ejercicio 3"><br><br>
            </form>
    <?php
    }
    ?>

</body>

</html>