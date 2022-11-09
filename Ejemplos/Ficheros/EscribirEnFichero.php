<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escribir en Fichero</title>
</head>

<body>

    <?php
        $file = "miarchivo.txt";
        $texto = "ESPERANDO al puente de Diciembre";
        $fp = fopen($file, "a");
        fwrite($fp, $texto);
        echo "ESCRIBIENDO en el fichero ".$file.".....";
        fputs($fp, PHP_EOL."Texto extra");
        fclose($fp);
   ?> 

</body>

</html>