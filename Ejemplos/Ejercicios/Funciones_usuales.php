<?php 
//TODO FUNCIONES USUALES

//! Función que devuelve un array con los numeros que sean primos del array de numeros pasados por parametros.
function primos($arrayNumeros){
    $cont = 0;
    $arrayPrimos = [];
    foreach ($arrayNumeros as $item) {
        for ($i=1; $i <= $item; $i++) { 
            if($item % $i == 0){
                $cont++;
            }
        }

        if($cont == 2){
            $arrayPrimos[] = $item;
        }
        $cont = 0;
    }
    return $arrayPrimos;
}
?>