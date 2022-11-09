<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer desde Fichero</title>
</head>

<body>

    <?php
        $file = "miarchivo.txt";
        $fp = fopen($file, "r");
        $contents = fread($fp, filesize($file));
        echo $contents;
        fclose($fp);
   ?> 

</body>

</html>