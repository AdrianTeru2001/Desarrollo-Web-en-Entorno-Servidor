<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<?php 
$num=$_REQUEST['num'];
$num=combinacion($num);
imprimeApuesta($num, $_REQUEST['titulo']);

function imprimeApuesta($num, $titulo){
    if ($titulo=="") {
        $titulo="Combinación generada para la Primitiva";
    }    
    echo "<table><tr><th colspan='6'>$titulo</th></tr><tr>";
    for ($i=0; $i < count($num)-1; $i++) { 
        echo "<td>$num[$i]</td>";
    }
    echo "</tr><tr><td colspan='6'>Nº serie ".$num[count($num)-1]."</td></tr></table>";
}
function combinacion ($num)
{
    for ($i=0; $i < count($num)-1; $i++) { 
        if ($num[$i]=="") {
            do {
                $n=rand(1,49);
            } while (in_array($n,$num)); 
            $num[$i]=$n;
        }
    }
    if ($num[count($num)-1]=="") {
        $num[count($num)-1]=rand(1,999);
    }
    return $num;
}
?>
</body>
</html>