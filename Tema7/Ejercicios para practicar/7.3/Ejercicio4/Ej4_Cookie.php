<!-- Ejercicio 4 Cookie
Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los programas
de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión con un 
nombre de usuario y contraseña correctos. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Cookie</title>
</head>

<body>
    
    <?php 
        session_start(); //Iniciamos la sesion para controlar las sesiones de los ejercicios 1, 2 y 3
        if (isset($_GET["borrar"])) {
            if ($_GET["borrar"]=="borrar") { //Si pulsamos el boton de borrar cookies, las borramos aqui
                setcookie("usuario", NULL, -1);
                setcookie("contrasena", NULL, -1);
                setcookie("registro", NULL, -1);
                setcookie("inicioSesion", NULL, -1);
                header("location: Ej4_Cookie.php"); //Recargamos la pagina
            }
        }
        if (isset($_COOKIE["usuario"]) && isset($_COOKIE["contrasena"])) { 
            if ($_COOKIE["registro"] == "false") { //Si el registro no se ha hecho aun
                if (isset($_GET["usuarioN"]) && isset($_GET["contrasenaN"])) {
                    //Guardamos el usuario y contraseña y pasamos el registro a true
                    setcookie("usuario", $_GET["usuarioN"], time()+30*24*60*60);
                    setcookie("contrasena", $_GET["contrasenaN"], time()+30*24*60*60);
                    setcookie("registro", "true", time()+30*24*60*60);
                    header("location: Ej4_Cookie.php");
                } 
            } else if ($_COOKIE["registro"] == "true" && $_COOKIE["inicioSesion"] == "false") { //Si el registro de ha hecho, pero el inicio de sesion no
                if (isset($_GET["usuarioS"]) && isset($_GET["contrasenaS"])) {
                    if ($_COOKIE["usuario"] == $_GET["usuarioS"] && $_COOKIE["contrasena"] == $_GET["contrasenaS"]) {
                        //Pasamos el inicio de sesion a true
                        setcookie("inicioSesion", "true", time()+30*24*60*60);
                        header("location: Ej4_Cookie.php");
                    }
                }
            }
        } else {
            //Creamos todas las cookies que nos hagan falta
            setcookie("usuario", " ", time()+30*24*60*60);
            setcookie("contrasena", " ", time()+30*24*60*60);
            setcookie("registro", "false", time()+30*24*60*60);
            setcookie("inicioSesion", "false", time()+30*24*60*60);
            header("location: Ej4_Cookie.php");    
        }
    ?>

    <?php 
        if ($_COOKIE["registro"] == "false") { //Si el registro aun no se ha hecho?>
            <h2>Registrate para poder acceder al contenido</h2>
            <form action="#" method="get">
                Nombre de usuario <input type="text" name="usuarioN" required><br><br>
                Contraseña <input type="password" name="contrasenaN" required><br><br>
                <input type="submit" value="Registrate">
            </form>    
    <?php 
        } else if ($_COOKIE["registro"] == "true" && $_COOKIE["inicioSesion"] == "false") { //Si el registro se ha hecho pero el inicio de sesion no?>
            <h2>Inicia Sesión para poder acceder al contenido</h2>
            <form action="#" method="get">
                Nombre de usuario <input type="text" name="usuarioS" required><br><br>
                Contraseña <input type="password" name="contrasenaS" required><br><br>
                <input type="submit" value="Inicia Sesion">
            </form>
    <?php
        } else if ($_COOKIE["inicioSesion"] == "true") { //Si el inicio de sesión se ha hecho?>
            <h3>Elige a que ejercicio quieres ir: </h3>
            <form action="../Ejercicio1/Ej1.php" method="get">
                <input type="hidden" name="volver" value="volver">
                <input type="submit" value="Ejercicio 1"><br><br>
            </form>
            <form action="../Ejercicio2/Ej2.php" method="get">
                <input type="hidden" name="volver" value="volver">
                <input type="submit" value="Ejercicio 2"><br><br>
            </form>
            <form action="../Ejercicio3/Ej3.php" method="get">
                <input type="hidden" name="volver" value="volver">
                <input type="submit" value="Ejercicio 3"><br><br>
            </form>
            <form action="#" method="get"> <!-- Botón para borrar cookies -->
                <input type="hidden" name="borrar" value="borrar">
                <input type="submit" value="Borrar Cookies y Cerrar Sesion">
            </form>
    <?php
            session_destroy(); //Borramos todas las sesiones
    }
    ?>

</body>

</html>