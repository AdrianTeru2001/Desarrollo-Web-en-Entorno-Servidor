<?php 
//TODO FUNCIONES PARA UN SISTEMA CRUD

//! Funcion para añadir elementos a un arraya asociativo de productos el array asocitivo tiene que ser el primer parametro, 
//! luego el nombre del producto como segundo parametro y por ultimo $atributos debe de ser un array con los atributos que quieras ponerle.
function add($arrayProductos, $nombre, $atributos){
    $arrayProductos[$nombre] = $atributos;
    return $arrayProductos;
}

//! Funcion para eliminar un producto del array asociativo
function eliminar($arrayProductos, $nombre){
    if(array_key_exists($nombre, $arrayProductos)){
        unset($arrayProductos[$nombre]);
        return $arrayProductos;
    }
    else{
        throw new Exception("Error el nombre del producto no se encuentra en la lista");
    }
}

//! Función para modificar un elemento del array asociativo, el tercer parametro debe ser un array con los nuevos atributos del producto
function modificar($arrayProductos, $nombre, $nuevosAtributos){
    if(array_key_exists($nombre, $arrayProductos)){
        $arrayProductos[$nombre] = $nuevosAtributos;
        return $arrayProductos;
    }
    else{
        throw new Exception("Error el nombre del producto no se encuentra en la lista");
    }
}
?>
