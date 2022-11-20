<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
if (!isset($_SESSION['mascotas'])) {
    $_SESSION['mascotas'] = [];
}
$fecha=date("#d-m-Y#");

if (isset($_POST['grabar'])) {
    $existeFecha=miraFecha($fecha); 
    $file= fopen("mascotas.txt","a");
    if (!$existeFecha) {
        fwrite($file, $fecha.PHP_EOL);   
    }
    foreach ($_SESSION['mascotas'] as $nombre => $mascota) {
        fwrite($file, $nombre.'-'.$mascota[0].'-'.$mascota[1].PHP_EOL);
    }
    fclose($file);
    $_SESSION['mascotas'] = [];
}
if (isset($_POST['añadir'])) {    
    $_SESSION['mascotas'][$_POST['nombre']] = [$_POST['animal'],$_POST['edad']];
}

echo '<table border = "1">';
echo '<tr><th colspan="4">FECHA: '.$fecha.'</th></tr>';
echo '<tr><th>Nombre</th><th>Animal</th><th>Edad</th><th></th></tr>';
foreach ($_SESSION['mascotas'] as $nombre => $mascota) {
    echo "<tr><td>$nombre</td><td>$mascota[0]</td><td>$mascota[1]</td><td></td></tr>";
}
?>
<form action="#" method="post">
    <tr>
        <td><input type="text" name="nombre"></td>
        <td><input type="text" name="animal"></td>
        <td><input type="number" name="edad"></td>
        <td><input type="submit" name="añadir" value="AÑADIR"></td>
    </tr>
    
</form>
</table>
<br><br>
<form action="" method="post">
    Grabar las mascotas en el fichero:
    <input type="submit" name="grabar" value="GRABAR">
</form>
<?php
function miraFecha($fecha){
    $fecha=$fecha.PHP_EOL;
    $lineas = file("mascotas.txt");
    return in_array($fecha,$lineas);
}
// Método recorriendo todas las líneas del fichero y comparando con la fecha
// function miraFecha2($fecha){
//     $file= fopen("mascotas.txt","r");
//     //Recorremos hasta encontrar la fecha o fin del fichero
//     $linea=trim(fgets($file));
//     while($linea!=$fecha && !feof($file)) {
//         $linea=trim(fgets($file));
//     }
//     fclose($file);
//     return $linea==$fecha;
// }
?>
</body>
</html>