<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiempo</title>
</head>

<body>
    <h1>Tiempo que tarda en llenarse el deposito</h1>
    <?php 
        /* Variables */
        $diametro = $_GET["diametro"];
        $altura = $_GET["altura"];
        $caudal = $_GET["caudal"];
        $radio = $diametro/2;
        $tiempo = 0;
        $horas = 0;
        $minutos = 0;

        /* Calculos y Resultado */
        $volumen = (pi()*pow($radio,2))*$altura;
        $tiempo = $volumen/$caudal;
        $horas = $tiempo/60;
        $tiempo = $horas-intval($horas);
        $minutos = $tiempo*60;
        echo "El deposito se llenará en ",intval($horas)," horas y ",ceil($minutos)," minutos."; 
    ?>
</body>

</html>