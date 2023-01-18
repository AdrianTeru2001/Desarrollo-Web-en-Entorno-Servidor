<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">

    Numero de cartas:
    <input type="number" placeholder="Introduce el número de cartas que quieres obtener" name="count">
    <br><br><input type="submit" value="obtener" name="enviar"><br><br>

</form>

<?php
    if(isset($_POST['count'])){

        $conversion = file_get_contents("http://localhost/PHP/Tema12WebServices/2/servidor.php?c=".$_POST['count']);

        $respuesta = json_decode($conversion);
        if ($respuesta->error==0) {
            foreach ($respuesta->cartas as $carta) {
                echo $carta.'<br>';
            }
        }else {
            echo "Código de error: $respuesta->error <br> Información: $respuesta->errorMsg";
        }
        
    }
?>
</body>
</html>