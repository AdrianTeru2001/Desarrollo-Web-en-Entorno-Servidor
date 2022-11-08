<?php 
function imprime($tarjeta){
	$letras=['A','B','C','D','E'];
	echo "<Table border='1'><tr><th></th>";
    for ($i=0; $i<5 ; $i++) { 
    	echo "<th>".$letras[$i]."</th>";
    }
    echo "</tr>";
    $i=0;
	foreach ($tarjeta as $fila) {
		echo "<tr><th>".++$i."</th>";
		foreach ($fila as $clave) {
			echo "<td>".$clave."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

function dameTarjeta($perfil){
	if ($perfil=='admin') {
		return [['A1','B1','C1','D1','E1'],['A2','B2','C2','D2','E2'],['A3','B3','C3','D3','E3'],['A4','B4','C4','D4','E4'],['A5','B5','EC','D5','E5']];
	}else{
		return [['1A','2A','3A','4A','5A'],['1B','2B','3B','4B','5B'],['1C','2C','3C','4C','5C'],['1D','2D','3D','4D','5D'],['1E','2E','3E','4E','5E']];
	}
}
function claveCorrecta($tarjeta, $fila, $columna, $valor){
$fila--;
/*echo "FILA: $fila<br>";
echo "COLUMNA: $columna<br>";
echo "VALOR: $valor<br>";
echo "TARJETA: ".$tarjeta[$fila][$columna]."<br>";*/
if ($tarjeta[$fila][$columna]==$valor) {
	return true;
}else{
	return false;
}
}
?>