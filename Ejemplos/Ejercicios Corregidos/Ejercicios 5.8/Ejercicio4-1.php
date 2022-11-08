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
        header('location:Ejercicio4.php');
    }
    
    $personas=unserialize(base64_decode($_REQUEST['personas']));
    echo  print_r($personas)."<br>";

    if (isset($_REQUEST['orientacion'])) {
        $orient= $_REQUEST['orientacion'];

        do { //obtenemos una persona aleatoria de la orientación recibida
            $persona1 = $personas[rand(0, count($personas)-1)];
        } while ($persona1['orientacion']!=$orient); 
        switch ($orient) {
         case 'het':
             do { //obtenemos persona mientras sea del mismo sexo o sea homo (puede ser bis)
                 $persona2 = $personas[rand(0, count($personas)-1)];
             } while ($persona2['orientacion']=='hom' || $persona2['sexo']==$persona1['sexo']); 
             break;
         case 'hom':
             do { //obtenemos persona mientras sea la misma o no sea homo o no sean del mismo sexo
                 $persona2 = $personas[rand(0, count($personas)-1)];
             } while ($persona2==$persona1 || $persona2['orientacion']=='het' || $persona2['sexo']!=$persona1['sexo']);
             break;
         case 'bis':
             do { //obtenemos persona mientras sea la misma o sea hetero del mismo sexo o sea homo de sexo distinto
                 $persona2 = $personas[rand(0, count($personas)-1)];
             } while ($persona2==$persona1 || ($persona2['orientacion']=='het' && $persona2['sexo']==$persona1['sexo']) 
                        || ($persona2['orientacion']=='hom' && $persona2['sexo']!=$persona1['sexo']));
        }
        echo "<h1>La pareja afortunada está formada por ".$persona1['nombre']." y ".$persona2['nombre']."</h1>";
    }
    ?>
    <div style="width: 800px; margin:auto; ">
    <h4>ELIGE ORIENTACIÓN DE LA PRIMERA PERSONA ALEATORIA</h4>
    <table style="width: 500px; margin:auto;"><tr>
    <td>
        <form action="">
            <input type="hidden" name="personas" value=<?=base64_encode(serialize($personas))?>>
            <input type="hidden" name="orientacion" value="het">
            <input type="submit" value="HETEROSEXUAL">
        </form>    
    </td>
    <td>
        <form action="">
            <input type="hidden" name="personas" value=<?=base64_encode(serialize($personas))?>>
            <input type="hidden" name="orientacion" value="hom">
            <input type="submit" value="HOMOSEXUAL">
        </form>    
    </td>
    <td>
        <form action="">
            <input type="hidden" name="personas" value=<?=base64_encode(serialize($personas))?>>
            <input type="hidden" name="orientacion" value="bis">
            <input type="submit" value="BISEXUAL">
        </form>    
    </td>
    </tr></table>
    <?php
      
    ?>
    </div>
</body>
</html>