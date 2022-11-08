<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Loteria primitiva</h1>
<h3>Genera automaticamente tu combinación ganadora</h3>
<form action="Ejercicio1-2.php" method="post">
<label for="titulo">Título para tu combinación</label>
<input type="text" id="titulo" name="titulo" size="50"><br><br>
<?php
for ($i=0; $i < 6; $i++) { ?>   
    <label for="num<?=$i?>"></label>
    <input type="number" id="num<?=$i?>" name="num[]" size="2" min="1" max="49">
<?php 
}
?>
<br><br>
<label for="num6">Número de serie</label>
<input type="number" id="num6" name="num[]" size="3" min="1" max="999">
<br><br>
<input type="submit" value="GENERAR COMBINACIÓN">
</form>
</body>
</html>