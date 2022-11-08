<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body style="text-align: center;">
    <?php
    if (!isset($_REQUEST['personas'])) {
        $personas = [
            ['nombre'=>'Anita','sexo'=>'m','orientacion'=>'bis'],
            ['nombre'=>'Lolita','sexo'=>'m','orientacion'=>'bis'],
            ['nombre'=>'Pepito','sexo'=>'h','orientacion'=>'bis'],
            ['nombre'=>'Juanito','sexo'=>'h','orientacion'=>'bis'],
            ['nombre'=>'Roberto','sexo'=>'h','orientacion'=>'het'],
            ['nombre'=>'Antonio','sexo'=>'h','orientacion'=>'het'],
            ['nombre'=>'Manuela','sexo'=>'m','orientacion'=>'het'],
            ['nombre'=>'Isabel','sexo'=>'m','orientacion'=>'het'],
            ['nombre'=>'Jenifer','sexo'=>'m','orientacion'=>'hom'],
            ['nombre'=>'Susan','sexo'=>'m','orientacion'=>'hom'],
            ['nombre'=>'Peter','sexo'=>'h','orientacion'=>'hom'],
            ['nombre'=>'Mike','sexo'=>'h','orientacion'=>'hom']];
    } else {
        $personas=unserialize(base64_decode($_REQUEST['personas']));
        $personas[] = $_REQUEST['nueva'];
        echo  print_r($personas)."<br>";
    }
    ?>
    <div style="width: 500px; margin:auto; ">
    <h1>Cupido ha llegado a la web</h1>
    <form action="" method="post">
        <fieldset> <legend>Añadir personas a la Base de datos</legend>
            <br>
            <strong>NOMBRE</strong> 
                <input type="text" name="nueva[nombre]"> <br>
            <hr>
            <strong>SEXO</strong> 
                <input type="radio" name="nueva[sexo]" value="h">Hombre 
                <input type="radio" name="nueva[sexo]" value="m">Mujer <br>
            <hr>
            <strong>ORIENTACIÓN</strong> 
                <input type="radio" name="nueva[orientacion]" value="het">Heterosexual
                <input type="radio" name="nueva[orientacion]" value="hom">Homosexual
                <input type="radio" name="nueva[orientacion]" value="bis">Bisexual<br>
            <hr>
            <input type="hidden" name="personas" value=<?=base64_encode(serialize($personas))?>>
            <input type="submit" value="AÑADIR PERSONA">
            <br><br>
        </fieldset>
    </form>
    <br><br>
    <form action="Ejercicio4-1.php" method="post">
        <fieldset> <legend>Pasar a generar parejas amorosas</legend>
            <br>
            <input type="hidden" name="personas" value=<?=base64_encode(serialize($personas))?>>
            <input type="submit" value="CUPIDO ENTRA EN ACCIÓN">
            <br><br>
        </fieldset>
    </form>
    </div>
</body>

</html>