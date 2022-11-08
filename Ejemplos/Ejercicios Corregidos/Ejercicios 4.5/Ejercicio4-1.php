<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1 tema4</title>
</head>
<body>
<h1>Pulsa un timbre para llamar</h1>
<table border=1 cellspacing=0>
<tr><th>Bloque</th><th>Piso</th><th>Timbre</th></tr>
    <?php 
       for ($i=1; $i <= 10; $i++) { 
           for ($j=1; $j <= 7; $j++) {
    ?>
    <tr>
    <td>Bloque <?= $i ?></td>
    <td>Piso <?= $j ?></td>
    <td><form action="Ejercicio4-2.php" method="POST">
        <input type="hidden" name="bloque" value="<?=$i?>">
        <input type="hidden" name="piso" value="<?=$j?>">
        <input type="submit" value="LLAMAR">
    </form></td>
    </tr>
    <?php             
           }
       } 
    ?>
</table>
</body>
</html>