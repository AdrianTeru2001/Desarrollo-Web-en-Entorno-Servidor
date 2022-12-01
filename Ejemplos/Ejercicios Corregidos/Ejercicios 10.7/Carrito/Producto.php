<?php
require_once 'TiendaDB.php';
class Producto {
    private $codigo;
    private $nombre;
    private $precio;
    private $imagen;
    private $stock;

public static function borrar($prod) {
    $conexion = TiendaDB::connectDB();
    $borrado = "DELETE FROM productos WHERE codigo=\"".$prod."\"";
    $conexion->exec($borrado);
}
    function __construct($codigo=0, $nombre="", $precio=0, $imagen="", $stock=0) {
        $this->codigo = $codigo;	
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->stock = $stock;
    }
    public function insertar() {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO productos (nombre, precio, imagen) VALUES (\"".$this->getNombre()."\", \"".$this->getPrecio()."\", \"".$this->getImagen()."\")";
        $conexion->exec($insercion);
    }
    public function añade($cant) {//Añadir stock
        $conexion = TiendaDB::connectDB();
        $cant+=$this->getStock();
        $actualiza = "UPDATE productos SET stock=\"".$cant."\" WHERE codigo=\"".$this->codigo."\"";
        $conexion->exec($actualiza);
    }
    public function vender($cant){//Eliminar stock
        $conexion = TiendaDB::connectDB();
        $stock=$this->getStock();
        $diferencia=$stock-$cant;
        if ($diferencia>=0) {
            $actualiza = "UPDATE productos SET stock=\"".$diferencia."\" WHERE codigo=\"".$this->codigo."\"";
            $conexion->exec($actualiza);
        }
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getPrecio()
    {
        return $this->precio;
    }
    
    public function getImagen()
    {
        return $this->imagen;
    }
    
    public function getStock()
    {
        return $this->stock;
    }
}
