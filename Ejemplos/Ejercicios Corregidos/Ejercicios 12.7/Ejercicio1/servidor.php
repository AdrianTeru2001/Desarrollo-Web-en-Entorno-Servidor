<?php
if ($_REQUEST['cantidad'] && isset( $_REQUEST['moneda'])) {
    if ( $_REQUEST['cantidad']>0) {
        $codigo=0;
        $mensaje='correcto';
        $cant = $_REQUEST['cantidad'];
        if ($_REQUEST['moneda']=="eur") {
            $cantidad = $cant*166.386;
            $moneda="pesetas";
        }
        if ($_REQUEST['moneda']=="pes") {
            $cantidad = $cant/166.386;
            $moneda="euros";
        }
    }else {
        $codigo=2;
        $mensaje='La cantidad debe ser positiva';
        $cantidad = 0;
        $moneda=''; 
    }
}else{
    $codigo=1;
    $mensaje='No se han recibido todos los datos para la conversión';
    $cantidad = 0;
    $moneda='';
}
echo json_encode(['codigo' => $codigo, 'mensaje' =>$mensaje, 'resultado' => $cantidad,'moneda' => $moneda]);