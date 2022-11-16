<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            display: flex;
            text-align: center;
            justify-content: center;
            flex-direction: column;
        }
        a{
            width: 80px;
            height: 80px;
            display: inline-block;
            text-decoration: none;
            color: white;
            line-height: 80px;
            margin: 20px;
            border-radius: 10px;
        }
        a:hover{
            box-shadow: 2px 2px 2px black;
            cursor: pointer;
        }
        .b1{
            background-color: red;
        }
        .b2{
            background-color: lightskyblue;
        }
        h1{
            background-color: gray;
            width: 1000px;
            margin: auto;
            border-radius: 10px;
        }
    </style>
    <title>Borrado</title>
</head>

<body>
    
    <?php $dni = $_GET["dni"] ?>
    <h1>¿Estás segundo de borrar al usuario con DNI "<?php echo $dni ?>"?:</h1>
    <div>
        <a href="Ej2.php?borrar=<?php echo $dni ?>" class="b1">Si</a>
        <a href="Ej2.php?" class="b2">No</a>
    </div>

</body>

</html>