<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    Moneda original : 
    <select name="moneda">
    <option value="eur">Euro</option>
    <option value="pes">Peseta</option>
    </select><br>
    
    Inserte cantidad: <input type="number" name="cantidad">
    <input type="submit">
</form>
<hr>
<?php
if (isset($_POST['cantidad'])) {
$json = file_get_contents("http://localhost/PHP/Tema12WebServices/1/servidor.php?cantidad=$_POST[cantidad]&moneda=$_POST[moneda]");
$conversion = json_decode($json);
if ($conversion->codigo==0) {
    echo "Son ".round($conversion->resultado, 2)." $conversion->moneda";
}else {
    echo 'Error número: '.$conversion->codigo;
    echo '<br>Descripción: '.$conversion->mensaje;
}

echo "<hr>";
print_r ($conversion); 
echo "<br>sin nada<br>";
$conversion = json_decode($json,true);
print_r ($conversion); 
echo "<br>con true<br>";
$conversion = json_decode($json,false);
print_r ($conversion); 
echo "<br>con false<br>";

}
?>
</body>
</html>