<?php 
//TODO ---------------- FUNCIONES DE FECHAS -------------------------- 


//* CONSTANTES 
define("ANOS", 60*60*24*365.25);
define("DIAS", 60*60*24);

//*


//! Funcion que te devuelve los años que de esa fecha actual
function añosFecha($fecha){ 
    $años = (strtotime(date("d/m/Y")) - strtotime($fecha)) / ANOS;
    return round($años);
}


//! Funcion que devuelve la fecha mas antigua de una lista de fechas pasada por argumento
function fechaMayor($fechas){
    $min = PHP_INT_MAX;
    $fechaMax = 0;
    foreach ($fechas as $item) {
        if(strtotime($item) < $min){
            $min = strtotime($item);
            $fechaMax = $item;
        }
    }
    return $fechaMax;
}


//! Funcion que devuelve la fecha mas reciente de una lista de fechas pasada por argumento
function fechaMenor($fechas){
    $max = PHP_INT_MIN;
    $fechaMin = 0;
    foreach ($fechas as $item) {
        if(strtotime($item) > $max){
            $max = strtotime($item);
            $fechaMin = $item;
        }
    }
    return $fechaMin;
}


//! Funcion que te devuelve los dias que hay entre la primera fecha pasada por parametro y la segunda
function diasEntreFechas($fecha1, $fecha2){
    if(fechaMenor([$fecha1, $fecha2]) == $fecha1){
        $dias = (strtotime($fecha1) - strtotime($fecha2)) / DIAS;
    }
    else{
        $dias = (strtotime($fecha2) - strtotime($fecha1)) / DIAS;
    }
    return $dias;
}


//! Funcion que te devuelve los años que hay entre la primera fecha pasada por parametro y la segunda
function anosEntreFechas($fecha1, $fecha2){
    if(fechaMenor([$fecha1, $fecha2]) == $fecha1){
        $anos = (strtotime($fecha1) - strtotime($fecha2)) / ANOS;
    }
    else{
        $anos = (strtotime($fecha2) - strtotime($fecha1)) / ANOS;
    }
    return round($anos);
}
?>